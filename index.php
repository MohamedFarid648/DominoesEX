<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>
    <script type = "text/javascript"
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--<h1 class="text-primary">Hello, world!</h1>-->

    <nav class="navbar navbar-default navbar-inverse ">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MainNavBar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
      <div class="navbar-collapse collapse" id="MainNavBar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="?page=Home">HOME</a></li>
          <li><a href="?page=Contact_US">Contact Us</a></li>
          <li><a href="?page=About_US">About</a></li>
          <?php 
                session_start();
                if(!isset($_SESSION["USER_EMAIL"])){
                    ?>
         <?php  }else {
             echo '<li><a href="?page=My_Pieces">My Pieces</a></li>';
         } ?>
          
          ?>

        </ul>
       <!-- <form class="navbar-form navbar-left" role="search" >
          <div class="form-group">
            <input type="text" name="" placeholder="Search" class="form-control" >
            <button class="btn btn-sucess" type="submit">Search</button>
          </div>
        </form>-->
        <ul class="nav navbar-nav navbar-right">
         
               <?php
                            if (!isset($_SESSION["USER_EMAIL"])) {
                                ?>    
                        <li><a href="?page=Register">Register</a></li>
                        <li><a href="?page=Login">Login</a></li>
                                <?php
                            } else {
                                require_once './Model/User.php';
                                $USER=new User();
                               // $USER=unserialize($_SESSION["USER_OBJECT"]); 
                               //$_SESSION["USER_EMAIL"]
                                echo "<li><a href='' '>Welcome " .$_SESSION["USER_EMAIL"]. "</a></li>";
                                echo"<li><a href='?page=Logout'>Logout</a></li>";
                            }
                            ?>
        </ul>
      </div>
    </nav>
<div class="container">
           <?php
                    if (@$_GET['page']) {

                        $url = $_GET['page'] . '.php';
                        if (is_file($url)) {
                            include $url;
                        } else {

                            echo"this page not found";
                        }
                    } else {

               include 'Home.php';
                    }
                        ?>
</div><!-- End of Container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
