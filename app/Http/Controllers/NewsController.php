<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Team;

class NewsController extends Controller
{
    public function index()
    {
        $allNews = News::with('user')->paginate(10);
        return view('news.index', compact('allNews'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    public function getNewsbyTeam($teamName)
    {
        $team = Team::where('name', $teamName)->firstOrFail();
        $news = $team->news()->paginate(10);
        return view('news.team-news', compact('team', 'news')); 
    }
}