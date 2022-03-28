<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('User.index');
    }

    public function comment(){
        $comments = Comment::where('user_id', Auth::id())->latest()->get();
        return view('User.comments.index' , compact('comments'));
    }
}
