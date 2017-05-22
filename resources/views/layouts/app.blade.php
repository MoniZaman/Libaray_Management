<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Libray Management System</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}">

    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('js/jquery.min-2.1.3.js')}}"></script>
    <!-- searchable Javascript -->
    <script src="{{asset('js/jquery.searchable.js')}}"></script>
  <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
  <script src="{{asset('js/jquery-ui.js')}}"></script>
    

    



    <style>
        body {
            font-family: 'Lato';
            background-color: #F0F8FF;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    <script type="text/javascript">
    $(document).ready(function(){
        // Show hide popover
        $(".dropdown").click(function(){
            $(this).find(".dropdown-menu").slideToggle("slow");
        });
         

    });
        $(document).on("click", function(event){

        var $trigger = $(".dropdown");

        if($trigger !== event.target && !$trigger.has(event.target).length){

            $(".dropdown-menu").slideUp("slow");

        }            

    });
 
    </script>
<script type="text/javascript">
    function check(){
            return confirm("Are you sure to delete this item");
        }
</script>
<style type="text/css">
    tr:nth-child(even) {background: #969aa4 }
    tr:nth-child(odd) {background: #9999ae}

</style>
    
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    @if(!Auth::guest())
                    <li class="dropdown">
                        <a href="#">Modules<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/home/manage_category')}}"><span class="glyphicon glyphicon-cog"></span>Manage Category</a></li>
                            <li><a href="{{url('/home/add_category')}}"><span class="glyphicon glyphicon-plus-sign">Add Category</a></li><hr>
                             <li><a href="{{url('/home/manage_author')}}"><span class="glyphicon glyphicon-cog">Manage Authors</a></li>
                            <li><a href="{{url('/home/add_author')}}"><span class="glyphicon glyphicon-plus-sign">Add Authors</a></li><hr>
                             <li><a href="{{url('/home/manage_book')}}"><span class="glyphicon glyphicon-cog">Manage Books</a></li>
                            <li><a href="{{url('/home/add_book')}}"><span class="glyphicon glyphicon-plus-sign">Add Book</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Issue Book<span class="caret"></span></a>
                         <ul class="dropdown-menu">
                            <li><a href="{{url('/home/manage_book_issue')}}"><span class="glyphicon glyphicon-cog"></span>Manage Book Issue</a></li>
                            <li><a href="{{url('/home/add_book_issue')}}"><span class="glyphicon glyphicon-plus-sign">New Book Issue</a></li>
                           
                        </ul>
                    </li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
