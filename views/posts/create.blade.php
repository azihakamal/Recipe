@extends('main')

@section('title','|Create New Post')
    
    @section('stylesheets')
        
      {!! Html::style('css/parsley.css')!!}
      {!! Html::style('css/select2.min.css')!!}
        
    @endsection
    
    @section('content')
        
            
            <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
                <hr>
                
                {!! Form::open(array('route'=>'post.store', 'data-parsley-validate'=>'', 'files'=> true)) !!}
                
                {{ Form::label('title','Title:')}}
                {{ Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'150'))}}
                
                {{Form::label('tags','Tags:', ['class'=>'form-spacing-top'])}}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                            @foreach($tags as $tag)
                                <option value='{{$tag->id}}'>{{$tag->name}}</option>
                            @endforeach
                </select>
                    
                {{ Form::label('featured_image','Upload Featured Image:',['class'=>'form-spacing-top'])}}
                {{ Form::file('featured_image')}}
                
                {{ Form::label('ingredient','Ingredients:',['class'=>'form-spacing-top'])}}
                {{ Form::textarea('ingredient',null,array('class'=>'form-control','required'=>''))}}
                
                {{ Form::label('body','Recipe:',['class'=>'form-spacing-top'])}}
                {{ Form::textarea('body',null,array('class'=>'form-control','required'=>''))}}
                
                {{ Form::label('extra','Note:',['class'=>'form-spacing-top'])}}
                {{ Form::text('extra',null,array('class'=>'form-control','data-parsley-required'=>'false'))}}
                
                {{ Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}
                
                {!! Form::close() !!}
                
            </div>
            </div>﻿
        
    @endsection
    
    @section('scripts')
        
      {!! Html::script('js/parsley.min.js')!!}
      {!! Html::script('js/select2.min.js')!!}
      
      <script type="text/javascript">
        $('.select2-multi').select2();
      </script>
        
    @endsection