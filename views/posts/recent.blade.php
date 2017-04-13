@extends('main')

@section('title','|Recent Post')
    
    @section('content')
         
         <div class="container">
        <h1>{{$post->title}}</h1>
        <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('image/'. $post->image )}}">
        </div>
        
         <div class="col-md-8">
            <h3>Ingredients:</h3>
              <p class="lead">{{$post->ingredient}}</p>
               <h3>Recipe:</h3>
            <p class="lead">{{$post->body}}</p>
               <h3>Note:</h3>
            <p class="lead">{{$post->extra}}</p>
            
            <div class="tags">
                @foreach($post->tags as $tag)
                   <a href="{{route('taglink.show',$tag->id)}}"> <span class="label label-success">{{$tag->name}}</span></a>
                @endforeach
            </div>
                
         </div>   
        
        </div>
         </div> 
    @endsection