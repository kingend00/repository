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
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <style>
            body{
                background-color: white;
            }
            .full-height{
              width:76%;
              height: auto;
              min-height: 94%;
              float: left;
              background-color: white;
            }
            #sidebar-global{
                float: left;
                width: 20%;
                margin-right:2%;
                margin-left:2%;
                margin-top:2%;
            }
            #sidebar-global a {
                text-decoration: none;
            }
            #sidebar-global ul {
                list-style-type: none;
            }
            #sidebar-global ul li {
                margin-top:10px;
                margin-bottom:10px;
                font-size:18px;
            }
            #sidebar-global ul li a:hover {
                color: #16a085;
            }
            #app{
                height: 100%;
            }
            #wrapper{
                height: 100%;
            }
            #page{
                height: 100%;
            }
            #copyright{
                width: 100%;
                padding:0;
                height: auto;
                background-color: gray;
            }
            #copyright p {
                margin-bottom: 1%;
                margin-top: 1%;
            }
        </style>
        <!-- Styles -->
    </head>
    <body>
        <div id="app">
            <div class="flex-center position-ref full-height">
                <div>
                    <router-view></router-view>
                    </div>
                </div>
                <div id="sidebar-global">                    
                        <category-group></category-group>          
                </div>
                <div id="copyright">
                    <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://hoangx.com/">Hoangx</a> | Design by <a href="http://templated.co" rel="nofollow">ROGTEAM</a>.</p>
                </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>  
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>

        <script type="text/javascript">
            $(function() {
                var offset = $("#sidebar-global").offset();
                var topPadding = 80;
                $(window).scroll(function() {
                    if ($(window).scrollTop() > offset.top) {
                        $("#sidebar-global").stop().animate({
                            marginTop: $(window).scrollTop() - offset.top + topPadding
                        });
                    } else {
                        $("#sidebar-global").stop().animate({
                            marginTop: '2%'
                        });
                    };
                });
            });
        </script>
    </body>
</html>
