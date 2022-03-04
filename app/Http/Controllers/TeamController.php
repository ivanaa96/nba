<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }
}
