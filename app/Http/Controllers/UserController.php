<?php

namespace App\Http\Controllers;

use App\Models\Society;

class UserController extends Controller
{
    public function enrolled()
    {
        $enrolled = auth()->user()->societies()->orderBy('name')->paginate(10);
        return view('user.enrolled', ['enrolledSocieties' => $enrolled]);
    }

    public function notEnrolled()
    {
        $enrolledId = auth()->user()->societies()->pluck('id');
        $notEnrolled = Society::query()->whereNotIn('id', $enrolledId)->orderBy('name')->paginate(10);
        return view('user.not-enrolled', ['notEnrolledSocieties' => $notEnrolled]);
    }

    public function joinSociety(Society $society)
    {
        $user = auth()->user();
        $user->societies()->attach($society->id);
        $user->save();
        return redirect()->route('user.not-enrolled-societies');
    }

    public function leaveSociety(Society $society)
    {
        $user = auth()->user();
        $user->societies()->detach($society->id);
        $user->save();
        return redirect()->route('user.enrolled-societies');
    }
}
