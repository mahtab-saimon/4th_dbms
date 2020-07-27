<?php
session_start();


if(!isset($_SESSION['email_address'])){
    header('location:../index.php');
}
?>

<?php
session_start();

$_ques_id = $_GET['id'];
//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Command
$query = "SELECT * FROM `question` where id= :id";
//Prepare a statement
$stmt = $conn->prepare($query);
//Bind
$stmt->bindParam(':id',$_ques_id);
$result=$stmt->execute();
$product = $stmt->fetch();

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
            <h5 class="text-white h4">Product</h5>
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
        Create quiz question
    </div>
    <div class="card-body">
        <form method="post" action="store.php">

            <div class="form-row ">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="question" value="" placeholder="Enter the question  ...">
                </div>

                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="option_a" value="" placeholder="Enter the option a  ...">
                </div>

                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="option_b" value="" placeholder="Enter the option b  ...">
                </div>

                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="option_c" value="" placeholder="Enter the option c  ...">
                </div>

                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="option_d" value="" placeholder="Enter the option d  ...">
                </div>

                <select id="ans1" name="Choose" placeholder="Choose correct answer " class="form-control input-md">
                    <option value="a">Select answer for question 1</option>
                    <option value="a">option a</option>
                    <option value="b">option b</option>
                    <option value="c">option c</option>
                    <option value="d">option d</option>
                </select>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-5">Submit</button>

                </div>

                <div class="form-row ">




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
