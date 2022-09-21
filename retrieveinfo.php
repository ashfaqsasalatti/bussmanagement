<?php
require_once("db.php");
session_start();
if (isset($_SESSION["adm"])) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Retrieve</title>

    <style>
      .form {
        background-image: linear-gradient(180deg, #11998e, #38ef7d);
        padding: 40px;
        max-width: 800px;
        margin: 50px auto;
        border-radius: 65px;

      }

      .header {
        padding: 10px;
        text-align: center;
      }
    </style>

  </head>

  <body style="background-image: linear-gradient(135deg,#636363,#2dc9c9,#ffd452, #9643b9 );">
    <div class="header">
      <div class="btn-group d-flex justify-content-center">
        <a class="btn btn-info btn-lg" href="index.php" role="button" style='margin-right:25px'>HOME</a>
        </button>
        <a class="btn btn-outline-info btn-lg" href="logout.php" role="button" style='margin-right:25px'>LogOut</a>
        </button>
      </div>
    </div>
    <section id="cover" class="min-vh-100">
      <div id="cover-caption">
        <div class="container">
          <div class="row text-pink">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
              <div>
                <hr>
                <h1 style="color: #000000;"><b>CHECK BOOKED INFORMATION</b></h1>
              </div>
              <div class="px-2">
                <form action="" class="justify-content-center" method="post">
                  <hr>

                  <!... START DATE(sd) ...>
                    <div class="form-group">
                      <label class="sr-only">Sdate</label>
                      <input type="date" class="form-control" placeholder="Slect Start Date" name="sd" required>
                    </div>
                    <!... END DATE(ed) ...>
                      <div class="form-group">
                        <label class="sr-only">ID</label>
                        <input type="date" class="form-control" placeholder="Select Till Date" name="ed" required>
                      </div>

                      <hr>
                      <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="show">SHOW</button>
                </form>
                <?php
                if (isset($_POST['show'])) {
                  $sd = $_POST['sd'];
                  $ed = $_POST['ed'];

                  $stmt = $conn->prepare("SELECT t.tno,u.uname,t.date,r.src,r.dest from ticket t,user u,route r where t.uid=u.uid and t.rid=r.rid and date between '$sd' and '$ed'");
                  $stmt->execute();
                  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                ?>
                  <table align="center" style='border: solid 1px black;'>
                    <tr>
                      <th>Ticket Number</th>
                      <th>Username</th>
                      <th>Date</th>
                      <th>Sourece</th>
                      <th>Destination</th>
                    </tr>
                    <br>
                    <hr><br> <?php
                              foreach (($stmt->fetchAll()) as $row) { ?>
                      <tr>
                        <td align="center"><?php echo $row['tno']; ?></td>
                        <td align="center"><?php echo $row['uname']; ?></td>
                        <td align="center"><?php echo $row['date']; ?></td>
                        <td align="center"><?php echo $row['src']; ?></td>
                        <td align="center"><?php echo $row['dest']; ?></td>
                      </tr>
                  <?php
                              }
                            }
                  ?>
                  </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

  <?php } else {
  echo '<script>alert("Please Login Fiirst");document.location="login.php"</script>';
} ?>

  </body>

  </html>