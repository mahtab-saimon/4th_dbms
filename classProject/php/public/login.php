
<?php
session_start();
include_once('../views/elements/connection.php');
if(isset($_POST['login']))
{
    $id=$_POST['email_address'];
    $pass=$_POST['pass'];

    $sql="select email_address,password from admins where email_address='$id' and password='$pass'";
    $sql1="select email_address,password from applicant where email_address='$id' and password='$pass'";
//    $sql2="select id,email_address,total from history WHERE history.email_address= applicant.email_address";

    $r=mysqli_query($con,$sql);
    $r1=mysqli_query($con,$sql1);
    if(mysqli_num_rows($r)>0)
    {
        $_SESSION['email_address']=$id;
        $_SESSION['firstname']=$name;
        $_SESSION['admin_login_status']="loged in";
        header("Location:admin/dashboard/dashboard.php");
    }

    else if(mysqli_num_rows($r1)>0)
    {
        $_SESSION['email_address']=$id;
        $_SESSION['first_name']=$name;
        $_SESSION['customer_login_status']="loged in";
        header("Location:customer/index.php");
    }
    else
    {
        echo "<p style='color: red;'>Incorrect UserId or Password</p>";
    }

}




?>
<!--
--><?php
/*$conn = new PDO ("mysql:host=localhost;dbname=online_exam","root","");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['login'])) {
    $id = $_POST['email_address'];
    $pass = $_POST['pass'];
    $queary = "select email_address,password from admins where email_address='$id' and password='$pass'";
    $queary1 = "select email_address,password from applicant where email_address='$id' and password='$pass'";
    $stmt = $conn->prepare($queary);
    $stmt1 = $conn->prepare($queary1);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->execute();
    $result = $stmt1->execute();
    $data = $stmt->fetch();
    $data1 = $stmt1->fetch();
    if ($data['email_address'] != $id and $data['pass'] != $pass) {
        echo "invalid email or pass";
    } elseif ($data['email_address'] == $id and $data['password'] == $pass) {
        $_SESSION['email_address'] = $data['email_address'];
        $_SESSION['firstname'] = $data['firstname'];
        header("location:admin/index.php");
    }
    if ($data1['email_address'] == $id and $data1['password'] == $pass) {
        $_SESSION['email_address'] = $data1['email_address'];
        $_SESSION['firstname'] = $data1['firstname'];
        header("location:customer/index.php");
    }
}
*/

?>

<!DOCTYPE html>
<html lang="en">

<?php  include_once('../views/elements/head.php');
?>

<body id="LoginForm">

<?php  include_once('../views/elements/header.php');
?>


<div class="container">
  <h1 class="form-heading">login Form</h1>
  <div class="login-form">
    <div class="main-div">
      <div class="panel">
        <h2> Login</h2>
        <p>Please enter your email and password</p>
      </div>
      <form id="Login" action="login.php" method="post">

        <div class="form-group">


          <input type="email" class="form-control" id="inputEmail" name="email_address" placeholder="email">

        </div>

        <div class="form-group">

          <input type="password" class="form-control" id="inputPassword"  name="pass" placeholder="Password">

        </div>
        <div class="forgot">
          <a href="checkout.php">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-primary" name="login">Login</button>

      </form>
    </div>
  </div></div>





<!-- .footer -->
   <?php  include_once('../views/elements/footer.php');
?>

<?php  include_once('../views/elements/script.php');
?>
</body>

</html>