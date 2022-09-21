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

            $a = $conn->prepare("SELECT id FROM buss WHERE id=(SELECT MAX(id) FROM buss)");
            $a->execute();
            $q = $a->setFetchMode(pdo::FETCH_ASSOC);

            $str = "";
            foreach ($a->fetchAll() as $r) {
                $str .= "{$r['id']}";
            }
            ++$str;

            if (isset($_POST['bus'])) {
                $name = $_POST['bname'];
                $type = $_POST['btype'];
                $capacity = $_POST['capacity'];
                echo $name . "" . $type;

                $sql = "INSERT INTO buss(name, id, type, capacity) values(?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute([$name, $str, $type, $capacity]);

                if ($result) {
                        echo '<script>alert("SuccessFull");document.location="addbus.php"</script>';
                      } 
                 else {
                    echo '<script>alert("There was some problem, enter again.");document.location="addbus.php"</script>';
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
                                <hr>
                                <div>
                                    <h1 style="color: #000000;"><b>ADD BUS TO THE LIST</b></h1>
                                </div>
                                <form action="" method="post">
                                    <hr>
                                    <!... Bus ID(bid) ...>
                                        <label class="sr-only" for="inlineFormInputGroup"></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">ID</div>
                                            </div>
                                            <input type="text" readonly class="form-control btn-outline-warning btn-lg" value="<?php echo "               $str   "; ?>">
                                        </div>
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

                                        <button type="submit" class="btn btn-outline-danger btn-lg btn-block" name="bus">ADD BUS</button>
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