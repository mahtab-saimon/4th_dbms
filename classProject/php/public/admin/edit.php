<?php
session_start();

if(!isset($_SESSION['email_address'])){
    header('location:../index.php');
}
?>

<?php
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

<div class="card text-center">
    <div class="card-header">
        Edit Student Details
    </div>
    <div class="card-body">
        <form method="post" action="update.php">
            <div class="form-group row col-6">
                <label for="inputId" class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                    <input type="hidden" class="form-control" id="inputId" name="id" value="<?= $admin['id'];?>" >
                </div>
            </div>
            <div class="form-group row col-6">
                <label for="inputFirstName" class="col-sm-4 col-form-label">First Name :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputFirstName" name="firstname" value="<?= $admin['first_name'];?>">
                </div>
            </div>
            <div class="form-group row col-6">
                <label for="inputLastName" class="col-sm-4 col-form-label">Last Name :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputLastName" name="lastname" value="<?= $admin['last_naem'];?>">
                </div>
            </div>
            <div class="form-group row col-6">
                <label for="inputUserName" class="col-sm-4 col-form-label">email_address:</label>
                <div class="col-sm-8">
                    <input type="Email" class="form-control" id="inputUserName" name="email" value="<?= $admin['email_address'];?>">
                </div>
            </div>

            <div class="form-row ">
                <div class="form-group col-md-6">
                    <input type="radio" class="form-control" name="gender">Male<br>
                    <!--                    <input type="radio" class="form-control" name="gender" value="password" >Female-->
                </div>
                <div class="form-group col-md-6">
                    <input type="radio" class="form-control" name="gender">Female
                </div>
            </div>


            <div class="form-group row col-6">
                <label for="inputRole" class="col-sm-4 col-form-label">password :</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputRole" name="password" value="<?= $admin['password'];?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Confirm</button>
        </form>
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
