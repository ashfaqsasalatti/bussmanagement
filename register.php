<?php
require_once('db.php');
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

  <body style="background-color: #98AFC7;">
    <div>
      <?php

      $a = $conn->prepare("SELECT uid FROM user WHERE uid=(SELECT MAX(uid) FROM user)");
      $a->execute();
      $q = $a->setFetchMode(pdo::FETCH_ASSOC);

      $str = "";
      foreach ($a->fetchAll() as $r) {
        $str .= "{$r['uid']}";
      }
      ++$str;

      if (isset($_POST['register'])) {
        $uname = $_POST['uname'];
        $unum = $_POST['unum'];
        $umail = $_POST['mail'];
        $ugen = $_POST['ugen'];
        $pas = $_POST['pass'];
        $abc = $_POST['abc'];

        if ($abc == "User") {
          $sql = "INSERT INTO USER(uname, uid, unum, mail, ugen, pass) values(?,?,?,?,?,?)";
          $stmt = $conn->prepare($sql);
          $result = $stmt->execute([$uname, $str, $unum, $umail, $ugen, $pas]);
        }
        if ($abc = "Admin") {
          $sql = "INSERT into admin(id,name,pass) values(?,?,?)";
          $result = $conn->prepare($sql);
          $result->execute([$str, $uname, $pas]);
        }
        if($result){
          echo '<script>alert("SuccessFull");document.location="login.php"</script>';
        }
        else{
          echo '<script>alert("Unsuccesfull,Please try Again.");document.location="register.php"</script>';
        }
      }
      ?>
    </div>
    <section id="cover" class="min-vh-100">
      <div id="cover-caption">
        <div class="container">
          <div class="row text-pink">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
              <div>
                <hr>
                <h1 style="color: #000000;"><b>REGISTER YOURSELF</b></h1>
              </div>
              <div class="px-2">
                <form action="" class="justify-content-center" method="post">
                  <hr>

                  <div class="form-group" id="content">
                    <select class="form-control form-control-lg" name="abc" required>
                      <option default>User</option>
                      <option>Admin</option>
                    </select>
                  </div>
                  <!... user name(uname) ...>
                    <div class="form-group">
                      <label class="sr-only">Name</label>
                      <input type="text" class="form-control" placeholder="Enter Your Name" name="uname" required>
                    </div>
                    <!... user ID(uid) ...>
                      <label class="sr-only" for="inlineFormInputGroup"></label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">ID</div>
                        </div>
                        <input type="text" readonly class="form-control btn-outline-warning btn-lg" value="<?php echo "               $str   "; ?>">
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
                            <!... password (pass)...>
                              <div class="form-group">
                                <label class="sr-only">PASSWORD</label>
                                <input type="password" class="form-control" placeholder="Enter A secure Password" name="pass" required>
                              </div>
                              <hr>
                              <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="register">REGISTER</button><br>
                </form>
                <a class="btn btn-danger btn-lg" href="index.php" role="button">HOME</a>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>

</html>