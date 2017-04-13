@extends('main')

@section('title','|Recipes')
  
  @section('content')
<!--This is a first div-->

<div class="container">

        <div class="row">
            <div class="col-md-12">

            
            <h1>Recipes</h1>
            
            
                <div class=row>
                <div class="col-md-3"style="padding-top:50px">                    
                <div class="list-group">
        
        @foreach($tags as $tag)
        
        <a href="{{route('taglink.show',$tag->id)}}" class="list-group-item">{{$tag->name}}</a>
                            @endforeach
        
        </div>
            </div>
                
                <div class="col-md-8 col-md-offset-1">
                              
               
                
                  <div class="row">
                  @foreach($posts as $post)
                  <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                  <img src="{{ asset('image/'. $post->image )}}">
                  
                  <div class="caption">
                  <h2 style="text-align:center"><a href="{{route('recent.show',$post->id)}}" >{{ $post-> title}}</a></h2>
                  </div>
                  </div>
                  </div>
                         @endforeach
                  </div>
                  
               
   
                </div>
                               
</div>
</div>
</div>

@endsection