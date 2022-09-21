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
    <title>Resigter</title>

    <style>
      .form {
        background-image: linear-gradient(180deg, #11998e, #38ef7d);
        padding: 40px;
        max-width: 800px;
        margin: 50px auto;
        border-radius: 65px;

      }
    </style>

  </head>

  <body style="background-image: linear-gradient(135deg,#636363,#2dc9c9,#ffd452, #9643b9 );">
    <div>
      <?php
      if (isset($_POST['register'])) {
        $uname = $_POST['uname'];
        $uid = $_SESSION['username'];
        $unum = $_POST['unum'];
        $umail = $_POST['mail'];
        $ugen = $_POST['ugen'];
        echo $uname . "" . $uid . "" . $ugen;

        $sql = "UPDATE user set uname=?, unum=?, mail=?, ugen=? where uid=$uid";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$uname, $unum, $umail, $ugen]);

        if ($result) {
          echo '<script>alert("Succesful");document.location="admin.php"</script>';
        } else {
          echo '<script>alert("There was some problem, enter again.");document.location="uptuser.php"</script>';
        }
      }
      ?>
    </div>
    <div class="header">
      <div class="btn-group d-flex justify-content-center">
        <a class="btn btn-info btn-lg" href="user.php" role="button" style='margin-right:25px'>HOME</a>
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
                <h1 style="color: #000000;"><b>UPDATE YOURSELF</b></h1>
              </div>
              <div class="px-2">
                <form action="" class="justify-content-center" method="post">
                  <hr>

                  <!... user name(uname) ...>
                    <div class="form-group">
                      <label class="sr-only">Name</label>
                      <input type="text" class="form-control" placeholder="Enter Your Name" name="uname" required>
                    </div>
                    <!... user Phone number(unum) ...>
                      <div class="form-group">
                        <label class="sr-only">Mobile Number</label>
                        <input type="tel" class="form-control" placeholder="Enter your phone number(1234567890)" name="unum" pattern="[0-9]{10}">
                      </div>
                      <!... user E-mail (mail)...>
                        <div class="form-group">
                          <label class="sr-only">Email</label>
                          <input type="email" class="form-control" placeholder="Enter your E-mail Address" name="mail">
                        </div>
                        <!... Gender(ugen) ...>
                          <div class="form-group">
                            <label class="sr-only">Gender</label>
                            <select class="form-control form-control-sm" name="ugen">
                              <option value="m">Male</option>
                              <option value="f">Female</option>
                            </select>

                          </div>
                          <hr>
                          <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="register">REGISTER</button>
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