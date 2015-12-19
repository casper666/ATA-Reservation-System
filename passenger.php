<?php
session_start();
//print_r($_SESSION);
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
        <li class="active"><a href="#">Passenger List</a></li>
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

    if($_SESSION["user_type"] == 2){
      $db->getList($_POST["retreive"]);
      // print("<form action='function.php'>");
      // print("<button class='btn btn-lg' type='submit'>GO BACK TO SEARCH</button>");
      // print("</form>");
    }
    else{
      // print("<form action='function.php'>");
      // print("<button class='btn btn-lg' type='submit'>GO BACK TO SEARCH</button>");
      // print("</form>");
    }
    //$db->disconnect();
  ?>
</div> <!-- /container -->

<?php
  if(!empty($_POST['book'])){
    $flightID = $_POST['book'];
    $userID = $_SESSION["user_id"];
    $db->book($userID,$flightID);
  }
  if(!empty($_POST['cancel'])){
    $flightID = $_POST['cancel'];
    $userID = $_SESSION["user_id"];
    $db->cancel($userID,$flightID);
  }
?>

</body>
</html>
