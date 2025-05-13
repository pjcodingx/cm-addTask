<!---

This is the default layout for the todo app.
The Structure 

-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title", "Todo App")</title>

    <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet">
    @yield('style')

  </head>
  <body>
    
        @include('include.header') <!-- For the header of each page -->
        <div class="content-area">
            @yield('content')
        </div>
        @include('include.footer') <!-- For the footer of each page -->

        


    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
  </body>
</html>