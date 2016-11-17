<?php

require_once("../../../vendor/autoload.php");

use App\BookTitle\BookTitle;

$objBookTitle = new BookTitle();

$objBookTitle->setData($_GET);

$oneData = $objBookTitle->view("obj");


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atomic Project</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Merriweather|Montserrat|Shrikhand" rel="stylesheet">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/atomic-style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container-fluid wrapper">
    <div class="jumbotron header">
        <div class="row">
            <div class="logo col-md-4 ">
                <img src="../../../resource/assets/img/logo/book-title.png" alt="..." class="img-rounded">
            </div>
            <div class="header-info col-md-4">
                <h2 class="project-heading">Atomic Project</h2>
                <h3 class="project-sub-heading">SEIP 137008 B35 Web Application PHP</h3>
            </div>
            <div class="user-img .col-md-4">
                <img src="../../../resource/assets/img/user-img.jpg" alt="..."  class="img-circle size">
            </div>
        </div>

    </div>

    <hr class="hr-divider">
    <hr class="hr-divider">
    <div class="container-fluid wrapper">
        <div class="row">
            <div class="col-md-2">
                <ul class="nav atomic-side-nav nav-pills nav-stacked " id="sidebar-ctrl">
                    <li role="presentation"><a href="../atomic_project.php">Menu</a></li>
                    <li role="presentation" ><a href="../Birthday/index.php">Birthday  </a></li>
                    <li role="presentation" class="active"><a href="#">Book Title <span class="glyphicon glyphicon-play"></span></a></li>
                    <li role="presentation"><a href="../City/index.php">City</a></li>
                    <li role="presentation"><a href="../Email/index.php">Email</a></li>
                    <li role="presentation"><a href="../Gender/index.php">Gender</a></li>
                    <li role="presentation"><a href="../Hobbies/index.php">Hobbies</a></li>
                    <li role="presentation"><a href="../ProfilePicture/index.php">Profile Picture</a></li>
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
                                    <div class=" nav navbar-nav" role="group" aria-label="..." id="navbar-ctrl">
                                        <a href="create.php" class="navbar-btn btn btn-info">Add Item</a>
                                        <a href="index.php" class="navbar-btn btn btn-warning">Go Back</a>
                                        <a href="" class="navbar-btn btn btn-success">Print</a>
                                        <a href="" class="navbar-btn btn btn-primary">Log out</a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel panel-success">
                                <div class="panel-heading"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                    Book Information</div>
                                <p class="text-left view-style fade-in one">
                                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                    <span class="view-line">ID </span><span class="glyphicon glyphicon-arrow-right"></span>
                                    <?php echo $oneData->id."<br>"?>
                                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                    <span class="view-line">Book title </span><span class="glyphicon glyphicon-arrow-right"></span>
                                    <?php echo $oneData->book_name."<br>"?>

                                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                    <span class="view-line">Author Name </span><span class="glyphicon glyphicon-arrow-right"></span>
                                    <?php echo $oneData->author_name."<br>"?>

                                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                    <span class="view-line">ISBN </span><span class="glyphicon glyphicon-arrow-right"></span>
                                    <?php echo $oneData->book_isbn."<br>"?>

                                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                    <span class="view-line">Book Info </span><span class="glyphicon glyphicon-arrow-right"></span>
                                    <?php echo $oneData->book_info."<br>"?>
                                    <a href="edit.php" class="btn btn-info">Edit</a>
                                    <a href="delete.php" class="btn btn-danger">Delete</a>
                                </p>
                            </div>
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
                <h4>Atomic Project</h4>
                <h5> &copy; 2016 Reserved By Efthaqur Alam</h5>
            </div>
            <div class="user-img col-md-6">
            </div>
        </div>
    </div>
</div>




<!-- Javascript -->
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>

<script>

    $("#button-sidebar").click(function(){
        $("#sidebar-ctrl").toggle();
    });
    $("#button-navbar").click(function(){
        $("#navbar-ctrl").toggle();
    });

</script>




</body>

</html>
