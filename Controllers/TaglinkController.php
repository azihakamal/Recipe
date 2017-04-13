<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Tag;


class TaglinkController extends Controller
{
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $tag = Tag::find($id);
        
        return view('posts.tagpost')->withTag($tag);
    }

    
}
