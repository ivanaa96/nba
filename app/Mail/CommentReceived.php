<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Team;
use App\Models\Comment;

class CommentReceived extends Mailable
{
    private $comment;
    private $team;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, Team $team_id)
    {
        $this->comment = $comment;
        $this->team = $team_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.comment-received', [
            'team' => $this->team,
            'comment' => $this->comment
        ])
            ->subject('Comment received');
    }
}
