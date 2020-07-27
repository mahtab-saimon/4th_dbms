<?php

session_start();
//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=amado", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Command
$query = "SELECT * FROM `admins`";

//Prepare a statement
$stmt = $conn->prepare($query);
$result=$stmt->execute();
$admins = $stmt->fetchAll();

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>list</title>
</head>
<body>
<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h5 class="text-white h4">Admin Amado</h5>
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
        <a class="btn btn-secondary" href="create.php" role="button">Create an Admin.</a>
    </nav>
</div>

<div class="card text-center">
    <div class="card-body">
        <table class="table table-hover table-info">
            <caption><b>List of Admins</b> </caption>
            <thead>
            <tr>
                <th scope="col">First Name</th>
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
                    <a href="show.php?id=<?= $admin['id']; ?>">
                        <?= $admin['firstname']; ?>
                    </a>
                </td>
                <td><a href="edit.php?id=<?= $admin['id']; ?>">Edit</a>  | <a href="delete.php?id=<?= $admin['id']; ?>" onclick="return confirm('Are you sure to delete ?')">Delete</a></td>

            </tr>

            <?php
            endforeach;
            else:
            ?>

            <tr>
                <td colspan="2">No Admin is available to delete... <a class="btn btn-secondary" href="create.php" role="button">Click here to add one.</a> </td>
            </tr>

            <?php
            endif;
            ?>

            </tbody>
        </table>
    </div>
    <div class="card-footer text-muted">
        @CoderBenz
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
