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
        <title>Delete conductor</title>

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


    <body style="background-image: linear-gradient(135deg,#636363,#2dc9c9,#ffd452, #9643b9 );">
        <?php
        $z = $conn->prepare("SELECT c_id from conductor");
        $z->execute();
        ?>
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
                                <h1 style="color: #000000;"><b>DELETE CONDUCTOR</b></h1>
                            </div>
                            <div class="px-2">
                                <form action="" class="justify-content-center" method="post">
                                    <hr>

                                    <!... CONDUCTOR ID(cid) ...>

                                        <div class="form-group" id="content">
                                            <select class="form-control form-control-lg" name="cid" required>
                                                <option value="">Select Driver</option>
                                                <?php foreach ($z->fetchAll() as $id) { ?>
                                                    <option><?php echo $id['c_id']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="del">delete</button>
                                </form>
                                <?php
                                if (isset($_POST['del'])) {

                                    $cid = $_POST['cid'];



                                    $sql = "SELECT * FROM conductor where c_id= $cid";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $d = "UPDATE conductor set c_name=null,c_id=null,c_num=null,c_age=null where c_id= $cid";
                                    $conn->exec($d);

                                ?>
                                    <table align="center" style='border: solid 1px black;'>
                                        <tr>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <th>Number</th>
                                            <th>Age</th>
                                        </tr>
                                        <br>
                                        <hr><br> <?php
                                                    foreach (($stmt->fetchAll()) as $row) { ?>
                                            <tr>
                                                <td align="center"><?php echo $row['c_name']; ?></td>
                                                <td align="center"><?php echo $row['c_id']; ?></td>
                                                <td align="center"><?php echo $row['c_num']; ?></td>
                                                <td align="center"><?php echo $row['c_age']; ?></td>
                                            </tr>
                                    <?php }
                                                } ?>
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