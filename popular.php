<?php
  session_start();

  mb_internal_encoding('UTF-8');
  mb_http_output('UTF-8');

  include 'sunapeedb.php';
  $db = new SunapeeDB();
  $db->connect();
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
    <link rel="stylesheet" href="./CSS/navbar-fixed-top.css">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Almost There Airlines</a>
      </div>
      <div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Popular Flights</a></li>
        </ul>
      </div>
      <div>
        <ul class="nav navbar-nav navbar-right">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">Log Out</button>
          <p class="navbar-text">
            <a href="logout.php" class="navbar-link">Logout</a>&nbsp;
          </p>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">Go Back</button>
        <p class="navbar-text">
          <a href="function.php" class="navbar-link">Go Back Search</a>&nbsp;
        </p>
      </ul>
      </div>
    </div>
    </nav>

    <div class="container">
      <form class='form-signin' action='popularlist.php' method='get'>
        <h2 class='form-signin-heading'>Almost There Airlines</h2>
        <h2 class='form-signin-heading'>Employee System</h2>
        <label for='START_DATE' class='sr-only'>DATE Start</label>
        <input type='date' name = 'StartDate' id='DEP_START' class='form-control' placeholder='START DATE' required>
        <label for='END_DATE' class='sr-only'>DATE END</label>
        <input type='date' name = 'EndDate' id='DEP_END' class='form-control' placeholder='END DATE' required>
        <button class='btn btn-lg btn-primary btn-block' type='submit' >Search Popular</button>
      </form>
      <h5 class='center'>Binjie Li @ iamlbj_db, CS61 - Spring 2015</h5>
      <!-- <form action='function.html'>
        <button class='btn btn-lg' type='submit'>GO BACK TO SEARCH</button>
      </form> -->
    </div> <!-- /container -->

  </body>
</html>
