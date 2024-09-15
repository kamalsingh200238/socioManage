<?php

namespace App\Http\Controllers;

class PresidentController extends Controller
{
    public function societyMembers()
    {
        $society = auth()->user()->presidentSociety;
        $members = $society->members()->paginate(20);

        return view('president.members', ['members' => $members]);
    }
}
