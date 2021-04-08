<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;
class VerifyPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $post = Post::find($request->id);
         // Check for correct user
        if(auth()->user()->id!==$post->user_id){
            return redirect('/admin/posts')->with('error', 'Unauthorized Page Access');
        }
        return $next($request);
    }
}
