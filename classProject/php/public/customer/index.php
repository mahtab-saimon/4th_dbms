
<?php
session_start();

if(!isset($_SESSION['email_address'])){
    header('location:../index.php');
}
?>

<?php
$approot =  $_SERVER['DOCUMENT_ROOT'].'/classProject/php/public/';
$webroot = "http://localhost//classProject/php/public/";
?>


<?php

$id=$_SESSION['email_address'];
$name=$_SESSION['first_name'];

//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Command
/*SELECT applicant.email_address,applicant.first_name, history.total, history.email_address
FROM history
INNER JOIN applicant ON history.id=applicant.email_address;*/

$query = "SELECT * FROM `subject`";
$query1 = "SELECT * FROM `applicant` where email_address= :email_address";

//Prepare a statement
$stmt = $conn->prepare($query);
$result=$stmt->execute();
$stmt1 = $conn->prepare($query1);
$stmt1->bindParam(':email_address',$id);
$result1=$stmt1->execute();
$applicant = $stmt1->fetch();
//Fetch
$subject = $stmt->fetchAll();

/*
$query2 = "SELECT * FROM `history` where id= :id";
$stmt2->bindParam(':id',$history_id);
$stmt2 = $conn->prepare($query2);
$result2=$stmt->execute();
$rank = $stmt2->fetch();*/



?>

<?php
$con = mysqli_connect('localhost','root');

mysqli_select_db($con,'online_exam');
//$q=mysqli_query($con,"SELECT * FROM history  ORDER BY total DESC" )or die('Error223');
$q=mysqli_query($con,"SELECT *
FROM applicant, history
WHERE applicant.email_address = history.email_address" )or die('Error223');

$row=mysqli_fetch_assoc($q);
/*    $email=$id;
    $email=$_SESSION['email_address'];*/

?>


















<!DOCTYPE HTML>
<html lang="en-US">
    <?php
include_once ('../../views/elements/head.php');
?>




<body >

            <header>
                <div class="container">
                    <div class="header-top">
                        <a href="index.php" class="site-logo">
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
                        <h5 class="text-white h4">Question</h5> <br>
                        <a class="btn btn-secondary text-white h4" href="../Products/rank.php" role="button">Ranking.</a>
                        <a href="logout.php" class="btn btn-secondary text-white h4">Logout</a>

                    </div>
                </div>
            </div>

                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>



<div class="container">
    <!--              Profile details-->
<div class="row">
    <tr>
        <th colspan="2" class="bg-dark"> <h1 class="text-white"> First 3 position holder...</h1></th>

    </tr>

    <table class="table text-center table-bordered table-hover">
        <tr style="color:red">
            <td><b>Rank</b></td>
            <td><b>Name</b></td>
            <td><b>Score</b></td>
        </tr>

        <?php


        $c=1;
        $qq=mysqli_query($con,"SELECT * FROM history  ORDER BY total DESC " )or die('Error223');

        while($row1=mysqli_fetch_array($qq) ) {
            $email = $row1['email_address'];
            $score = $row1['total'];


            $q12 = mysqli_query($con, "SELECT * FROM applicant WHERE email_address='$email' ") or die('Error231');
            while ($row1 = mysqli_fetch_array($q12)) {
                $name = $row1['first_name'];


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
                <div class="row">
                    <div class="col-3">

                        <div class=" border border-success card hovercard " style="background-color: #e3f2fd;">
                            <div class=" cardheader ">
                                <h3>Profile details</h3>
                            </div>
                            <div class="avatar">
                                <table class="table table-hover table-borderless table-info">
                                <tr >
                                    <td>
                                        <a  class=" text-body nav-link" href="../admin/show.php?id=<?= $applicant['email_address']; ?>">
                                        <p>Hello <?=$applicant['first_name']; ?></p>


                                    </td>
                                </tr>

                                    <tr>

                                        <td>
                                            <a  class=" text-body nav-link" href="../admin/show.php?id=<?= $row['email_address']; ?>">

                                                <p> Your Email: <?= $id; ?></p>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="rounded-circle" style="width: 18rem;" class="card-img-top " src="<?php echo $webroot; ?>upload/<?php  echo $applicant['picture']; ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <a  class=" text-danger" href="../admin/show.php?id=<?= $id; ?>">
                                             <p>your algorithms score:<?= $row['total']; ?></p>
                                            </a>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>
                                            <a  class=" text-danger" href="../admin/show.php?id=<?=$row['email_address']; ?>">
                                              <p>your Data Structure score:<?= $row['total']; ?></p>
                                            </a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <a  class="text-danger" href="../admin/show.php?id=<?= $applicant['email_address']; ?>">
                                              <p>your OOP score:<?= $row['total']; ?></p>
                                            </a>
                                        </td>

                                    </tr>
                                </table>


                        </div>
                        </div>
                    </div>


<!--                   end of  Profile details-->


                    <div class="col-9">

                        <div class="card text-center border border-success " style="background-color: #e3f2fd;">

                                <table class="table table-hover table-info table-borderless">
                                    <h3>List of Subject</h3>

                                    <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                    </thead>



                                    <?php
                                    if (count($subject) > 0) :
                                        foreach ($subject as $subjects):
                                            ?>

                                            <tr>
                                                <td>
                                                    <a class=" text-body" href="../products/show.php?id=<?= $subjects['id']; ?>">
                                                        <?= $subjects['subject_name']; ?>
                                                    </a>
                                                </td>

                                                <td><a class=" text-body nav-link" href="edit.php?id=--><?= $questions['id']; ?>">Edit</a>  | <a class=" text-body nav-link" href="delete.php?id=--><?= $questions['id']; ?>" onclick="return confirm('Are you sure to delete ?')">Delete</a></td>

                                            </tr>



                                        <?php
                                        endforeach;
                                    else:
                                        ?>

                                        <tr>
                                            <td colspan="2">No Product is available to delete... <a class="btn btn-secondary" href="create.php" role="button">Click here to add one.</a> </td>
                                        </tr>

                                    <?php
                                    endif;
                                    ?>


                                    </tbody>
                                </table>


                        </div>

                    </div>
                    </div>

</div>
            <?php
            include_once ('../../views/elements/footer.php');
            ?>
            <?php
            include_once ('../../views/elements/script.php');
            ?>
</body>
</html>