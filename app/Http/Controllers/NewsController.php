<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Team;
use  App\Http\Requests\CreateNewsRequest;
use Illuminate\Support\Arr;

class NewsController extends Controller
{
    public function index()
    {
        $allNews = News::with('user')->orderBy('created_at', 'desc')->paginate(10);
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

    public function create()
    {
        $teams = Team::all();
        return view('news.create', compact('teams'));
    }

    public function store(CreateNewsRequest $request)
    {
        $data = $request->validated();
        $news = auth()->user()->news()->create($data);
        //The Arr::get method retrieves a value from a deeply nested array using "dot" notation:
        $news->teams()->attach(Arr::get($data, 'teams', []));

        session()->flash('status_message', 'Thank you for publishing the article on www.nba.com');
        return redirect('/news');
    }
}
