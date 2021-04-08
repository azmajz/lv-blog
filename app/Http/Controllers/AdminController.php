<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['register','login']);//post
        $this->middleware('guest')->only(['register','login']);
        $this->middleware('checkRole')->only(['users','category']);
    }
    
    public function index()
    {
        return view('admin.login');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|confirmed',
        ]);

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email','password'));
        return redirect('admin/posts');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|max:255',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('email','password'))){
            return back()->with('login_error','Invalid credentials');
        }
        return redirect('admin/posts');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/admin');
    }

    public function posts(Request $request)
    {   
        if (auth()->user()->role===0 || $request->user) {
            $posts = auth()->user()->posts()->orderBy('created_at','desc')->paginate(10);
        } else {
            $posts = Post::orderBy('created_at','desc')->paginate(10);
        }
        
        return view('admin.posts')->with('posts',$posts);
    }
    
    public function users()
    {
        // Check for correct user
        // if(auth()->user()->role === 0){
        //     return redirect('/admin/posts')->with('error', 'Unauthorized Page');
        // }
        $users = User::orderBy('created_at','desc')->paginate(10);
        return view('admin.users')->with('users',$users);
    }

    public function category()
    {
        // Check for correct user
        // if(auth()->user()->role === 0){
        //     return redirect('/admin/posts')->with('error', 'Unauthorized Page');
        // }
        $categories = Category::orderBy('created_at','desc')->paginate(10);
        return view('admin.category')->with('categories',$categories);
    }

}
