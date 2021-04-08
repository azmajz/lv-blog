<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
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

Route::redirect('/','/post');
Route::get('/category/{cat}',[PostsController::class,'postsByCategory']);
Route::get('/author/{id}',[PostsController::class,'postsByUser']);
Route::get('/search',[PostsController::class,'search']);

//Auth Routes
// Route::get('/admin',[AdminController::class,'index']);
// Route::post('/admin',[AdminController::class,'login'])->name('admin.login');
Route::redirect('/admin','/admin/posts');
Route::view('/admin/login','admin.login')->name('admin.login')->middleware('guest');
Route::post('/admin/login',[AdminController::class,'login'])->name('login');
Route::view('/admin/register','admin.register')->middleware('guest');
Route::post('/admin/register',[AdminController::class,'register'])->name('register');
Route::post('/admin/logout',[AdminController::class,'logout'])->name('logout');


// Route::resource('/post',PostsController::class);
Route::get('/post',[PostsController::class,'index']);
Route::get('/post/{post}',[PostsController::class,'show']);


//posts
Route::get('/admin/add-post',[PostsController::class,'create'])->name('post.create');
Route::post('/admin/add-post',[PostsController::class,'store'])->name('post.store');
Route::get('/admin/update-post/{id}',[PostsController::class,'edit'])->name('post.edit');
Route::put('/admin/update-post/{id}',[PostsController::class,'update'])->name('post.update');
Route::delete('/admin/delete-post/{id}',[PostsController::class,'destroy'])->name('post.destroy');

//Category
Route::get('/admin/add-category',[CategoriesController::class,'create'])->name('category.create');
Route::post('/admin/add-category',[CategoriesController::class,'store'])->name('category.store');
Route::get('/admin/update-category/{id}',[CategoriesController::class,'edit'])->name('category.edit');
Route::put('/admin/update-category/{id}',[CategoriesController::class,'update'])->name('category.update');
Route::delete('/admin/delete-category/{id}',[CategoriesController::class,'destroy'])->name('category.destroy');
//User
Route::get('/admin/add-user',[UsersController::class,'create']);
Route::post('/admin/add-user',[UsersController::class,'store']);
Route::get('/admin/update-user/{id}',[UsersController::class,'edit']);
Route::put('/admin/update-user/{id}',[UsersController::class,'update']);
Route::delete('/admin/delete-user/{id}',[UsersController::class,'destroy']);

Route::get('/admin/posts',[AdminController::class,'posts']);
Route::get('/admin/category',[AdminController::class,'category']);
Route::get('/admin/users',[AdminController::class,'users']);
// Route::get('/', function () {
//     return view('main');
// });

// Route::view('/tester','app',['data'=>'sample text']);