<?php
$_id = $_GET['id'];
//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=amado", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Command
$query = "SELECT * FROM `admins` where id= :id";

//Prepare a statement
$stmt = $conn->prepare($query);
//Bind
$stmt->bindParam(':id',$_id);
$result=$stmt->execute();
$admin = $stmt->fetch();

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>edit</title>
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
    </nav>
</div>

<div class="card text-center">
    <div class="card-header">
        Edit Admin
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
                    <input type="text" class="form-control" id="inputFirstName" name="firstname" value="<?= $admin['firstname'];?>">
                </div>
            </div>
            <div class="form-group row col-6">
                <label for="inputLastName" class="col-sm-4 col-form-label">Last Name :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputLastName" name="lastname" value="<?= $admin['lastname'];?>">
                </div>
            </div>
            <div class="form-group row col-6">
                <label for="inputUserName" class="col-sm-4 col-form-label">User Name :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputUserName" name="username" value="<?= $admin['username'];?>">
                </div>
            </div>
            <div class="form-group row col-6">
                <label for="inputRole" class="col-sm-4 col-form-label">Role :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputRole" name="role" value="<?= $admin['role'];?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
        </form>
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
