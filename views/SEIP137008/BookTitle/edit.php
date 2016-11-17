<?php
require_once("../../../vendor/autoload.php");
use App\BookTitle\BookTitle;
use App\Message\Message;
use App\Utility\Utility;
$msg = Message::getMessage();

$objbooktitle = new BookTitle();
$objbooktitle->setData($_GET);

$oneData = $objbooktitle->view("obj");

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
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 ">
                                <?php echo $msg ?>
                            </div>
                        </div>
                        <form class="form-horizontal my-form " action="update.php" method="post">
                            <fieldset>
                                <legend class="project-sub-heading">Update Book Information</legend>

                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $oneData->id ?>" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_title" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="book_title" name="book_title" value="<?php echo $oneData->book_name ?>" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="author_name" class="col-sm-2 control-label">Author Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="author_name" name="author_name" value="<?php echo $oneData->author_name ?>" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_isbn" class="col-sm-2 control-label">ISBN</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="book_isbn" name="book_isbn" value="<?php echo $oneData->book_isbn ?>" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_info" class="col-sm-2 control-label">Book Info</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="book_info" name="book_info" value="<?php echo $oneData->book_info ?>" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-success" value="Update">
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




</body>

</html>