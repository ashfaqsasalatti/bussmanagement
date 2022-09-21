<?php
require_once("db.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>

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
    </div>
    <section id="cover" class="min-vh-100">
        <div id="cover-caption">
            <div class="container">
                <div class="row text-pink">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                        <div>
                            <hr>
                            <h1 style="color: #000000;"><b>LOGIN TO CONTINUE</b></h1>
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
                                <!... user ID(uid) ...>
                                    <div class="form-group">
                                        <label class="sr-only">username</label>
                                        <input type="number" class="form-control" placeholder="Enter Your User ID to Login" name="username" required>
                                    </div>
                                    <!... password (pass)...>
                                        <div class="form-group">
                                            <label class="sr-only">PASSWORD</label>
                                            <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="login">LOGIN</button><br>
                            </form>
                            <a class="btn btn-danger btn-lg btn-block" href="register.php" role="button">Register</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (isset($_POST["login"])) {
        $count = 0;
        $uid = $_POST['username'];
        $pass = $_POST['password'];
        $abc = $_POST['abc'];

        if ($abc == "User") {
            $query = $conn->prepare("SELECT uid,pass FROM user WHERE uid =$uid  AND pass = '$pass' ");
            $query->execute();
            $result = $query->setFetchMode(PDO::FETCH_ASSOC);
            echo $result;
            foreach (($query->fetchAll()) as $row) {
                ++$count;
            }
            if ($count > 0) {
                $_SESSION["username"] = $_POST["username"];
                header("location:User.php");
            } else {
                echo '<script>alert("Wrong ID or Password")</script>';
            }
        }
        if ($abc == "Admin") {
            $adm = $conn->prepare("SELECT * FROM admin where id = $uid AND pass = '$pass' ");
            $adm->execute();
            $res = $adm->setFetchMode(PDO::FETCH_ASSOC);

            foreach (($adm->fetchAll()) as $r) {
                ++$count;
                echo $r["id"];
            }
            if ($count > 0) {
                $_SESSION["adm"] = $_POST["username"];
                header("location:admin.php");
            } else {
                echo '<script>alert("Wrong ID or Password")</script>';
            }
        }
    }

    ?>
</body>

</html>