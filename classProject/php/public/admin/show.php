<?php
session_start();

if(!isset($_SESSION['email_address'])){
    header('location:../index.php');
}
?>

<?php
$webroot="http://localhost/classProject/php/public/";

$_id = $_GET['id'];

//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Command
$query = "SELECT * FROM `applicant` where id= :id";

//Prepare a statement
$stmt = $conn->prepare($query);
//Bind
$stmt->bindParam(':id',$_id);
$result=$stmt->execute();
$admin = $stmt->fetch();

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
            <h5 class="text-white h4">Admin</h5>
        </div>
    </div>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</div>

<div class="card text-center container">
    <div class="card-header">
        Student Details
    </div>
    <div class="card-body" >
        <dl>
            <dt>ID</dt>
            <dd>
                <?= $admin['id']; ?>
            </dd>
            <dt>First Name</dt>
            <dd>
                <?= $admin['first_name']; ?>
            </dd>
            <dt>Last Name</dt>
            <dd>
                <?= $admin['last_naem']; ?>
            </dd>
            <dt>User Name</dt>
            <dd>
                <?= $admin['email_address']; ?>
            </dd>
            <dt>Role</dt>
            <dd>
                <?= $admin['gender']; ?>
            </dd>

            <dt>Image</dt>
            <dd>
                <?/*= $admin['picture']; */?><!-- //Picture name is shown-->
                <div class="card mx-auto" style="width: 18rem;">
                    <!--<img class="card-img-top" src="..." alt="Card image cap">-->
                    <img src="<?= $webroot; ?>upload/<?= $admin['picture']; ?>" class="rounded card-img-top " alt="AdminPic">
                </div>

            </dd>
        </dl>

    </div>
    <div class="card-footer text-muted">
        <a href="index.php" class="btn btn-primary">Go to Index</a>
    </div>
    <?php
    include_once ('../../views/elements/footer.php');
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
