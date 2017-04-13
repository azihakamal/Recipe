<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Tag;

class SinglepostController extends Controller
{
    
    
    public function show($id)
    {
        $post = Post::find($id);
        
        return view('posts.recent')->withPost($post);
    }

    
}
