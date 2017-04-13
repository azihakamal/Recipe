<!DOCTYPE html>
<html lang="en">
  <head>
   @include('partials._head')
  </head>
  <body>
  
 <div style="padding-right:40px;padding-left:40px;">
 @include('partials._nav')
 </div>
 
  <div class="container" style="padding-top:150px">
  
  @include('partials._messages')
    @yield('content')
    
  <hr>
    @include('partials._footer')
  </div>
    
    @include('partials._javascript')
    
    @yield('scripts')
    
     </body>
</html>