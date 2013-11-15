<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="/ico/favicon.png">
        <title>WeCycle Bicycle Store</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">

        <!-- Custom styles for this template -->
        <link href="http://getbootstrap.com/examples/jumbotron/jumbotron.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body style="">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">WeCycle</a>
                </div>
                <div class="navbar-collapse collapse">
                    <!--<form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </form>-->
                </div><!--/.navbar-collapse -->
            </div>
        </div>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1>Hello, <?php echo $greeting ?>!</h1>
                <p>This is an example application that will be used as example for unit testing with PHPUnit.</p>
                <p><a class="btn btn-primary btn-lg" role="button" href="/about">Learn more »</a></p>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                    <h2>New collection</h2>
                    <p><img src="/images/bike_red.png" width="150" height="" alt="new collection bike"/></p>
                    <p><a class="btn btn-default" href="/products" role="button">View details »</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Clearance</h2>
                    <p><img src="/images/bicycle-clip-art-12.png" width="150" height="" alt="clearance" </p>
                    <p><a class="btn btn-default" href="/products" role="button">View details »</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Stock</h2>
                    <p></p>
                    <p><a class="btn btn-default" href="/products" role="button">View details »</a></p>
                </div>
            </div>

            <hr>

            <footer>
                <p>© in2it 2013</p>
            </footer>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="application/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="application/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

    </body>
</html>