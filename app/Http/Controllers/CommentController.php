<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Team;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Team $team_id, StoreCommentRequest $request)
    {
        $data = $request->validated();
        $comment = new Comment($data);
        $comment->team()->associate($team_id);
        $comment->user()->associate(auth()->user());
        $comment->save();

        return back();
    }
}
