@extends('main')

@section('title','|View New Post')
    
    @section('content')
        
        <div class="row">
        
        <div class="col-md-8">
        
            <h1>{{$post->title}}</h1>
                <img src="{{ asset('image/'. $post->image )}}">
                <h3>Ingredients:</h3>
                   <p class="lead">{{$post->ingredient}}</p>
                    <h3>Recipe</h3>
        <p class="lead">{{$post->body}}</p>
            <h3>Note:</h3>
            <p class="lead">{{$post->extra}}</p>
            <hr>
            
            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="label label-success">{{$tag->name}}</span>
                @endforeach
            </div>
            
        </div>
            
            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Create At:</dt>
                            <dd>{{date('M j,Y h:ia', strtotime($post->created_at))}}</dd>
                    </dl>
                        <dl class="dl-horizontal">
                        <dt>Last Updated:</dt>
                            <dd>{{date('M j,Y h:ia', strtotime($post->updated_at))}}</dd>
                    </dl>
                        <hr>
                        <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('post.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block'))!!}
                            
                        </div>
                            <div class="col-sm-6">
                            
                            {!! Form::open(['route'=>['post.destroy',$post->id],'method'=>'DELETE'])!!}
                            
                            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
                            
                            {!! Form::close() !!}
                        </div>
                            
                            
                        </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! Html::linkRoute('post.index','<< See All Posts',[],['class'=>'btn btn-default btn-block btn-h1-spacing'])!!}
                            
                                </div>
                            </div>
                </div>
            </div>
            
        </div>
        
        
    @endsection