<?php
session_start();

if(!isset($_SESSION['email_address'])){
    header('location:../index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>create</title>
</head>

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
        <a href="index.php" class="btn btn-primary">Go to Index</a>
    </nav>
</div>

<div class="card text-center">
    <div class="card-header">
        Create Admin
    </div>
    <div class="card-body">
        <form method="post" action="store.php" enctype="multipart/form-data">
            <div class="form-row ">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="firstname" value="" placeholder="First Name ...">
                </div>

            </div>
            <div class="form-row ">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="lastname" value="" placeholder="Last Name ...">
                </div>

            </div>
            <div class="form-row ">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="email_address" value="" placeholder="email_address ...">
                </div>

            </div>
           <div class="form-row ">
                <div class="form-group col-md-6">
                    <input type="password" class="form-control" name="password" value="" placeholder="password...">
                </div>

            </div>

            <div class="form-row">
                <div class="input-group col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="picture" id="uploadImg">
                        <label class="custom-file-label" for="uploadImg">Upload Picture</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mx-auto">Confirm identity</button>
            </div>

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