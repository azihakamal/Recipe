<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;


class PageController extends Controller
{
    
    public function getwelcome()
    {
       $posts= Post::orderBy('created_at','desc')->limit(5)->get(); 
        
        return view('pages.welcome')->withPosts($posts);
    }
    
     public function getcontact()
    {
        return view('pages.contact');
    }
    
     public function getabout()
    {
        return view('pages.about');
    }
    
     public function getrecipes()
    {
        $posts= Post::all();
        $tags= Tag::all();
        return view('pages.recipes')->withTags($tags)->withPosts($posts);
    }
     
     public function getcreate()
    {
        return view('posts.create');
    }
    public function getindex()
    {
        return view('posts.index');
    }
   
    
}
