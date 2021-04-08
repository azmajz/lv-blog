<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Post;
use App\Models\Category;
use Image;
class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create','edit','update','destroy']);
        $this->middleware('verifyPost')->only(['edit','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->paginate(10);
        $latest_posts = Post::inRandomOrder()->take(6)->get();
        $categories = Category::get();
        return view('posts.index')->with([
            'posts'=>$posts,
            'categories'=>$categories,
            'latest_posts'=>$latest_posts,
        ]);
    }

    public function postsByCategory($id)
    {
        $posts = Post::where('category_id',$id)->paginate(10);
        $latest_posts = Post::inRandomOrder()->take(6)->get();
        $categories = Category::get();
        return view('posts.index')->with([
            'posts'=>$posts,
            'categories'=>$categories,
            'latest_posts'=>$latest_posts,
            'category'=>true,
        ]);
    }

    public function postsByUser($id)
    {
        $posts = Post::where('user_id',$id)->paginate(10);
        $latest_posts = Post::inRandomOrder()->take(6)->get();
        $categories = Category::get();
        return view('posts.index')->with([
            'posts'=>$posts,
            'categories'=>$categories,
            'latest_posts'=>$latest_posts,
            'user'=>true,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Post::where( 'title', 'LIKE', '%' . $query . '%' )->get();
        $latest_posts = Post::inRandomOrder()->take(6)->get();
        $categories = Category::get();
        return view('posts.index')->with([
            'posts'=>$posts,
            'categories'=>$categories,
            'latest_posts'=>$latest_posts,
            'search'=>$query,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        return view('admin.add-post')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:50',
            'body' => 'required|max:500',
            'category_id' => 'required',
            'post_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->user()->id;

        //cover image
        $image_file = request('post_image');
        $image = Image::make($image_file);
        Response::make($image->encode('jpeg'));

        $post->post_image = $image;
        $post->save();
        return redirect('/admin/posts')->with(['success-msg'=>'Post Created Successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $latest_posts = Post::inRandomOrder()->take(3)->get();
        $categories = Category::get();
        return view('posts.show')->with([
            'post'=>$post,
            'categories'=>$categories,
            'latest_posts'=>$latest_posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.update-post')->with(['post'=>$post,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:50',
            'body' => 'required|max:500',
            'category_id' => 'required',
            // 'author_id' => 'required',
            // 'post_image' => 'required',
        ]);
        
        $post= Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        // $post->post_image = 'image';
        $post->save();
        return redirect('/admin/posts')->with(['success-msg'=>'Post Updated Successfully']);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/admin/posts')->with(['success-msg'=>'Post Deleted Successfully']);
    
    }
}
