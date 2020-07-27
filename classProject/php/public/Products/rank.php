
<?php
session_start();


if(!isset($_SESSION['email_address'])){
    header('location:../index.php');
}
?>


<?php
session_start();
$con = mysqli_connect('localhost','root');
// if($con){
// 	echo"connection";
// }
mysqli_select_db($con,'online_exam');
?>
<?php
include_once ('../../views/elements/head.php');
?>


    <!doctype html>
    <html lang="en">
    <body>
    <div class="container text-center" >
        <header>
            <div class="container">
                <div class="header-top">
                    <a href="index.html" class="site-logo">
                        <img src="ll.png" alt="Image" class="img-fluid mx-auto d-block">
                    </a>
                </div>

                <!-- for navbar -->
                <nav class="navbar navbar-expand-lg navbar-light">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#my-navbar"><span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="my-navbar">

                    </div>
                </nav>

            </div>
        </header>

        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                    <h5 class="text-white h4">Ranking </h5>
                </div>
            </div>
            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="../customer/index.php" class="btn btn-secondary"> Home </a>
                <a href="../customer/index.php" class="btn btn-secondary"> LOGOUT </a>

                <!--                 <a class="btn btn-secondary" href="../index.php" role="button">LOG OUT.</a>-->

            </nav>
        </div>

        <div class="panel title table-responsive">
            <tr>
                <th colspan="2" class="bg-dark"> <h1 class="text-white"> Rank </h1></th>

            </tr>
            <table class="table text-center table-bordered table-hover">
                <tr style="color:red">
                    <td><b>Rank</b></td>
                    <td><b>Name</b></td>
                    <td><b>Score</b></td>
                </tr>

        <?php


    $c=1;
        $q=mysqli_query($con,"SELECT * FROM history  ORDER BY total DESC " )or die('Error223');

        while($row=mysqli_fetch_array($q) ) {
        $email = $row['email_address'];
        $score = $row['total'];


        $q12 = mysqli_query($con, "SELECT * FROM applicant WHERE email_address='$email' ") or die('Error231');
        while ($row = mysqli_fetch_array($q12)) {
            $name = $row['first_name'];


        ?>
            <tr>
                <td style="color:#99cc32"><b><?= $c ?> </b>
                </td>
                <td>  <?= $name ?> </td>
                <td> <?= $score ?></td>
            </tr>

                <?php
                        }
        $c++;
    }
                ?>
            </table>
        </div>
    </div>
<div class="row">
<?php

?>
</div>


    <?php
    include_once ('../../views/elements/footer.php');
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php
    include_once ('../../views/elements/script.php');
    ?>
    </body>
</html>