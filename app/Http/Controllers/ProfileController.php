<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('No tienes permisos para cambiar los datos de este usuario.')]);
        }

        auth()->user()->update(['name' => $request->name]);

        $profile = Profile::firstOrCreate([
            'description' => $request->description,
            'country' => $request->country_id,
            'state' => $request->state_id,
        ]);

        $profile->save();

        return back()->withStatus(__('Perfil actualizado exitosamente.'));
    }

    public function another()
    {
        dd('Este si funca que pedo');
        exit;
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('No tienes permisos para cambiar la contraseña de este usuario.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Contraseña actualizada exitosamente.'));
    }
}
