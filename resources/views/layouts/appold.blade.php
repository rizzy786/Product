<html>
    <head>
        <title>Production Project</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href = {{ asset('/css/main.css') }} rel = "stylesheet">
        <script src = "{{ asset('js/app.js')}}"></script>
        <script src = "{{ asset('js/component2.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://js.stripe.com/v3/"></script>

    </head>
    <body>
       <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
             <li class="nav-item">
                 <button style="background:none; border:none" class="nav-link home">Home <span class="sr-only">(current)</span></button>
            </li>
            <li class="nav-item">
                <button style="background:none; border:none" class="nav-link product">Products</button>
            </li>

            <li class="nav-item">
                <button style="background:none; border:none" class="nav-link cart">Cart</button>
            </li>
           </ul>
        </div>


           <div>
<!--
               <x-jet-dropdown align="right" width="48">
                   <x-slot name="trigger">
                   </x-slot>

                   <x-slot name="content">
-->
               @if (Route::has('login'))
               @auth
                       <form method="POST" action="{{ route('logout') }}">
                           @csrf

                           <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                               {{ Auth::user()->name }} ({{ __('Logout') }})
                           </x-jet-dropdown-link>
                       </form>
                   @else
                       <a href="{{ route('login') }}">Login</a>
                       @if (Route::has('register'))
                           <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                   @endif
                @endauth
           @endif

       <!--
                   </x-slot>
               </x-jet-dropdown>
-->
           </div>








    </nav>

   <!--
    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="50" fill="currentColor" class="bi bi-filter-left" viewBox="0 0 16 16">
        <path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
    </svg>
    -->
        <div class = "container">
            @yield('content')
        </div>
    </br>

    <footer>
        <p>Copyright <span>&#169;</span> 2021 Rizwan - All Rights Reserved. </p>
    </footer>

    </body>
</html>

