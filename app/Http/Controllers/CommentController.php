<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $a , $post){
        $this->validate($a, ['message' => 'required|max:1000']);
        $comment = new Comment();
        $comment->post_id = $post;
        $comment->user_id = Auth::id();
        $comment->message = $a->message;
        $comment->save();
        return redirect()->back();
    }
}
