<?php
session_start();


if(!isset($_SESSION['email_address'])){
    header('location:../index.php');
}

?>

<?php
session_start();


$data1=$_SESSION['email_address'];
//$id = $_SESSION['email_address'];


$con = mysqli_connect("localhost","root","","online_exam");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/*
   $con = mysqli_connect('localhost','root');

   	mysqli_select_db($con,'online_exam');*/
   ?>
<?php
include_once ('../../views/elements/head.php');
?>

<!doctype html>
<html lang="en">
   <body>
     <div class="container text-center" >
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
                     <h5 class="text-white h4">Result </h5>
                 </div>
             </div>
             <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>

                 <a href="../customer/index.php" class="btn btn-secondary"> LogOut </a>
<!--                 <a class="btn btn-secondary" href="../index.php" role="button">LOG OUT.</a>-->

             </nav>
         </div>
         <form action="">
      <table class="table text-center table-bordered table-hover">
      	<tr>
      		<th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
      		
      	</tr>
      	<tr>
		      	<td>
		      		Questions Attempted
		      	</td>

	         <?php

                     if (isset($_POST['submit'])){
             if (!empty($_POST['quizcheck'])) {
                 $count = count($_POST['quizcheck']);
//                 echo "out of 2 , you have selected " . $count . "option";
?>

                 <td class="table text-center table-bordered table-hover">
                     <?php
                     echo "Out of 5, You have Selected " . $count . " option."; ?>
                 </td>
                 <?php
                 $selected = $_POST['quizcheck'];
                 $q = "select * from questions";
                 $query = mysqli_query($con, $q);


                 $result = 0;
                 $counter = 0;
                 $i = 1;
                 while ($rows = mysqli_fetch_array($query)) {
                     $checked=$rows['ans_id']==$selected[$i];
                     if ($checked) {
                         $counter++;
                         $result++;
                     }
                     else{
                         $counter++;
                     }
                     $i++;
                 }

                 ?>




          <tr>
              <td>
                  Your Total score
              </td>
              <td colspan="2" class="table text-center table-bordered table-hover">
                  <?php
                  echo " Your score is ". $result.".";

                  }
                  else{
                      echo "<b>Please Select Atleast One Option.</b>";
                  }
                  }
                  ?>
              </td>
          </tr> 

<?php


//	u_id	username	total_question	answer_correct

   /*       $email = $_SESSION['username'];
          $finalresult = "insert into history (username, total_question, answer_correct) VALUE ('$email','2','$result')";
            $queryresult = mysqli_query($con, $finalresult);*/

//id	email_address	total_question	total



                 $finalresult = "INSERT INTO history(email_address,total_question,total) VALUES ('$data1','5','$result');";
                 $queryresult = mysqli_query($con, $finalresult);



?>





      </table>

   	<a href="rank.php" class="btn btn-success"> Rank </a>
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