<?php
require_once("../../../vendor/autoload.php");
use App\BookTitle\BookTitle;
use App\Message\Message;
use App\Utility\Utility;

$objbooktitle = new BookTitle();
$allData = $objbooktitle->index('obj');

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
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <![endif]-->

    <!-- Favicon and touch icons -->

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
                <ul class="nav atomic-side-nav nav-pills nav-stacked" id="sidebar-ctrl">
                    <li role="presentation"><a href="../atomic_project.php">Menu</a></li>
                    <li role="presentation" class="active"><a href="#">Book Title <span class="glyphicon glyphicon-play"></span> </a></li>
                    <li role="presentation"><a href="../BookTitle/index.php">Birthdate</a></li>
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
                                    <div class="btn-group-sm nav navbar-nav" role="group" aria-label="..." id="navbar-ctrl">
                                            <a href="create.php" class="navbar-btn btn btn-info" >Add Item</a>
                                            <a href="" class="navbar-btn btn btn-warning">Trash Item</a>
                                            <a href="" class="navbar-btn btn btn-success">PDF Download</a>
                                            <a href="" class="navbar-btn btn btn-primary">Log out</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                            <table class="table table-bordered table-hover my-table-border my-td fade-in one">
                                <tr class="active">
                                    <th>Serial</th>
                                    <th>ID</th>
                                    <th>Book Title</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $serial = 1;
                                foreach($allData as $oneData){
                                    echo "<tr>";
                                    echo "<td>$serial</td>";
                                    echo "<td>$oneData->id</td>";
                                    echo "<td>$oneData->book_name</td>";
                                    echo "<td>$oneData->author_name</td>";
                                    echo " <td>
                                            <a href='view.php?id=$oneData->id' class='btn btn-info btn-sm'>View</a>
                                            <a href='edit.php?id=$oneData->id' class='btn btn-primary btn-sm'>Edit</a>
                                            <a href='delete.php?id=$oneData->id' class='btn btn-danger btn-sm'>Delete</a>
                                            <a href='trash.php?id=$oneData->id' class='btn btn-warning btn-sm'>Trash</a>
                                            </td>";
                                    echo "</tr>";
                                    $serial++;
                                }


                                ?>
                                <tr class="info">
                                    <td  colspan="5">PAGE:
                                        <a href="#"><</a>
                                        <a href="#">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#">4</a>
                                        <a href="#">5</a>
                                        <a href="#">6</a>
                                        <a href="#">></a>
                                    </td>
                                </tr>

                            </table>
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