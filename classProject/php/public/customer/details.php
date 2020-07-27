<?php

session_start();


if(!isset($_SESSION['email_address'])){
    header('location:../index.php');
}
?>

<?php
$approot =  $_SERVER['DOCUMENT_ROOT'].'/classProject/php/public/';
$webroot = "http://localhost//classProject/php/public/";
//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Command
$query = "SELECT * FROM `applicant`";

//Prepare a statement
$stmt = $conn->prepare($query);
$result=$stmt->execute();
$admins = $stmt->fetchAll();

?>


<!doctype html>
<html lang="en">
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

<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h5 class="text-white h4">Admin </h5>

            <a class="btn btn-secondary text-white h4" href="../customer/details.php" role="button">Applicant Ditails.</a>
            <a class="btn btn-secondary text-white h4" href="../Products/rank.php" role="button">Ranking.</a>
            <a class="btn btn-secondary text-white h4" href="create.php" role="button">Create an Admin.</a>
            <a class="btn btn-secondary text-white h4" href="../Products/index.php" role="button">Add quiz.</a>
            <a href="logout.php" class="btn btn-secondary text-white h4">Logout</a>
        </div>
    </div>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="alert" role="alert">
            <?=
            $_SESSION['message'];
            $_SESSION['message'] = "";
            ?>
        </div>

        <!--        <a class="btn btn-secondary" href="../index.php" role="button">LOG OUT.</a>-->

    </nav>
</div>
<div class="card text-center">
    <div class="card-body">
        <table class="table table-hover table-info">
            <caption><b>List of Student</b> </caption>
            <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Email</th>
                <th scope="col">Picture</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (count($admins) > 0) :
                foreach ($admins as $admin):
                    ?>

                    <tr>
                        <td>
                            <a href="../admin/show.php?id=<?= $admin['id']; ?>">
                                <?= $admin['first_name']; ?>
                            </a>
                        </td>
                        <td>
                            <a href="../admin/show.php?id=<?= $admin['id']; ?>">
                                <?= $admin['email_address']; ?>
                            </a>
                        </td>

                        <td><img src="<?php echo $webroot; ?>upload/<?php  echo $admin['picture']; ?>"
                                 height="100" width="100"
                            ></td>
                        <td><a href="../admin/edit.php?id=<?= $admin['id']; ?>">Edit</a>  | <a href="../admin/delete.php?id=<?= $admin['id']; ?>" onclick="return confirm('Are you sure to delete ?')">Delete</a></td>

                    </tr>

                <?php
                endforeach;
            else:
                ?>

                <tr>
                    <td colspan="2">No Admin is available to delete... <a class="btn btn-secondary" href="../admin/create.php" role="button">Click here to add one.</a> </td>
                </tr>

            <?php
            endif;
            ?>

            </tbody>
        </table>
    </div>

</div>
<?php
include_once('../../views/elements/footer.php');
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php
include_once('../../views/elements/script.php');
?>
</body>
</html>