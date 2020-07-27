<?php
session_start();
$name = $_SESSION['firstname'];
if(!isset($_SESSION['email_address'])){
    header('location:../index.php');
}
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
            <a href="../login.php" class="btn btn-secondary text-white h4">Logout</a>
        </div>
    </div>
</div>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>
    <?php
    $conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $email=$_SESSION['email_address'];
    if(!(isset($_SESSION['email_address']))){
        header("location:../index.php");

    }
    else
    {
        $name = $_SESSION['firstname'];

        $conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }?>
<div class="container">
    <p><?= $name?> </p>

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
