<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Post;
use App\Tag;
use Image;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(8);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags= Tag::all();
        return view('posts.create')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation the data
        $this->validate($request,array(
           'title'=>'required|max:150',
           'ingredient'=>'required',
           'body'=>'required',
           'featured_image'=>'sometimes|image'
           
        ));
        
        //store in the db
        $post = new Post;
        
        $post->title= $request->title;
        $post->ingredient= $request->ingredient;
        $post->body = $request->body;
        $post->extra = $request->extra;
        
        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('image/'. $filename);
            Image::make($image)->resize(350,400)->save($location);
            
            $post->image = $filename;
            }
        
        $post->save();
        
        if(isset($request->tags)){
            $post->tags()->sync($request->tags,false);
        }
        else{
             $post->tags()->sync(array());
        }
        
        
        Session::flash('success','The post was successfully save!');
        
               
      //redirect
        return redirect()->route('post.show',$post->id);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        
        return view('posts.show')->withPost($post);
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
        
        $tags= Tag::all();
        $tags2 = array();
        foreach ($tags as $tag){
            $tags2[$tag->id]= $tag->name;
        }
        
         return view('posts.edit')->withPost($post)->withTags($tags2);
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
        //validation the data
        $this->validate($request,array(
           'title'=>'required|max:150',
           'ingredient'=>'required',
           'body'=>'required',
           'featured_image'=>'sometimes|image'
           
        ));
        
        $post = Post::find($id);
        
        $post->title= $request->input('title');
        $post->ingredient= $request->ingredient;
        $post->body = $request->input('body');
        $post->extra = $request->input('extra');
        
        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('image/'. $filename);
            Image::make($image)->resize(350,400)->save($location);
            $oldFilename= $post->image;
            
            $post->image = $filename;
            
            Storage::delete($oldFilename);
            }
        
        $post->save();
        
        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }
        else{
             $post->tags()->sync(array());
        }
        
        Session::flash('success','The post was successfully saved!');
        
               
      //redirect
        return redirect()->route('post.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        
        $post->delete();
        
        Session::flash('success','The post is successfully DELETED!!');
        return redirect()->route('post.index');
    }
}
