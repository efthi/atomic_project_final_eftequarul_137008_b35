<?php
require_once("../../../vendor/autoload.php");
use App\Message\Message;
use App\Utility\Utility;

$msg = Message::getMessage();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo  basename(__DIR__)." - Atomic Project" ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/text-animation/animate.css">
    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Merriweather|Montserrat|Shrikhand" rel="stylesheet">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/atomic-style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <![endif]-->

    <!-- Favicon and touch icons -->
    <style>

    </style>
</head>

<body>
<div class="container-fluid wrapper">
    <div class="jumbotron header">
        <div class="row">
            <div class="logo col-md-4 ">
                <img src="../../../resource/assets/img/category-image/profile-picture.png" alt="..." class="img-rounded">
            </div>
            <div class="header-info col-md-4">
                <h2 class="project-heading animate-head-text" >Atomic Project</h2>
                <h3 class="project-sub-heading animate-head-text">SEIP 137008 B35 Web Application PHP</h3>
            </div>
            <div class="user-img .col-md-4">
                <img src="../../../resource/assets/img/user-img.jpg" alt="..."  class="img-circle size">
            </div>
        </div>

    </div>

    <hr class="hr-divider">
    <ol class="breadcrumb">
        <li><a href="../atomic_project.php">Home</a></li>
        <li><a href="index.php"><?php echo basename(__DIR__) ?></a></li>
        <li class="active"><?php echo basename($_SERVER['PHP_SELF']); ?></li>
    </ol>
    <hr class="hr-divider">
    <div class="container-fluid wrapper">
        <div class="row">
            <div class="col-md-2">
                <ul class="nav atomic-side-nav nav-pills nav-stacked " id="sidebar-ctrl">
                    <li role="presentation"><a href="../atomic_project.php">Menu</a></li>
                    <li role="presentation" ><a href="../Birthday/index.php">Birthday  </a></li>
                    <li role="presentation" ><a href="../BookTitle/index.php">Book Title</a></li>
                    <li role="presentation"><a href="../City/index.php">City</a></li>
                    <li role="presentation"><a href="../Email/index.php">Email</a></li>
                    <li role="presentation"><a href="../Gender/index.php">Gender</a></li>
                    <li role="presentation"><a href="../Hobbies/index.php">Hobbies</a></li>
                    <li role="presentation" class="active"><a href="index.php">Profile Picture <span class="glyphicon glyphicon-play"></span></a></li>
                    <li role="presentation"><a href="../SummaryOfOrganization/index.php">Summary of Organization</a></li>
                </ul>
            </div>
            <div class="col-md-10 ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="atomic-nav">
                            <div class="navbar">
                                <div class="container">
                                    <div class="navbar-header">
                                <span class="navbar-brand"> <a href="#" id="button-sidebar" class="control-link"><span class="glyphicon glyphicon-chevron-left" ></span></a>
                                 <span class="control-link">Control</span><a href="#" id="button-navbar" class="control-link"><span class="glyphicon glyphicon-chevron-right" ></span></a>
                                    </div>
                                    <div class="nav navbar-nav" role="group" id="navbar-ctrl">
                                        <a href="create.php" class="navbar-btn btn btn-info" ><span class="glyphicon glyphicon-plus-sign"></span> Add Item</a>
                                        <a href="trash-item.php" class="navbar-btn btn btn-warning"><span class='glyphicon glyphicon-trash'></span> Trash Item</a>
                                        <a href="pdf.php" class="navbar-btn btn btn-success ">PDF</a>
                                        <a href="xl.php" class="navbar-btn btn btn-success ">Excel</a>
                                        <a href="email.php" class="navbar-btn btn btn-success"><span class="glyphicon glyphicon-envelope"></span> Email</a>
                                        <a href="" class="navbar-btn btn btn-primary">Log out</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 ">
                                <?php echo $msg ?>
                            </div>
                        </div>
                        <form class="form-horizontal my-form " action="store.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend class="project-sub-heading">Add Profile Picture</legend>

                                <div class="form-group">
                                    <label for="user" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date" class="col-sm-2 control-label">Profile Picture</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="profile_image" placeholder="Profile Picture" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-success" value="Save">
                                        <input type="reset" class="btn btn-danger" value="reset">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>


                </div>
            </div>

        </div>




    </div>
</div>

<hr class="hr-divider">
<div class="footer">
    <div class="row">
        <div class="header-info col-md-6">
            <h4 class="animate-footer-text">Atomic Project</h4>
            <h5 class="animate-footer-text"> &copy; 2016 Reserved By Efthaqur Alam</h5>
        </div>
        <div class="user-img col-md-6">
        </div>
    </div>
</div>
<!--</div>-->

<!-- Javascript -->
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    $("#button-sidebar").click(function(){
        $("#sidebar-ctrl").toggle();
    });
    $("#button-navbar").click(function(){
        $("#navbar-ctrl").toggle();
    });

</script>


<script src="../../../resource/assets/bootstrap/text-animation/jquery.fittext.js"></script>
<script src="../../../resource/assets/bootstrap/text-animation/jquery.lettering.js"></script>
<script src="../../../resource/assets/bootstrap/text-animation/jquery.textillate.js"></script>
<script>
    $('.animate-head-text').textillate({
        in: { effect: 'wobble' },
        out: { effect: 'rollOut', sequence: true },
        loop: true
    });
    $('.animate-footer-text').textillate({
        in: { effect: 'bounceIn' },
        out: { effect: 'flash', sequence: true },
        loop: true
    });
</script>
</body>

</html>
