<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lesson;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('pages.lessons', ['lessons' => $lessons]);
    }

    public function list(Request $request)
    {
        $activeCategory = NULL;
        if ($request->has('category_id')) {
            $activeCategory = Category::findOrFail($request->input('category_id'));
            $query = Lesson::where('category_id', '=', $request->input('category_id'));
        } else {
            $query = Lesson::query();
        }

        return view(
            'lessons-list',
            [
                'lessons' => $query->get(),
                'categories' => Category::withCount('lessons')->get(),
                'activeCategory' => $activeCategory
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
        $categories = Category::all();
        return view('pages.add-lesson', ['categories' => $categories]);
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
        $lesson->user_id = $request->user()->id;
        $lesson->category_id = $request->category_id;

        $lesson->save();

        $lesson->setStatus('pendiente');

        // redirect to lesson view
        return redirect()->route('lesson.public', ['id' => $lesson->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('pages.lesson', ['lesson' => $lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $lesson = Lesson::findOrFail($id);
        return view('pages.edit-lesson', ['lesson' => $lesson, 'categories' => $categories]);
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
        $lesson->category_id = $request->category_id;

        $lesson->save();

        // redirect to lesson page
        return redirect()->route('lessons.show', ['id' => $lesson->id]);
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
    public function getUserLessons()
    {
        $lessons = Lesson::where('user_id', Auth::user()->id)->get();
        return view('pages.my_lessons', ['lessons' => $lessons]);
    }

    /**
     * Return view with the list of lessons with a 'pending' status.
     * 
     * @return \Illuminate\Http\Response
     */
    public function getPendingLessons()
    {
        $pending_lessons = Lesson::currentStatus('pendiente')->get();
        return view('pages.pending_lessons', ['pending_lessons' => $pending_lessons]);
    }
}
