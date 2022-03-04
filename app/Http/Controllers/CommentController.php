<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Team;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentReceived;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Team $team_id, StoreCommentRequest $request)
    {
        DB::listen(function ($query) {
            info($query->sql);
        });

        $data = $request->validated();
        $comment = new Comment($data);
        $comment->team()->associate($team_id);
        $comment->user()->associate(auth()->user());
        $comment->save();

        Mail::to($team_id)->send(
            new CommentReceived($comment, $team_id)
        );

        return back();
    }
}
