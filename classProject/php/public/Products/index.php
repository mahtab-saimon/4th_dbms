<?php
session_start();


if(!isset($_SESSION['email_address'])){
    header('location:../index.php');
}
?>


<?php

session_start();


if(!isset($_SESSION['email_address'])){
    header('location:../login.php');
}
//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Command
$query = "SELECT * FROM `questions`";

//Prepare a statement
$stmt = $conn->prepare($query);
$result=$stmt->execute();
//Fetch
$question = $stmt->fetchAll();



?>

<?php
include_once ('../../views/elements/head.php');
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
            <h5 class="text-white h4">Course </h5>
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
        <a class="btn btn-secondary" href="create.php" role="button">Create a question.</a>
        <a class="btn btn-secondary" href="logout.php" role="button">LOG OUT.</a>

    </nav>
</div>

<div class="card text-center">
    <div class="card-body">
        <table class="table table-hover table-info">
            <h3>List of question</h3>
            <thead>
            <tr>
                <th scope="col">Question</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (count($question) > 0) :
                foreach ($question as $questions):
                    ?>

                    <tr>
                        <td>
                            <a href="show.php?id=<?= $questions['id']; ?>">
                                <?= $questions['question']; ?>
                            </a>
                        </td>
                        <td><a href="edit.php?id=<?= $questions['id']; ?>">Edit</a>  | <a href="delete.php?id=<?= $questions['id']; ?>" onclick="return confirm('Are you sure to delete ?')">Delete</a></td>

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
