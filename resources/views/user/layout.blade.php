<!doctype html>
<html lang="en">
  <head>
    
    @include('user.head')

    <title>@yield('title')</title>

  </head>
  <body>
    
    @include('user.nav')

    @yield('content')
    
    <!-- Optional JavaScript; choose one of the two! -->

    @include('user.scripts')

  </body>
</html>
