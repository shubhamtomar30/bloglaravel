<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index(){
        $post = Post::latest()->get();
        $cat = Category::all();
        return view('admin.post.index' , compact('post') , compact('cat'));
    }

    public function add_post(){
        $cat = Category::all();
        return view('admin.post.add_post' , compact('cat'));
    }

    public function store(REQUEST $a){
        // echo "<pre>";
        // print_r($a->all());
        // die;
        // $cat_id = Categary::find($a->categary);
        $slug = Str::slug($a->title , '-');
        $this->validate($a, [
            'title' => 'required|max:255|unique:posts',
            'categary' => 'required|max:255',
            'image' => 'required|mimes:jpg,png,bmp,jpeg',
            // 'category' => 'required',
            // 'tags' => 'required',
            // 'body' => 'required',
            'body' => 'max:2000'
        ]);
        $files = $a->file('image');
        $filename = 'image'.time().'.'.$a->image->extension();
        $files->move("upload/post/" , $filename);
        $data = new Post();
        $data->user_id = Auth::id();
        $data->title = $a->title;
        $data->category_id = $a->categary;
        $data->slug = $slug;

        $data->image = $filename;
        $data->body = $a->body;
        if(isset($a->status)){
            $data->status=1;
        }
        $data->save();
        $tags = [];
        $string_tags = array_map('trim' , explode(',' , $a->tags));
        foreach($string_tags as $t){
            array_push($tags , ['name'=>$t]);
        }
        $data->tags()->createMany($tags);
        // dd($tags);
        // echo "<pre>";
        // print_r($string_tags);
        // die;
        Toastr::success('Data updated successfully :)');
        return redirect('admin/post');
    }

    public function post_view($id){
        $post = Post::find($id);
        return view('admin.post.post_view' , compact('post'));
    }

    public function update(Request $data , $id){
        if($data->title == Post::find($id)->title){
            $this->validate($data, [
                'title' => 'required|max:255',
                // 'slug' => 'required|max:255',
                'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
                'categary' => 'required',
                // 'tags' => 'required',
                'body' => 'required',
                // 'description' => 'max:255'
            ]);
        }
        else{
            $this->validate($data, [
                'title' => 'required|max:255',
                // 'slug' => 'required|max:255',
                'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
                'categary' => 'required',
                // 'tags' => 'required',
                'body' => 'required',
                // 'description' => 'max:255'
            ]);
        }

        $update = Post::find($id);
        if(isset($data->image)){
            $files = $data->file('image');
            $filename = 'image'.time().'.'.$data->image->extension();
            $files->move("upload/post/" , $filename);
            $destination = "upload/post/".$update->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        }
        else{
            $filename = $update->image;
        }
        $slug = Str::slug($data->title , '-');
        $update->user_id = Auth::id();
        $update->title = $data->title;
        $update->category_id = $data->categary;
        $update->slug = $slug;

        $update->image = $filename;
        $update->body = $data->body;
        if(isset($data->status)){
            $update->status=1;
        }
        else{
            $update->status=0;
        }
        $update->save();
        $update->tags()->delete();
        $tags = [];
        $string_tags = array_map('trim' , explode(',' , $data->tags));
        foreach($string_tags as $t){
            array_push($tags , ['name'=>$t]);
        }
        $update->tags()->createMany($tags);

        Toastr::success('Data updated successfully :)');
        return redirect('admin/post');
    }

    public function delete(){

    }
}
