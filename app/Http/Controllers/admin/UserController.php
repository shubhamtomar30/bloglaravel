<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index' , compact('users'));
    }

    public function update(Request $data,$id){

        // print_r($data->all());
        // echo $id;
        $users = User::find($id);
        $users->name=$data->name;
        $users->email=$data->email;
        $users->save();
        Toastr::success('Data updated successfully :)');
        return redirect()->back();
    }

    public function delete($id){
        echo $id;
        $user = User::find($id);
        $user->delete();
        Toastr::success('Data deleted successfully :)');
        return redirect()->back();
    }
}
