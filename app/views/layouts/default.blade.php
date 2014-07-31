<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Sales Lead</title>

    <!-- Bootstrap core CSS -->
    <link href="{{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}}" rel="stylesheet">

    <!-- Typeahead CSS -->
    <link href="{{{ asset('assets/plugins/typeahead/css/typeahead.css') }}}" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="{{{ asset('assets/plugins/select2-3.5.1/css/select2.css') }}}" rel="stylesheet">
    <link href="{{{ asset('assets/plugins/select2-3.5.1/css/select2-bootstrap.css') }}}" rel="stylesheet">

     <!-- font-font-awesome CSS -->
    <link href="{{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{{ asset('assets/css/saleslead.css') }}}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sales Lead</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li {{ Request::is('/') ? 'class="active"' : '' }}>
              {{ HTML::link('/','Home') }}
            </li>
            <li {{ Request::is('projects*') ? 'class="active"' : '' }} class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>{{ HTML::link('projects/create','New Project') }}</li>
                <li>{{ HTML::link('projects/assigned', 'Assigned Projects') }}</li>
                <li>{{ HTML::link('projects/listing','Open Projects') }}</li>
                <li>{{ HTML::link('projects/assign','Assign Projects') }}</li>
              </ul>
            </li>
             <li {{ Request::is('contacts*') ? 'class="active"' : '' }}>
              {{ HTML::link('contacts','Contacts') }}
            </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
              <ul class="dropdown-menu">
                @include('layouts._file_maintenance')
                <li class="dropdown-header">Users Maintenance</li>
                <li>{{ HTML::link('departments', 'Departments') }}</li>
                <li>{{ HTML::link('users', 'Users') }}</li>
                <li>{{ HTML::link('roles', 'Roles') }}</li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->email ? : '' }} <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>{{ HTML::link('profile', 'Profile') }}</li>
                <li>{{ HTML::link('logout', 'Logout') }}</li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      @yield('content')

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{{ asset('assets/plugins/jquery/jquery-2.1.1.min.js') }}}"></script>
    <script src="{{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}}"></script>

    <script src="{{{ asset('assets/plugins/bootstrap/js/tooltip.js') }}}"></script>
    <script src="{{{ asset('assets/plugins/bootstrap/js/popover.js') }}}"></script>

    <script src="{{{ asset('assets/plugins/typeahead/js/handlebars.js') }}}"></script>  
    <script src="{{{ asset('assets/plugins/typeahead/js/typeahead.bundle.min.js') }}}"></script>    

    <script src="{{{ asset('assets/plugins/select2-3.5.1/js/select2.min.js') }}}"></script>  

    <script src="{{{ asset('assets/js/function.js') }}}"></script>
    <script src="{{{ asset('assets/js/sl.js') }}}"></script>
  </body>
</html>
