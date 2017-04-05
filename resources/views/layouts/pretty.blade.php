<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uBooks - @yield('title')</title>
    <link href="{{ URL::to('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link href="{{ URL::to('fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/Alex_NavDefault.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/Footer-Basic.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/MUSA_carousel-product-cart-slider.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/MUSA_navbar.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/Navigation-with-Search.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/styles.css') }}" rel="stylesheet">
</head>

<body>
<div></div>
<div>
    <nav class="navbar navbar-default navigation-clean-search">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="{{ URL::to('/') }}"> <img
                            src="{{ URL::to('img/uBooks.png') }}"></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span
                            class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="{{ URL::to('/') }}">All Listings</a></li>

                </ul>
                {{--<form class="navbar-form navbar-left" target="_self">--}}
                    {{--<div class="form-group">--}}
                        {{--<label class="control-label" for="search-field"><i--}}
                                    {{--class="glyphicon glyphicon-search"></i></label>--}}
                        {{--<input class="form-control search-field" type="search" name="search" id="search-field">--}}
                    {{--</div>--}}
                {{--</form>--}}
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::user() && Auth::user()->admin)
                        <li><a style="margin-left:2em;" class="btn btn-default navbar-btn navbar-right action-button" role="button" href="{{ URL::to('/administration') }}">Administration</a></li>
                    @endif
                    @if(Auth::user())
                        <li><a style="margin-left:2em;" class="btn btn-default navbar-btn navbar-right action-button" role="button" href="{{ URL::to('/messages') }}">My Messages</a></li>
                    @endif
                <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a class="btn btn-default navbar-btn navbar-right action-button" role="button"
                               href="{{ route('login') }}">Login</a></li>
                        <li><a class="btn btn-default navbar-btn navbar-right action-button" style="margin-left:2em;"
                               role="button"
                               href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a style="margin-left:2em;" href="#" class="dropdown-toggle btn btn-default navbar-btn navbar-right action-button"
                               role="button" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href = ' {{ URL::to('/mylistings') }}'>My Listings</a>
                                </li>
                                <li>
                                    <a href='{{ URL::to('/profile') }}'>My Profile</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="carousel slide" data-ride="carousel" id="carousel-1">
        <div class="carousel-inner" role="listbox">
            <div class="item active"><img src="{{ URL::to('img/slider1.png') }}" alt="Slide Image"/></div>
        </div>

    </div>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#"><i class="fa fa-flask"></i> Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-database"></i>
                            Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><i class="fa fa-home"></i> Action</a></li>
                            <li><a href="#"><i class="fa fa-flask"></i> Another action</a></li>
                            <li><a href="#"><i class="fa fa-magic"></i> Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-link"></i> Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-user"></i> One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <!----------------------SEARCH BAR--------------------------------------->
                <form class="navbar-form navbar-left" role="searchReq" action="./search" method="GET">
                    <div class="form-group">
                        <div>
                            <span><i class="fa fa-search"></i></span>
                            <input type="text" name="searchReq" class="form-control" placeholder="Search for something">
                        </div>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><i class="fa fa-link"></i> Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
        @yield('content')
    </div>
</div>
<div class="footer-basic">
    <footer>
        <p class="copyright">uBooks © 2017</p>
    </footer>
</div>
<div></div>
<div></div>
<div></div>
<div></div>
<script src="{{URL::to('js/jquery.min.js')}}"></script>
<script src="{{URL::to('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
