<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class dashboardController extends Controller
{
    public function index(){
        return view('admin/index');
    }

    public function show_profile(){
        $user = User::find(Auth::user()->id);
        // echo "<pre>";
        // print_r($user);
        // die;
        return view('admin/profile' , compact('user'));
    }

    public function update_profile(Request $a){
        // echo "<pre>";
        // print_r($a->all());
        // die;
        $this->validate($a, [
            'name' => 'required|max:255',
            'user_id' => 'required|max:255',
            'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
            // 'category' => 'required',
            // 'tags' => 'required',
            // 'body' => 'required',
            'description' => 'max:255'
        ]);
        $data = User::findOrFail(Auth::user()->id);
        if(isset($a->image)){
            $files = $a->file('image');
            $filename = 'image'.time().'.'.$a->image->extension();
            $files->move("upload/user/" , $filename);
            $data->user_id = $a->user_id;
            $data->name = $a->name;
            $data->image = $filename;
            $data->about = $a->about;
        }
        else{
            $data->user_id = $a->user_id;
            $data->name = $a->name;

            $data->about = $a->about;
        }



        $data->save();
        Toastr::success('Data updated successfully :)');
        return redirect('admin/profile');
    }

    public function change_password(Request $a){
        $this->validate($a, [
            'old_password' => 'required',
            'password' => 'required|max:255|confirmed'
        ]);

        //cross checking old-password
        $oldpass = Auth::user()->password; //hashed
        if(Hash::check($a->old_password , $oldpass)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($a->password);
            $user->save();
            //logout
            Auth::logout();
            return redirect('login');
        }
        else{
            Toastr::error('Enter the correct old password :(');
            return redirect()->back();
        }
    }

}
