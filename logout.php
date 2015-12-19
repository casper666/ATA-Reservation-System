<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->
    <link rel="icon" href="ATA.jpg">
    <title>ATA Reservation System</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="./CSS/login.css">

  </head>

  <body>

    <div class="container">
    	<h2 class="center">You are signed out!</h2>
    	<form class="form-signin" action="index.html">
    		<button class="btn btn-lg btn-primary btn-block" type="submit" >Back To Home</button>
    	</form>
    	<h5 class="center">Binjie Li @ iamlbj_db, CS61 - Spring 2015</h5>
    </div> <!-- /container -->

  </body>
</html>
