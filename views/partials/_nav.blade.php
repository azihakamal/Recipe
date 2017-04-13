 
  <!--Default Navbar-->

  
  <nav class="navbar navbar-default navbar-fixed-top" style="padding-right:30px;padding-left:30px;">
  <div class="row">
 <div class="col-md-5">
  <img src="/images/logo.jpg" alt="Recipe Collection">
 </div>
  <div class="col-md-6 col-md-offset-1">

        <script src="js/search.js">
           
        </script>
<gcse:search></gcse:search>

  </div>
 </div> 
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="{{ url('/welcome') }}"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{Request::is('welcome') ? "active" : "" }}"><a href="{{ url('/welcome') }}">Home</a></li>
        <li class="{{Request::is('about') ? "active" : "" }}"><a href="{{ url('/about') }}">About</a></li>
        <li class="{{Request::is('recipes') ? "active" : "" }}"><a href="{{ url('/recipes') }}">Recipes</a></li>
        <li class="{{Request::is('contact') ? "active" : "" }}"><a href="{{ url('/contact') }}">Contact</a></li>
                  
            
          </ul>
        </li>
      </ul>
 
      <ul class="nav navbar-nav navbar-right">
        
        @if(Auth::check())
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, {{ Auth::user()->name}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            
            <li><a href="{{ route('post.index') }}">Posts</a></li>
            <li><a href="{{ route('tags.index') }}">Tags</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('auth/logout') }}">Logout</a></li>
            
          </ul>
        </li>
          
        @else
          
           <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('auth/register') }}">Registration</a></li>
               <li role="separator" class="divider"></li>
            <li><a href="{{ url('auth/login') }}">Login</a></li>
           
          </ul>
        </li>
         
       @endif
          
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  