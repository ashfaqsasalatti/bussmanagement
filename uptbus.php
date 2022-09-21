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
        <title>UPDATE BUS</title>

        <style>
            .form {
                background-image: linear-gradient(180deg, #11998e, #38ef7d);
                padding: 40px;
                max-width: 800px;
                margin: 50px auto;
                border-radius: 65px;

            }

            .header {
                padding: 20px;
                text-align: center;
            }
        </style>

    </head>
    <?php

    if (isset($_POST['bus'])) {
        $bid = $_POST['bid'];
        $name = $_POST['bname'];
        $type = $_POST['btype'];
        $capacity = $_POST['capacity'];
        echo $name . "" . $capacity . "" . $type;

        $sql = "UPDATE buss set name=?, type=?, capacity=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $type, $capacity, $bid]);

        $sql = "SELECT * FROM buss where id= $bid";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    ?>

        <tr>
            <th>BussName</th>
            <th>BID</th>
            <th>Btype</th>
            <th>Capacity</th>
        </tr>
        <br>
        <hr><br> <?php
                    foreach (($stmt->fetchAll()) as $row) { ?>
            <tr>
                <td align="center"><?php echo $row['name']; ?></td>
                <td align="center"><?php echo $row['id']; ?></td>
                <td align="center"><?php echo $row['type']; ?></td>
                <td align="center"><?php echo $row['capacity']; ?></td>
            </tr>
    <?php }
                } ?>

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
                                <h1 style="color: #000000;"><b>UPDATE BUSS DETAILES</b></h1>
                            </div>
                            <div class="px-2">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label class="sr-only">ID</label>
                                        <input type="number" class="form-control" placeholder="Enter BUSS ID to update" name="bid" required>
                                    </div>

                                    <!... Bus name (bname)...>
                                        <div class="form-group">
                                            <label class="sr-only">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Bus Name" name="bname">
                                        </div>

                                        <!... Bus Type (btype)...>
                                            <div class="form-group">
                                                <label class="sr-only">Type of Bus</label>
                                                <input type="text" class="form-control" placeholder="Enter Bus Type" name="btype">
                                            </div>

                                            <!... Max no.of Seats (capacity)...>
                                                <div class="form-group">
                                                    <label class="sr-only">Capacity</label>
                                                    <input type="number" class="form-control" placeholder="Enter maximum Seats(eg:51)" name="capacity">
                                                </div>
                                                <hr>

                                                <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="bus">UPDATE</button>
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