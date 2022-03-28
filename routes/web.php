<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController as AdminCommentController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CommentController as userCommentController;
use App\Http\Controllers\CommentreplyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Models\category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



//dashboard controller
Route::get('admin/dashboard', [dashboardController::class , 'index'] );
Route::get('admin/profile' , [dashboardController::class , 'show_profile']);
Route::put('admin/profile/update' , [dashboardController::class , 'update_profile']);
Route::put('admin/profile/changePassword' , [dashboardController::class , 'change_password']);

//user controller
Route::get('admin/users', [UserController::class , 'index']);
Route::put('admin/user/update/{id}',[UserController::class, 'update']);
Route::delete('admin/user/delete/{id}',[UserController::class, 'delete']);



//auth route
Auth::routes();



Route::get('post/add_post',[PostController::class , 'add_post'] );
//home controller
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/posts', [HomeController::class, 'posts'])->name('posts');
Route::get('/categories', [HomeController::class, 'cat'])->name('categories');
Route::get('/post/{slug}', [HomeController::class, 'post_single'])->name('post_single');
Route::get('/category/{slug}' , [HomeController::class , 'category_post'])->name('category_post');
Route::get('/search' , [HomeController::class , 'search'])->name('search');
Route::get('/tag/{name}' , [HomeController::class , 'tag_post'])->name('tag_post');


//view composer
View::composer('layouts.frontend.partition.sidebar' , function($view){
    $cat = Category::take(10)->get();
    $latest_post = Post::latest()->take(3)->get();
    $recent_tag = Tag::all();
    return $view->with('cat' , $cat)->with('latest_post' , $latest_post)->with('recent_tag' , $recent_tag);
});





//user dashboard controller
Route::get('user/dashboard', [UserDashboardController::class , 'index'] );
Route::get('user/comments' , [UserDashboardController::class , 'comment']);




//categary controller
Route::get('admin/Category',[CategoryController::class , 'index'] );
Route::post('admin/categary/register', [CategoryController::class , 'store'] );
Route::put('admin/categary/update/{id}',[CategoryController::class, 'update']);
Route::delete('admin/categary/delete/{id}',[CategoryController::class, 'delete']);


//post controller
Route::get('admin/post',[PostController::class , 'index'] );

Route::post('admin/post/store', [PostController::class , 'store']);
Route::get('admin/post/post_view/{id}', [PostController::class , 'post_view']);
Route::post('admin/post/update/{id}', [PostController::class , 'update']);



//comment controller
Route::post('comment/{post}' , [CommentController::class , 'store']);






//admin/comment controller
Route::get('admin/dashboard/comment' , [AdminCommentController::class , 'index'] );





//comment reply controller
Route::post('comment_reply/{comment}', [CommentreplyController::class , 'store_reply']);
