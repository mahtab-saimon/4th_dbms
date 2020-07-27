<?php
session_start();


if(!isset($_SESSION['email_address'])){
    header('location:../index.php');
}
?>



<?php

session_start();

//Connect to Database
$con = mysqli_connect('localhost','root');

mysqli_select_db($con,'online_exam');

?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<?php
include_once ('../../views/elements/head.php');
?>
<body>

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

<div class="pos-f-t ">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h5 class="text-white h4">Question </h5>
        </div>
    </div>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <a class="btn btn-secondary" href="../index.php" role="button">LOG OUT.</a>

    </nav>
</div>


    <div class="card bg-info " >
    <div class="card bg-light " >
        <form action="checked.php" method="post">

                <?php
                for ($i=1;$i<6;$i++){


                $q = "select * from questions WHERE q_id = $i" ;
                $query = mysqli_query($con,$q);
                while ($rows = mysqli_fetch_array($query)){


                ?>

                <div class="bg-light">
                    <br>
                    <p class="card-header">  <?php echo $rows['question']; ?> </p>

                    <?php
                    $q1 = "select * from answers WHERE ans_id = $i";
                    $query1 = mysqli_query($con, $q1);
                    while ($rows = mysqli_fetch_array($query1)) {


                        ?>

                        <div class="form-row ">
                            <div class="form-group col-md-12">
                            <label class=""> </label>

                            <input type="radio" class="" name="quizcheck[<?php echo $rows['ans_id']?>]" id="" value="<?php echo $rows['a_id']; ?>">

                                <?php echo $rows['answer']; ?>


                        </div>
                        </div>
                        <!--<div class="form-row ">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="email_address" value="" placeholder="email_address ...">
                            </div>

                        </div>-->
<!--
                        <div class="row">
                            <input type="radio" name="quizcheck[<?php /*echo $rows['ans_id']*/?>]" id="" value="<?php /*echo $rows['a_id']; */?>">
                            <?php /*echo $rows['answer']; */?>
                            <br>
                        </div>-->
                        <?php


                    }
                    }
                    }
                    ?>
                </div>
                </div>

                <br>
            <input type="submit" name="submit" Value="Submit" class="btn btn-info m-auto d-block" /> <br>
            <a href="index.php" class="btn btn-info m-auto d-block">Go to Index</a>



<!--        <a href="show.php?$_ques_id" class="btn btn-primary">Go to next</a>-->



</form>
    </div>
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




<?php
/*if (isset($_POST['gotonext'])) {

//    shuffle();

    $_SESSION['id'] = $_ques_id;

//    header(location:);

// $_SESSION['admin_login_status']="loged in";
}*/
?>
