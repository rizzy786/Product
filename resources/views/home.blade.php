@extends('layouts.appold')
@section('content')

    <body>
        <main>
            <section class="presentation">
                <div class="introduction">
                    <div class="intro-text">
                        <h1>Desktop for the Future</h1>
                        <p>
                            27.5" 4K UHD Display

                        </p>
                    </div>
                    <div class="cta">
                        <a href="{{ url('/product') }}" class="btn btn-primary btn-lg">View more Products</a>
                        <button class="cta-add">Add To Cart</button>
                    </div>
                </div>
                <div class="cover">
                    <img src="./image/desktop.jpg"/>
                </div>
            </section>
        </main>
    </body>

@endsection
