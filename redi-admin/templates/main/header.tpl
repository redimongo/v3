<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//sysbs.com/redi-admin/templates/main/style/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="//sysbs.com/redi-admin/templates/main/style/css/bootstrap-theme.min.css">
        
        <link rel="stylesheet" href="//sysbs.com/redi-admin/templates/main/style/css/russellharrower.css">
        <!-- Latest compiled and minified JavaScript -->
        
        <script src="//sysbs.com/templates/main/js/jquery-1.11.1.min.js"></script>
    </head>
    <body>
       
        <nav class="navbar navbar-inverse" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-inner">
            <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" rel="home"  href="#"><img src="templates/main/images/small-logo.png" width="40" height="40" alt="RussellHarrower.com"></a>
            </div>
            <?php 
            if(!empty($_SESSION['user']))
            {
            ?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Main</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Create Page</a></li>
                                <li><a href="#">Manage Page</a></li>
                            </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">New Post</a></li>
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts</a> <ul class="dropdown-menu" role="menu">
                                <li><a href="#">New Post</a></li>
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts</a></li>
                                <li><a href="#">Categories</a></li>
                            </ul></li>
                                <li><a href="#">Categories</a></li>
                            </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Templates</a></li>
                                <li><a href="#">Users</a></li>
                                <li><a href="#">Comments</a></li>
                                <li><a href="#">Core</a></li>
                            </ul>
                    </li>
                </ul>
             
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                </div><!-- /.navbar-collapse -->
        <?php 
            }
            ?>
        </div></div>
        </nav>
    <div class="container">
    