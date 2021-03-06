<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lesson;
use App\Models\Area;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function published_lessons()
    {
        $lessons = Lesson::currentStatus('aprobado')->paginate(15);
        return view('lesson.published-lessons', ['lessons' => $lessons]);
    }

    /**
     * Returns the approved lessons on the student side.
     * 
     * @return View public-lessons
     */
    public function public_lessons(Request $request)
    {
        $activeArea = NULL;
        if ($request->has('area_id')) {
            $activeArea = Area::findOrFail($request->input('area_id'));
            $query = Lesson::currentStatus('aprobado')->where('area_id', '=', $request->input('area_id'));
        } else {
            $query = Lesson::currentStatus('aprobado');
        }

        return view(
            'lesson.public-lessons',
            [
                'lessons' => $query->get(),
                'areas' => Area::withCount(['lessons' => function ($query) { $query->currentStatus('aprobado'); }])->get(),
                'activeArea' => $activeArea
            ]
        );
    }

    /**
     * Show the form for creating a new lesson.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('lesson.add-lesson', ['areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lesson = new Lesson;
        $lesson->title = $request->title;
        $lesson->content = $request->content;
        $lesson->references = json_encode($request->data['references']);
        $lesson->user_id = $request->user()->id;
        $lesson->area_id = $request->area_id;

        $lesson->save();
        // redirect to lesson view
        return redirect()->route('lesson.public', ['id' => $lesson->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $lesson = Lesson::findOrFail($id);

        if ($lesson->status === 'aprobado'
            || (
                \Auth::check() && ($request->user()->role->name === 'manager'
                || $request->user()->id === $lesson->user_id)
            )) {
            // lesson is allowed
            $references = json_decode($lesson->references);
            return view('lesson.lesson', ['lesson' => $lesson, 'references' => $references]);
        }

        // user isn't allowed to (pre)view this lesson
        return redirect()->route('homepage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areas = Area::all();
        $lesson = Lesson::findOrFail($id);
        $references = json_decode($lesson->references, true);
        return view('lesson.edit-lesson', [
            'lesson'     => $lesson,
            'areas' => $areas,
            'references' => $references
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->title = $request->title;
        $lesson->content = $request->content;
        $lesson->area_id = $request->area_id;
        $lesson->references = json_encode($request->data['references']);
        $lesson->save();

        // redirect to lesson page
        return redirect()->route('lesson.public', ['id' => $lesson->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::destroy($id);
        return redirect()->route('lessons');
    }

    /**
     * Return only those lessons that belongs to the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_own_lessons()
    {
        $lessons = Lesson::where('user_id', Auth::user()->id)->paginate(15);
        return view('lesson.user-own-lessons', ['lessons' => $lessons]);
    }

    /**
     * Return view with the list of lessons with a 'pending' status.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending_lessons()
    {
        
        $pending_lessons = Lesson::currentStatus('pendiente')->paginate(15);

        return view('lesson.pending-lessons', ['pending_lessons' => $pending_lessons]);
    }

    /**
     * Gives to a lesson the status of 'aproved'
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function approveLesson($id)
    {
        $lesson = Lesson::find($id);
        $lesson->update(['approved_at' => now()]);
        $lesson->deleteStatus('pendiente');
        $lesson->setStatus('aprobado');
        return redirect()->route('lessons.pending_lessons');
    }

    /**
     * Gives a lesson the status of 'rejected' and appends a comment (rejection reason)
     *
     * @param \Illuminate\Http\Request request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function rejectLesson(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $comment = $request->reject_reason;

        if (isset($lesson) && isset($comment)) {
            $status = $lesson->statuses;
            $lesson->deleteStatus($status);
            $lesson->setStatus('rechazado', $comment);
        }

        return redirect()->route('lessons.pending_lessons');
    }
}
