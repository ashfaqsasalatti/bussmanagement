<?php
require_once("db.php");
session_start();
if (isset($_SESSION["username"])) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Book Ticket</title>
    <style>
      .form {
        background-image: linear-gradient(80deg, #11998e, #38ef7d);
        padding: 40px;
        max-width: 800px;
        margin: 50px auto;
        border-radius: 65px;

      }

      .header {
        padding: 15px;
        text-align: center;
      }
    </style>

  </head>
  <?php

  $a = $conn->prepare("SELECT tno FROM ticket WHERE tno=(SELECT MAX(tno) FROM ticket)");
  $a->execute();
  $q = $a->setFetchMode(pdo::FETCH_ASSOC);

  $st = "";
  foreach ($a->fetchAll() as $r) {
    $st = "{$r['tno']}";
  }
  ++$st;

  if (isset($_POST['ticket'])) {
    $uid = $_SESSION['username'];
    $date = $_POST['ttime'];
    $src = $_POST['dest'];

    $sql = $conn->prepare("INSERT INTO ticket(tno, uid, date, rid) values(?,?,?,?)");
    $result=$sql->execute([$st, $uid, $date, $src]);
    if($result){
      echo '<script>alert("SuccessFull");document.location="ticket.php"</script>';
    }
    else{
      echo '<script>alert("Unsuccessful,Please try agian");';
    }
  }


  ?>




  <body style="background-image: linear-gradient(50deg,#636363,#2dc9c9,#ffd452, #9643b9 );">
    <div class="header">
      <div class="btn-group d-flex justify-content-center">
        <a class="btn btn-info btn-lg" href="user.php" role="button" style='margin-right:25px'>HOME</a>
        </button>
        <a class="btn btn-outline-info btn-lg" href="logout.php" role="button" style='margin-right:25px'>LogOut</a>
        </button>
      </div>
    </div>
    <section id=" cover" class="min-vh-100">
      <div id="cover-caption">
        <div class="container">
          <div class="row text-white">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
              <hr>
              <div class="px-2">
                <div>
                  <h1 style="color: black;">
                    <srtong><b>BOOK YOUR TICKECT</b></strong>
                  </h1>
                </div>
                <form action="" class="justify-content-center" method="post" onsubmit="abc()">
                  <hr>
                  <div>
                    <label class="sr-only" for="inlineFormInputGroup"></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Ticket Number</div>
                      </div>
                      <input type="text" readonly class="form-control btn-outline-warning btn-lg" value="<?php echo "               $st   "; ?>">
                    </div>
                  </div>
                  <!... Ticket time(ttime) ...>
                    <div class="form-group">
                      <label class="sr-only">Date</label>
                      <input type="date" class="form-control" placeholder="Enter Date" name="ttime" required>
                    </div>


                    <!... source (src)...>
                      <div class="form-group" id="content">
                        <label class="sr-only">source</label>
                        <select class="form-control form-control-lg" id="src" name="src" required>
                          <option>Select source</option>
                        </select>
                      </div>
                      <hr>
                      <!... Destination(dest) ...>
                        <div class="form-group">
                          <label class="sr-only">Address</label>
                          <select class="form-control form-control-lg" id="dest" name="dest" required>
                            <option value="">Select Destination</option>
                          </select>
                        </div>

                        <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="ticket" value="submit"><b>BOOK</b></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        function loadData(type, category_id) {
          $.ajax({
            url: "load-cs.php",
            type: "POST",
            data: {
              type: type,
              id: category_id
            },
            success: function(data) {
              if (type == "destData") {
                $("#dest").html(data);
              } else {
                $("#src").append(data);
              }

            }
          });
        }

        loadData();

        $("#src").on("change", function() {
          var src = $("#src").val();
          if (src != "") {
            loadData("destData", src);
          } else {
            $("#dest").html("");
          }


        })
      });
    </script>
  <?php } else {
  echo '<script>alert("Please Login Fiirst");document.location="login.php"</script>';
} ?>

  </body>

  </html>