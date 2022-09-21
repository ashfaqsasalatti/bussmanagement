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
    <title>Conductor</title>
    <style>
      .form {
        background-image: linear-gradient(180deg, #11998e, #38ef7d);
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

  <body style="background-image: linear-gradient(85deg,#2dc9c9,#8ac7c9, #9643b9 );">

    <div>
      <?php

      $a = $conn->prepare("SELECT c_id FROM conductor WHERE c_id=(SELECT MAX(c_id) FROM conductor)");
      $a->execute();
      $q = $a->setFetchMode(pdo::FETCH_ASSOC);

      $str = "";
      foreach ($a->fetchAll() as $r) {
        $str .= "{$r['c_id']}";
      }
      ++$str;

      if (isset($_POST['conductor'])) {
        $c_name = $_POST['c_name'];
        $c_num = $_POST['c_num'];
        $c_age = $_POST['c_age'];
        echo $c_name . "" . $str . "" . $c_age;

        $s = "INSERT INTO conductor(c_id, c_name, c_num, c_age) values(?,?,?,?)";
        $stmt = $conn->prepare($s);
        $result = $stmt->execute([$str, $c_name, $c_num, $c_age]);

        if ($result) {
          echo '<script>alert("SuccessFull");document.location="conductor.php"</script>';
        } else {
          echo '<script>alert("There was some problem, enter again.");document.location="conductor.php"';
        }
      }
      ?>
    </div>

    <body style="background-color: #98AFC7;">
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
            <div class="row text-white">
              <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                <div>
                  <hr>
                  <h1 style="color: #000000;"><b>ADD CONDUCTOR</b></h1>
                </div>

                <div class="px-2">
                  <form action="" class="justify-content-center" method="post">
                    <hr>
                    <!... conductor ID(c_id) ...>
                      <label class="sr-only" for="inlineFormInputGroup"></label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">ID</div>
                        </div>
                        <input type="text" readonly class="form-control btn-outline-warning btn-lg" value="<?php echo "               $str   "; ?>">
                      </div>
                      <!... Conductor name (c_name)...>
                        <div class="form-group">
                          <label class="sr-only">Name</label>
                          <input type="text" class="form-control" placeholder="Enter Conductor Name" name="c_name" required>
                        </div>

                        <!... conductor Phone number (c_num)...>
                          <div class="form-group">
                            <label class="sr-only">Number</label>
                            <input type="tel" class="form-control" placeholder="Enter conductor phone number(1234567890)" name="c_num" pattern="[0-9]{10}">
                          </div>
                          <!... conductor age (c_age)...>
                            <div class="form-group">
                              <label class="sr-only">Age</label>
                              <input type="number" class="form-control" placeholder="Enter conductor age" pattern="[0-9]" name="c_age">
                            </div>
                            <hr>
                            <hr>

                            <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="conductor">ADD CONDUCTOR</button>
                  </form>
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