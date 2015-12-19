<?php
  session_start();

  mb_internal_encoding('UTF-8');
  mb_http_output('UTF-8');

  include 'sunapeedb.php';
  $db = new SunapeeDB();
  $db->connect();

  //echo $_SESSION["user_type"];
  if($_SESSION["user_type"] == 1) {
    $flag = 1;
  }else if($_SESSION["user_type"] == 2){
    $flag = 2;
  }else{
    $flag = $db->isCust($_POST["userName"],$_POST["userPassword"]);
  }

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
          <li class="active"><a href="#">Search</a></li>
        </ul>
      </div>
      <div>
        <ul class="nav navbar-nav navbar-right">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">Sign Out</button>
          <p class="navbar-text">
            <a href="logout.php" class="navbar-link">Logout</a>&nbsp;
          </p>
        </ul>
        <?php if($flag == 1 || $flag == 3) { ?>
        <ul class="nav navbar-nav navbar-right">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" name = "history">History</button>
          <p class="navbar-text">
            <a href="history.php" class="navbar-link">History</a>&nbsp;
          </p>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" name = "future">History</button>
          <p class="navbar-text">
            <a href="future.php" class="navbar-link">Upcoming</a>&nbsp;
          </p>
        </ul>
        <?php } ?>
        <?php if($flag == 2 || $flag == 4) { ?>
        <ul class="nav navbar-nav navbar-right">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" name = "history">Popular Flights</button>
          <p class="navbar-text">
            <a href="popular.php" class="navbar-link">Popular Flights</a>&nbsp;
          </p>
        </ul>
        <?php } ?>
      </div>
    </div>
    </nav>

    <div class="container">
      <?php if($flag == 1 || $flag == 3) { ?>

        <form class='form-signin' action='main.php' method='get'>
          <h2 class='form-signin-heading'>Almost There Airlines</h2>
          <label for='LEACITY' class='sr-only'>Leave City</label>
          <input type='text' name = 'leaveCity' id='LEACITY' class='form-control' placeholder='DEPARTURE CITY CODE' required autofocus>
          <label for='ARRCITY' class='sr-only'>Arrive City</label>
          <input type='text' name = 'arriveCity' id='ARRCITY' class='form-control' placeholder='ARRIVAL CITY CODE' required>
          <label for='START_DATE' class='sr-only'>Start Date</label>
          <input type='date' name = 'startDate' id='S_DATE' class='form-control' placeholder='START DATE' required>
          <label for='END_DATE' class='sr-only'>End Date</label>
          <input type='date' name = 'endDate' id='E_DATE' class='form-control' placeholder='END DATE' required>
          <button class='btn btn-lg btn-primary btn-block' type='submit' >Search Flights</button>
        </form>
        <h5 class='center'>Binjie Li @ iamlbj_db, CS61 - Spring 2015</h5>

      <?php }else if($flag == 2 || $flag == 4){ ?>

        <form class='form-signin' action='main.php' method='get'>
          <h2 class='form-signin-heading'>Almost There Airlines</h2>
          <h2 class='form-signin-heading'>Employee System</h2>
          <label for='LEACITY' class='sr-only'>Leave City</label>
          <input type='text' name = 'leaveCity' id='LEACITY' class='form-control' placeholder='DEPARTURE CITY CODE' required autofocus>
          <label for='ARRCITY' class='sr-only'>Arrive City</label>
          <input type='text' name = 'arriveCity' id='ARRCITY' class='form-control' placeholder='ARRIVAL CITY CODE' required>
          <label for='START_DATE' class='sr-only'>Start Date</label>
          <input type='date' name = 'startDate' id='S_DATE' class='form-control' placeholder='START DATE' required>
          <label for='END_DATE' class='sr-only'>End Date</label>
          <input type='date' name = 'endDate' id='E_DATE' class='form-control' placeholder='END DATE' required>
          <button class='btn btn-lg btn-primary btn-block' type='submit' >Search Flights</button>
        </form>
        <h5 class='center'>Binjie Li @ iamlbj_db, CS61 - Spring 2015</h5>

      <?php }else{ ?>

        <form action='index.html'>
          <button class='btn btn-lg' type='submit'>GO BACK TO LOGIN</button>
        </form>

      <?php }?>
    </div> <!-- /container -->

  </body>
</html>
