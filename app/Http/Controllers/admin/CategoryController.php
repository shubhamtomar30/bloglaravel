<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.categary.index' , compact('category'));
    }


    public function store(Request $a){
        // echo "hello";
        // echo "<pre>";
        // print_r($a->all());
        // die;
        $this->validate($a, [
            'name' => 'required|max:255|unique:categories',
            'slug' => 'required|max:255',
            'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
            // 'category' => 'required',
            // 'tags' => 'required',
            // 'body' => 'required',
            'description' => 'max:255'
        ]);
        $files = $a->file('image');
        $filename = 'image'.time().'.'.$a->image->extension();
        $files->move("upload/categary/" , $filename);
        $data = new Category();
        $data->name = $a->name;
        $data->slug = Str::slug($a->name , '-');
        $data->description = $a->description;
        $data->image = $filename;
        $data->save();
        Toastr::success('Data updated successfully :)');
        return redirect()->back();
    }

    public function update(Request $data,$id){

        // print_r($data->all());
        // echo $id;

        if($data->name == Category::find($id)->name){
            $this->validate($data, [
                'name' => 'required|max:255',
                'slug' => 'required|max:255',
                'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
                // 'category' => 'required',
                // 'tags' => 'required',
                // 'body' => 'required',
                'description' => 'max:255'
            ]);
        }
        else{
            $this->validate($data, [
                'name' => 'required|max:255|unique:categories',
                'slug' => 'required|max:255',
                'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
                // 'category' => 'required',
                // 'tags' => 'required',
                // 'body' => 'required',
                'description' => 'max:255'
            ]);
        }

        $category = Category::find($id);
        if(isset($data->image)){
            $files = $data->file('image');
            $filename = 'image'.time().'.'.$data->image->extension();
            $files->move("upload/categary/" , $filename);
            $destination = "upload/categary/".$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        }
        else{
            $filename = $category->image;
        }
        $category->name=$data->name;
        $category->slug=$data->slug;
        $category->description=$data->description;
        $category->image=$filename;
        $category->save();
        Toastr::success('Data updated successfully :)');
        return redirect()->back();
    }

    public function delete($id){
        // echo $id;
        $category = Category::find($id);
        $destination = "upload/categary/".$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        $category->delete();
        Toastr::success('Data deleted successfully :)');
        return redirect()->back();
    }
}
