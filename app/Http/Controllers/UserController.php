<?php

namespace App\Http\Controllers;

use App\Models\Society;

class UserController extends Controller
{
    public function enrolled()
    {
        $enrolled = auth()->user()->societies()->orderBy('name')->get();
        return view('user.enrolled', ['enrolledSocieties' => $enrolled]);
    }

    public function notEnrolled()
    {
        $enrolled = auth()->user()->societies()->orderBy('name')->get();
        return view('user.enrolled', ['enrolledSocieties' => $enrolled]);
    }

    public function joinSociety(Society $society)
    {
        $user = auth()->user();
        $user->societies()->attach($society->id);
        $user->save();
        return redirect()->route('user.not-enrolled-society');
    }

    public function leaveSociety(Society $society)
    {
        $user = auth()->user();
        $user->societies()->detach($society->id);
        $user->save();
        return redirect()->route('user.enrolled-society');
    }
}
