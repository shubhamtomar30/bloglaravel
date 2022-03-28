<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *



     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->take(6)->get();
        return view('index' , compact('posts'));
    }

    public function posts(){
        Paginator::useBootstrap();
        $posts = Post::where('status' , 1)->latest()->paginate(4);
        return view('posts' , compact('posts'));
    }

    public function cat(){
        $cat = Category::latest()->get();
        return view('categories' , compact('cat'));
    }

    public function post_single($slug){
        // echo $id;

        $posts = Post::where('slug' , $slug)->first();
        // $comment = Comment::where('post_id' , $posts->id)->get();
        // echo "<pre>";
        // print_r($comment);
        // die;
        return view('single_post' , compact('posts'));
    }

    public function category_post($slug){

        $cat = Category::where('slug' , $slug)->first();
        // echo "<pre>";
        // print_r($cat);
        // die;
        Paginator::useBootstrap();
        $posts = $cat->posts()->latest()->paginate(4);

        // echo "<pre>";
        // print_r($posts);
        // die;
        return view('category_post' , compact('posts'));
    }


    public function search( Request $a){
        $this->validate($a, ['search' => 'required|max:255']);
        $search = $a->search;
        $posts = Post::where('title', 'like', "%$search%")->paginate(10);
        $posts->appends(['search' => $search]);

        // echo "<pre>";
        // print_r($posts);
        // die;
        $categories = category::all();
        return view('search' , compact( 'categories' , 'posts' , 'search' ));
    }

    public function tag_post($name){

        $query = $name;
        $tags = Tag::where('name', 'like', "%$name%")->paginate(10);
        // echo "<pre>";
        // print_r($tags);
        // die;
        return view('tag_posts' , compact( 'tags' , 'query'));
    }
}
