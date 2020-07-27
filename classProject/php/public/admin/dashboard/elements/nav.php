<?php
session_start();
include_once 'connection.php';
$admin_id = $_SESSION['email_address'];
$data = $pdo->query("SELECT * FROM admins WHERE email_address='$admin_id'")->fetch();
?>
<nav role="navigation" class="navbar navbar-custom">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Online Exam-Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="../../customer/index.php"><i class=""></i> Applicant</a></li>
                <li class="active"><a href="../../customer/details.php"><i class="glyphicon glyphicon-user"></i> Applicant Ditails.</a></li>
                <li class="active"><a href="../../Products/rank.php"><i class="glyphicon glyphicon-random"></i> Ranking.</a></li>
                <li class="active"><a href="../create.php"><i class="glyphicon glyphicon-user"></i> Create an Admin.</a></li>
                <li class="active"><a href="../../Products/index.php"><i class="glyphicon glyphicon-check"></i> Add quiz.</a></li>
                <!-- <li class="disabled"><a href="#">Link</a></li> -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img id='propic' src="http://localhost/classProject/php/public/upload/<?php echo $data['picture']; ?>"> <?php echo $data['firstname']; ?> <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li class="dropdown-header"><a href="<?php echo $data['admin_id']; ?>">Profile</a></li>
                        <li class="divider"></li>
                        <li class="disabled"><a href="../../logout.php">Signout</a></li>
                    </ul>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>