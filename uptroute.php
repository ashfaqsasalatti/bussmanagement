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
        <title>UPDATE Route</title>

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
    <?php

    if (isset($_POST['Route'])) {
        $rid = $_POST['rid'];
        $src = $_POST['src'];
        $dest = $_POST['dest'];
        $bid = $_POST['bid'];
        $cid = $_POST['cid'];
        $did = $_POST['did'];
        echo $src . "" . $bid . "" . $dest;

        $sql = "UPDATE route set cid=?, src=?, dest=?, bid=?, did=? WHERE rid=?";
        $stmt = $conn->prepare($sql);
        $result=$stmt->execute([$cid, $src, $dest, $bid, $did, $rid]);
        if($result){
            echo '<script>alert("Successfuly Updated");document.location="admin.php"</script>';
        }
        else{
            echo '<script>alert("There was some Problem, try again");document.location="uptroute.php"</script>';
        }
    }
    ?>

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
                                <h1 style="color: #000000;"><b>UPDATE ROUTE DETAILES</b></h1>
                            </div>
                            <div class="px-2">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label class="sr-only">ID</label>
                                        <input type="number" class="form-control" placeholder="Enter ROUTE ID to update" name="rid" required>
                                    </div>

                                    <!... Source (src)...>
                                        <div class="form-group">
                                            <label class="sr-only">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Source" name="src">
                                        </div>

                                        <!... Destination (dest)...>
                                            <div class="form-group">
                                                <label class="sr-only">Type of Route</label>
                                                <input type="text" class="form-control" placeholder="Enter Destinstion" name="dest">
                                            </div>

                                            <!... conductorid (cid)...>
                                                <div class="form-group">
                                                    <label class="sr-only">Conductor ID</label>
                                                    <input type="number" class="form-control" placeholder="Enter CID" name="cid">
                                                </div>
                                                <!... Driver ID (did)...>
                                                    <div class="form-group">
                                                        <label class="sr-only">DID</label>
                                                        <input type="number" class="form-control" placeholder="Enter DID" name="did">
                                                    </div>
                                                    <!... BUS ID (bid)...>
                                                        <div class="form-group">
                                                            <label class="sr-only">bid</label>
                                                            <input type="number" class="form-control" placeholder="Enter BUSS ID" name="bid">
                                                        </div>
                                                        <hr>

                                                        <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="Route">UPDATE</button>
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