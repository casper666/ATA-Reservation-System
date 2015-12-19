<?php
session_start();
//print_r($_SESSION);
if($_SESSION["user_type"] == 1) {
    $flag = 1;
  }else if($_SESSION["user_type"] == 2){
    $flag = 2;
  }else{
    $flag = 0;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="ATA.jpg">
  <title>ATA Reservation System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <!-- Custom styles for this template -->
  <link href="./CSS/navbar-fixed-top.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Almost There Airlines</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Flight Table</a></li>
      </ul>
    </div>
    <div>
      <ul class="nav navbar-nav navbar-right">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">Sign Out</button>
        <p class="navbar-text">
          <a href="logout.php" class="navbar-link">Logout</a>&nbsp;
        </p>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">Go Back Search</button>
        <p class="navbar-text">
          <a href="function.php" class="navbar-link">Go Back Search</a>&nbsp;
        </p>
      </ul>
      <?php if($flag == 1) { ?>
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
        <?php if($flag == 2) { ?>
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
  <?php
    mb_internal_encoding('UTF-8');
    mb_http_output('UTF-8');

    include 'sunapeedb.php';
    $db = new SunapeeDB();
    $db->connect();

    if($_SESSION["user_type"] == 1){
      $db->getFlight($_GET['leaveCity'],$_GET['arriveCity'],$_GET['startDate'],$_GET['endDate']);
      // print("<form action='function.php'>");
      // print("<button class='btn btn-lg' type='submit'>GO BACK TO SEARCH</button>");
      // print("</form>");
    }else if($_SESSION["user_type"] == 2){
      $db->getEmpFlight($_GET['leaveCity'],$_GET['arriveCity'],$_GET['startDate'],$_GET['endDate']);
      // print("<form action='function.php'>");
      // print("<button class='btn btn-lg' type='submit'>GO BACK TO SEARCH</button>");
      // print("</form>");
    }else{
      // print("<form action='function.php'>");
      // print("<button class='btn btn-lg' type='submit'>GO BACK TO SEARCH</button>");
      // print("</form>");
    }


    // if($db->isCust($_GET["userName"],$_GET["userPassword"]))
    // {a
    //   $db->get_table("FLIGHT");
    //   $db->disconnect();
    // } else {
    //   print("<form action='index.html'>");
    //   print("<button class='btn btn-lg' type='submit'>GO BACK TO LOGIN</button>");
    //   print("</form>");
    // }
    //$db->get_table("FLIGHT");
    //$db->disconnect();
  ?>
</div> <!-- /container -->

<?php
  if(!empty($_POST['book'])){
    $flightID = $_POST['book'];
    $userID = $_SESSION["user_id"];
    $db->book($userID,$flightID);
  }
  // if(!empty($_POST['cancel'])){
  //   $flightID = $_POST['cancel'];
  //   $userID = $_SESSION["user_id"];
  //   $db->cancel($userID,$flightID);
  // }
?>

</body>
</html>
