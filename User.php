<?php
require_once("db.php");
session_start();
if (isset($_SESSION["username"])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>USER</title>
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
        padding: 10px;
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
        margin: 30px auto;
        border-radius: 40px;
      }
    </style>
  </head>

  <body style="background-color: #98AFC7;">
    <div class="header">
      <h1>BUSS MANAGEMENT</h1>
      <h2>USER PANEL</h2>
      <div class="btn-group d-flex justify-content-center">
        <a class="btn btn-info btn-lg" href="user.php" role="button" style='margin-right:25px'>HOME</a>
        </button>
        <a class="btn btn-outline-info btn-lg" href="logout.php" role="button" style='margin-right:25px'>LogOut</a>
        </button>
      </div>
    </div>
    <div class="main">
      <h2 class="d-flex justify-content-center">WEL-COME TO USER PANEL</h2>
      <h5 class="d-flex justify-content-center">Usefull Links:</h5>
      <hr><br>
      <div class="btn-group d-flex justify-content-center">
        <a class="btn btn-danger btn-lg btn-block" href="ticket.php" role="button">BOOK TICKET</a>
        </button>
      </div>
      <br><br>
      <div class="btn-group d-flex justify-content-center">
        <a class="btn btn-danger btn-lg btn-block" href="mybooking.php" role="button">MY BOOKINGS</a>
        </button>
      </div>
      <br><br>
      <div class="btn-group d-flex justify-content-center">
        <a class="btn btn-danger btn-lg btn-block" href="uptuser.php" role="button">UPDATE MY INFORMATION</a>
        </button>
      </div> <br><br>
      <hr><br>
    </div>
  <?php } else {
  echo '<script>alert("Please Login Fiirst");document.location="login.php"</script>';
} ?>
  </body>

  </html>