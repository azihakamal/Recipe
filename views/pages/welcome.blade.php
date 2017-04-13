@extends('main')

@section('title','|Home')

@section('content')
  
  <!--slide show-->
  
  

    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Carousel indicators -->

        <ol class="carousel-indicators">

            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

            <li data-target="#myCarousel" data-slide-to="1"></li>

            <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>

        </ol>   

        <!-- Wrapper for carousel items -->

        <div class="carousel-inner">

            <div class="item active">

                <img src="images/slide/pic1.jpg" alt="First Slide" class="center-block">

            </div>

            <div class="item">

                <img src="images/slide/pic2.jpg" alt="Second Slide" class="center-block">

            </div>

            <div class="item">

                <img src="images/slide/pic3.jpg" alt="Third Slide" class="center-block">

            </div>
              
              <div class="item">

                <img src="images/slide/pic4.jpg" alt="fourth Slide" class="center-block">

            </div>
              
              <div class="item">

                <img src="images/slide/pic5.jpg" alt="fifth Slide" class="center-block">

            </div>

        </div>

        <!-- Carousel controls -->

        <a class="carousel-control left" href="#myCarousel" data-slide="prev">

            <span class="glyphicon glyphicon-chevron-left"></span>

        </a>

        <a class="carousel-control right" href="#myCarousel" data-slide="next">

            <span class="glyphicon glyphicon-chevron-right"></span>

        </a>

    </div>


  
<!--This is a first div-->

<div class="container">
    <div class="row" style="padding-top:20px">
        <div class="col-md-12">
         <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                
                <h1>Welcome!</h1>
                <p>Thank you for visiting our website.</p>
                <p><a class="btn btn-primary btn-lg" href="{{url('/about')}}" role="button">Learn more</a></p>
             
            </div>
                <div class="col-md-5 col-md-offset-1">
                    <img src="images/pic4.jpg">
                    <img src="images/pic5.jpg">
                </div>
        </div>
         </div>
           
        </div>
    </div>
        <div>
        <hr>
            <h1 style="font-size:50px;font-weight: bold;color:#228B22">Recent Post</h1>
        </div>
        
        <div class="row">
            <div class="col-md-8">
            @foreach($posts as $post)
            <div class=row>
            
            
            <h2>{{ $post-> title}}</h2>
            
            <div class="col-md-6"style="padding-top:50px">
            
            <img src="{{ asset('image/'. $post->image )}}">
                
            </div>
                <div class="col-md-6"style="padding-top:50px">
                
                <p>{{substr($post->body,0,300)}} {{strlen($post->body) > 300 ? "......" : ""}}
                <a href="{{route('recent.show',$post->id)}}" class="btn btn-primary btn-sm">Read More</a></p>
                
                </div>
                
            <div class="tags">
                @foreach($post->tags as $tag)
                    <a href="{{route('taglink.show',$tag->id)}}"><span class="label label-success">{{$tag->name}}</span></a>
                @endforeach
            </div>
            
            </div>
                <hr>
             @endforeach
             
            
            </div>
            <div class="col-md-3 col-md-offset-1">
            <h2>Latest News</h2>
                @foreach($posts as $post)
                    
                    <a href="{{route('recent.show',$post->id)}}"><p>{{ $post-> title}}</p></a>
                    
                @endforeach
                    
            </div>
        </div>
        
</div>

 @endsection 