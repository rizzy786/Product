<html>
    <head>
        <title>Component 3</title>
        
        <script src = "{{ asset('js/app.js')}}"></script>
        <script src = "{{ asset('js/component2.js')}}"></script>
        <link href = {{ asset('/css/main.css') }} rel = "stylesheet">
        
    </head>
    <body>
        <div class = "container">
            @yield('content')
           
        </div>
    </br>
    </body>
</html>

