<?php
require_once("../../../vendor/autoload.php");
use App\Gender\Gender;
use App\Message\Message;
use App\Utility\Utility;

$objGen = new Gender();
$objGen->setData($_GET);
$oneData= $objGen->view('obj');
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
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container-fluid wrapper">
    <div class="jumbotron header">
        <div class="row">
            <div class="logo col-md-4 ">
                <img src="../../../resource/assets/img/logo/gender.jpg" alt="..." class="img-rounded">
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
                    <li role="presentation" class="active"><a href="index.php">Gender <span class="glyphicon glyphicon-play"></span></a></li>
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
                                    <div class="nav navbar-nav" role="group" aria-label="..." id="navbar-ctrl">
                                        <a href="index.php" class="navbar-btn btn btn-info">Index</a>
                                        <a href="" class="navbar-btn btn btn-warning">Trash Item</a>
                                        <a href="../atomic_project.php" class="navbar-btn btn btn-success">Category Page</a>
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
                                    Gender Information</div>
                                <p class="text-left view-style fade-in one">
                                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                    <span class="view-line">ID </span><span class="glyphicon glyphicon-arrow-right"></span>
                                    <?php echo $oneData->id."<br>"?>
                                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                    <span class="view-line">Name </span><span class="glyphicon glyphicon-arrow-right"></span>
                                    <?php echo $oneData->name."<br>"?>

                                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                    <span class="view-line">Gender </span><span class="glyphicon glyphicon-arrow-right"></span>
                                    <?php echo $oneData->gender."<br>"?>

                                    <a href="index.php" class="navbar-btn btn btn-warning">Go Back</a>
                                    <a href="<?php echo 'edit.php?id='.$oneData->id?>" class="btn btn-info"><span class='glyphicon glyphicon-pencil'></span> Edit</a>
                                    <a href="<?php echo 'view.php?id='.$oneData->id?>" class="btn btn-danger"onclick='return confirm_msg();'><span class='glyphicon glyphicon-remove'></span> Delete</a>
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
                <h4 class="animate-footer-text">Atomic Project</h4>
                <h5 class="animate-footer-text"> &copy; 2016 Reserved By Efthaqur Alam</h5>
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
    $("#alertmsg").fadeTo(2000, 500).slideUp(500, function(){
        $("#alertmsg").slideUp(500);
    });

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
