<?php
require_once("db.php");
session_start();
if (isset($_SESSION["adm"])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>ADMIN</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      * {
        box-sizing: border-box;
      }

      /* Style the body */
      body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 40;
      }

      /* Header/logo Title */
      .header {
        padding: 20px;
        text-align: center;
        background: #1abc9c;
        color: white;
      }

      /* Increase the font size of the heading */
      .header h1 {
        font-size: 45px;
      }


      /* Main column */
      .main {
        -ms-flex: 30%;
        /* IE10 */
        flex: 30%;
        padding: 20px;
        background-image: linear-gradient(80deg, #11998e, #38ef7d);
        padding: 40px;
        max-width: 800px;
        margin: 50px auto;
        border-radius: 40px;
      }
    </style>
  </head>

  <div class="header">
    <h1>BUSS MANAGEMENT</h1>
    <h1>ADMIM PANEL</h1>

    <body style="background-color: #98AFC7;">
      <div class="header">
        <div class="btn-group d-flex justify-content-center">
          <a class="btn btn-info btn-lg" href="index.php" role="button" style='margin-right:25px'>HOME</a>
          </button>
          <a class="btn btn-outline-info btn-lg" href="logout.php" role="button" style='margin-right:25px'>LogOut</a>
          </button>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="main">
      <h2 class="d-flex justify-content-center">WEL-COME TO ADMIN PANEL</h2>
      <h5 class="d-flex justify-content-center">Usefull Links:</h5>
      <hr><br>
      <div class="btn-group d-flex justify-content-center">
        <button type="button" class="btn btn-danger dropdown-toggle btn-lg btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Driver
        </button>
        <div class="dropdown-menu"><br>
          <a class="dropdown-item" href="AddDriver.PHP">Add Driver</a><br>
          <a class="dropdown-item" href="deldriver.php">Delete Driver</a><br>
          <a class="dropdown-item" href="updriver.php">Update Driver</a>
        </div>
      </div><br>
      <br>
      <div class="btn-group d-flex justify-content-center">
        <button type="button" class="btn btn-danger dropdown-toggle btn-lg btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Conductor
        </button>
        <div class="dropdown-menu"><br>
          <a class="dropdown-item" href="conductor.php">Add Conductor</a><br>
          <a class="dropdown-item" href="delcond.php">Delete Conductor</a><br>
          <a class="dropdown-item" href="uptcon.php">Update Conductor</a><br>
        </div>
      </div><br><br>
      <div class="btn-group d-flex justify-content-center">
        <button type="button" class="btn btn-danger dropdown-toggle btn-lg btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Buss
        </button>
        <div class="dropdown-menu"><br>
          <a class="dropdown-item" href="Addbus.php">Add BUSS</a><br>
          <a class="dropdown-item" href="delbuss.php">Delete BUSS</a><br>
          <a class="dropdown-item" href="uptbus.php">Update BUSS</a><br>
        </div>
      </div><br><br>
      <div class="btn-group d-flex justify-content-center">
        <button type="button" class="btn btn-danger dropdown-toggle btn-lg btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ROUTE
        </button>
        <div class="dropdown-menu"><br>
          <a class="dropdown-item" href="addroute.php">Add Route</a><br>
          <a class="dropdown-item" href="delroute.php">Delete Route</a><br>
          <a class="dropdown-item" href="uptroute.php">Update Route</a><br>
        </div>
      </div> <br><br>
      <div class="btn-group d-flex justify-content-center">
        <a class="btn btn-danger btn-lg btn-block" href="retrieveinfo.php" role="button">TICKETS BOOKED</a>
      </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php } else {
    echo '<script>alert("Please Login Fiirst");document.location="login.php"</script>';
  } ?>
    </body>

  </html>