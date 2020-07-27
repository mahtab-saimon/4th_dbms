<!doctype html>
<html lang="en">
<?php
include_once ('../views/elements/head.php');
?>
<body>
<?php
include_once ('../views/elements/header.php');
?>

<div class="card text-center">
    <div class="card-header">
        Sign Up
    </div>
    <div class="card-body">
        <form method="post" action="store.php" enctype="multipart/form-data">
            <div class="form-row ">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="firstname" value="" placeholder="First Name ...">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="lastname" value="" placeholder="Last Name ...">
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="email" value="" placeholder="Email ...">
                </div>
                <div class="form-group col-md-6">
                    <input type="password" class="form-control" name="password" value="" placeholder="password ...">
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-md-6">
                    <input type="radio" class="form-control" name="gender" value="Male" >Male<br>
<!--                    <input type="radio" class="form-control" name="gender" value="password" >Female-->
                </div>
                <div class="form-group col-md-6">
                    <input type="radio" class="form-control" name="gender" value="Female" >Female
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
                <button type="submit" class="btn btn-primary mx-auto">Confirm</button>
            </div>

        </form>
    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php
include_once ('../views/elements/footer.php');
?>

<?php
include_once ('../views/elements/script.php');
?>

</body>
</html>