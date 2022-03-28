<?php

namespace App\Http\Controllers;

use App\Models\commentreply;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentreplyController extends Controller
{
    public function store_reply(Request $a , $comment){
        $this->validate($a, ['message' => 'required|max:1000']);
        $commentReply = new commentreply();
        $commentReply->comment_id = $comment;
        $commentReply->user_id = Auth::id();
        $commentReply->message = $a->message;
        $commentReply->save();

        // Success message
        Toastr::success('success', 'The comment replied successfully ;)');
        return redirect()->back();
    }
}
