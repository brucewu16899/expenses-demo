<!DOCTYPE html>
<html>
    <head>
        <title>Form model example</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <meta id="token" name="token" content="{{ csrf_token() }}">
        <style>
            body {
                margin: 50px 0;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('expenses.index') }}">Expenses</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('expenses.index') }}">Expenses List</a></li>
                        <li><a href="{{ route('expenses.create') }}">Create</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        @yield('bottomscripts')
    </body>
</html>