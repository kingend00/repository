<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/default.css')}}">
        <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
        <!-- Styles -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div id="app">
                <div id="wrapper">
                    <div id="menu-wrapper">
                        <div id="menu" class="container">
                            <ul>
                                <li class="current_page_item"><a href="#">Category Group</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Portfolio</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <!-- end #menu --> 
                    <div id="header-wrapper">
                        <div id="header" class="container">
                            <div id="logo">
                                <h1><a href="#">GrassyGreen</a></h1>
                                <p>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a></p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div id="page" class="container">
                        <div id="content">
                            <div class="title">
                                <h2>Integer sit amet aliquet</h2>
                                <span class="byline">Phasellus nec erat sit amet nibh pellentesque congue</span> </div>
                            <p>This is <strong>GrassyGreen</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
                            <p>Consectetuer adipiscing elit. Nam pede erat, porta eu, lobortis eget, tempus et, tellus. Etiam neque. Vivamus consequat lorem at nisl. Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris. Proin eu wisi suscipit nulla suscipit interdum. Aenean lectus lorem, imperdiet at, ultrices eget, ornare et, wisi. Pellentesque adipiscing purus ac magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.  Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. </p>
                        </div>
                        <div id="sidebar">
                            <div class="box2">
                                <div class="title">
                                    <h2>Integer gravida</h2>
                                </div>
                                <ul class="style2">
                                    <li><a href="#">Amet turpis, feugiat et sit amet</a></li>
                                    <li><a href="#">Ornare in hendrerit in lectus</a></li>
                                    <li><a href="#">Semper mod quis eget mi dolore</a></li>
                                    <li><a href="#">Quam turpis feugiat sit dolor</a></li>
                                    <li><a href="#">Amet ornare in hendrerit in lectus</a></li>
                                    <li><a href="#">Quam turpis feugiat sit dolor</a></li>
                                    <li><a href="#">Consequat etiam lorem phasellus</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                    
                
                <div id="footer-wrapper">
                    <div id="footer" class="container">
                        <div id="box1">
                            <div class="title">
                                <h2>Latest Post</h2>
                            </div>
                            <ul class="style1">
                                <li><a href="#">Semper mod quis eget mi dolore</a></li>
                                <li><a href="#">Quam turpis feugiat sit dolor</a></li>
                                <li><a href="#">Amet ornare in hendrerit in lectus</a></li>
                                <li><a href="#">Consequat etiam lorem phasellus</a></li>
                                <li><a href="#">Amet turpis, feugiat et sit amet</a></li>
                                <li><a href="#">Semper mod quisturpis nisi</a></li>
                            </ul>
                        </div>
                        <div id="box2">
                            <div class="title">
                                <h2>Popular Links</h2>
                            </div>
                            <ul class="style1">
                                <li><a href="#">Semper mod quis eget mi dolore</a></li>
                                <li><a href="#">Quam turpis feugiat sit dolor</a></li>
                                <li><a href="#">Amet ornare in hendrerit in lectus</a></li>
                                <li><a href="#">Consequat etiam lorem phasellus</a></li>
                                <li><a href="#">Amet turpis, feugiat et sit amet</a></li>
                                <li><a href="#">Semper mod quisturpis nisi</a></li>
                            </ul>
                        </div>
                        <div id="box3">
                            <div class="title">
                                <h2>Follow Us</h2>
                            </div>
                            <p>Proin eu wisi suscipit nulla suscipit interdum. Aenean lectus lorem, imperdiet magna.</p>
                            <ul class="contact">
                                <li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
                                <li><a href="#" class="icon icon-facebook"><span>Facebook</span></a></li>
                                <li><a href="#" class="icon icon-dribbble"><span>Dribbble</span></a></li>
                                <li><a href="#" class="icon icon-tumblr"><span>Tumblr</span></a></li>
                                <li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
                            </ul>
                                <a href="#" class="button">Read More</a> </div>
                        </div>
                    </div>
                    {{-- <example-component></example-component> --}}
                    <router-view></router-view>
                </div>
                <div id="copyright" class="container">
                    <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
                </div>
               
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
