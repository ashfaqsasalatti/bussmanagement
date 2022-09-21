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
    <title>..ADD..</title>
    <style>
      .form {
        background-image: linear-gradient(80deg, #11998e, #38ef7d);
        padding: 40px;
        max-width: 800px;
        margin: 50px auto;
        border-radius: 65px;

      }

      .header {
        padding: 30px;
        text-align: center;
      }
    </style>


  </head>

  <body style="background-image: linear-gradient(50deg,#636363,#2dc9c9,#ffd452, #9643b9 );">
    <div>
      <?php

      $a = $conn->prepare("SELECT rid FROM route WHERE rid=(SELECT MAX(rid) FROM route)");
      $a->execute();
      $q = $a->setFetchMode(pdo::FETCH_ASSOC);
      $z = $conn->prepare("SELECT *from buss");
      $z->execute();
      $y = $conn->prepare("SELECT * from conductor");
      $y->execute();
      $drive = $conn->prepare("SELECT *from driver");
      $drive->execute();

      $hi = "";
      $str = "";
      foreach ($a->fetchAll() as $r) {
        $str .= "{$r['rid']}";
      }
      ++$str;

      if (isset($_POST['x'])) {
        $src = $_POST['src'];
        $dest = $_POST['dest'];
        $bid = $_POST['bid'];
        $cid = $_POST['cid'];
        $did = $_POST['did'];

        $sql = "INSERT INTO route(rid, src, dest, bid, cid, did) values(?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$str, $src, $dest, $bid, $cid, $did]);


        if ($result) {
          echo '<script>alert("Succesful");document.location="addroute.php"</script>';
        } else {
          echo '<script>alert("There was some problem, enter again.");document.location="addroute.php"</script>';
        }
      }
      ?>
    </div>
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
            <div class="col-xl-5 col-lg-3 col-md-5 col-sm-10 text-center form p-4">


              <div>
                <h1 style="color: #000000;"><b>ADD ROUTE TO THE LIST</b></h1>
              </div>
              <form action="" method="post">
                <!... Route id(rid) ...>
                  <label class="sr-only" for="inlineFormInputGroup"></label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">ID</div>
                    </div>
                    <input type="text" readonly class="form-control btn-outline-warning btn-lg" value="<?php echo "               $str   "; ?>">
                  </div>

                  <!... Source (src)...>
                    <div class="form-group">
                      <label class="sr-only">Source</label>
                      <input type="text" class="form-control" placeholder="Enter source" name="src">
                    </div>

                    <!... Destination(dest)...>
                      <div class="form-group">
                        <label class="sr-only">Destination</label>
                        <input type="text" class="form-control" placeholder="Enter Destinstion" name="dest">
                      </div>

                      <!... Bus id(bid)...>

                        <div class="form-group" id="content">
                          <select class="form-control form-control-lg" name="bid" required>
                            <option value="">Select Buss</option>
                            <?php foreach ($z->fetchAll() as $id) { ?>
                              <option><?php echo $id['id']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <!... Conductor ID(cid)...>

                          <div class="form-group" id="content">
                            <select id="con" class="form-control form-control-lg" name="cid" onchange="cond()" required>
                              <option value="">Select Conductor</option>
                              <?php foreach ($y->fetchAll() as $i) { ?>
                                <option><?php echo $i['c_id']; ?></option>";
                              <?php } ?>
                            </select>
                          </div>
                          <!... Driver id(did)...>

                            <div class="form-group" id="content">
                              <select class="form-control form-control-lg" name="did" required>
                                <option value="">Select Driver</option>
                                <?php foreach ($drive->fetchAll() as $o) { ?>
                                  <option><?php echo $o['did']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <hr>

                            <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="x">ADD ROUTE</button>
              </form>
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