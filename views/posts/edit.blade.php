@extends('main')

@section('title','|Edit Post')
    
    @section('stylesheets')
        
      {!! Html::style('css/select2.min.css')!!}
        
    @endsection
    
    @section('content')
        
        <div class="row">
        
        {!! Form::model($post, ['route'=> ['post.update', $post->id], 'method'=>'PUT', 'files'=>true ])!!}
        
        <div class="col-md-8">
            {{ Form::label('title','Title:')}}
            {{ Form::text('title',null,["class"=>'form-control input-lg'])}}
            
            {{ Form::label('tags','Tags:',['class'=>'form-spacing-top'])}}
            {{ Form::select('tags[]',$tags,null,["class"=>'form-control select2-multi','multiple'=>'multiple'])}}
            
            {{ Form::label('featured_image','Update Featured Image:',['class'=>'form-spacing-top'])}}
            {{ Form::file('featured_image')}}
            
            {{ Form::label('ingredient','Ingredients:',['class'=>'form-spacing-top'])}}
            {{ Form::textarea('ingredient',null,array('class'=>'form-control','required'=>''))}}
            
            {{ Form::label('body','Recipe:',['class'=>'form-spacing-top'])}}
            {{ Form::textarea('body',null,["class"=>'form-control'])}}
            
            {{ Form::label('extra','Note:',['class'=>'form-spacing-top'])}}
            {{ Form::text('extra',null,["class"=>'form-control'])}}
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
                            {!! Html::linkRoute('post.show','Cancel',array($post->id),
                            array('class'=>'btn btn-danger btn-block'))!!}
                            
                        </div>
                            <div class="col-sm-6">
                            {{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block'])}}
                            
                        </div>
                            
                        </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
            <hr>
            <hr>
        
        
    @endsection
    
     @section('scripts')
        
     
      {!! Html::script('js/select2.min.js')!!}
      
       <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
      </script>
        
    @endsection