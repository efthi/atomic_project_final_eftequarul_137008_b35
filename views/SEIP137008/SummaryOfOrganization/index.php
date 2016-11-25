<?php
require_once("../../../vendor/autoload.php");
use App\SummaryOfOrganization\SummaryOfOrganization;
use App\Message\Message;
use App\Utility\Utility;

$objsummary = new SummaryOfOrganization();

$allData = $objsummary->index('obj');


################## search  block 1 of 5 start ##################
if(isset($_REQUEST['search']) )$allData =  $objsummary->search($_REQUEST);
$availableKeywords=$objsummary->getAllKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';
################## search  block 1 of 5 end ##################


######################## pagination code block# 1 of 2 start ######################################
$recordCount= count($allData);


if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;

if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 5;
$_SESSION['ItemsPerPage']= $itemsPerPage;

$pages = ceil($recordCount/$itemsPerPage);
$someData = $objsummary->indexPaginator($page,$itemsPerPage);

$serial = (($page-1) * $itemsPerPage) +1;

####################### pagination code block# 1 of 2 end #########################################


################## search  block 2 of 5 start ##################

if(isset($_REQUEST['search']) ) {
    $someData = $objsummary->search($_REQUEST);
    $serial = 1;
}
################## search  block 2 of 5 end ##################


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
                <img src="../../../resource/assets/img/category-image/summary-of-org.jpg" alt="..." class="img-rounded">
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
                    <li role="presentation"><a href="../ProfilePicture/index.php">Profile Picture</a></li>
                    <li role="presentation" class="active"><a href="index.php">Summary of Organization <span class="glyphicon glyphicon-play"></span></a></li>
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
                                        <form id="search-form" action="index.php"  method="get">
                                            <input type="text" value="" id="searchID" name="search" placeholder="Search">
                                            <input type="checkbox"  name="byName"   checked  >By Name
                                            <input type="checkbox"  name="byOrg"  checked >By Org
                                            <input hidden type="submit" value="search">
                                        </form>
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
                        <table class="table table-bordered table-hover table-responsive my-table-border my-td fade-in one">
                            <tr class="active">
                                <th>Serial</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Summary</th>
                                <th colspan="4">Action</th>
                            </tr>
                            <?php
                            foreach($someData as $oneData){
                                echo "<tr>";
                                echo "<td>$serial</td>";
                                echo "<td>$oneData->id</td>";
                                echo "<td>$oneData->name</td>";
                                echo "<td>$oneData->summary</td>";
                                echo " <td>
                                                <a href='view.php?id=$oneData->id' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-eye-open'></span> View</a>
                                                </td>
                                                <td>
                                                <a href='edit.php?id=$oneData->id' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-pencil'></span> Edit</a>
                                                </td>
                                                <td>
                                                <a href='trash.php?id=$oneData->id' class='btn btn-warning btn-sm' onclick='return confirm_msg();'><span class='glyphicon glyphicon-trash'></span> Trash</a>
                                                </td>
                                                <td>
                                                <a href='delete.php?id=$oneData->id' class='btn btn-danger btn-sm' onclick='return confirm_msg();'><span class='glyphicon glyphicon-remove'></span> Delete</a>
                                                </td>";
                                echo "</tr>";
                                $serial++;
                            }


                            ?>
                            <tr class="">
                                <td colspan="2">
                                    <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                                        <?php
                                        if($itemsPerPage==5 ) echo '<option value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                                        else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                                        if($itemsPerPage==10 )  echo '<option  value="?ItemsPerPage=10" selected >Show 10 Items Per Page</option>';
                                        else  echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                                        if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15" selected >Show 15 Items Per Page</option>';
                                        else echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';

                                        if($itemsPerPage==20 )  echo '<option  value="?ItemsPerPage=20"selected >Show 20 Items Per Page</option>';
                                        else echo '<option  value="?ItemsPerPage=20">Show 20 Items Per Page</option>';

                                        ?>
                                    </select>

                                </td>
                                <td  colspan="6">
                                    <ul class="pagination">
                                        <?php

                                        $pageMinusOne  = $page-1;
                                        $pagePlusOne  = $page+1;
                                        if($page>$pages) Utility::redirect("index.php?Page=$pages");

                                        if($page>1)  echo "<li><a href='index.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";
                                        for($i=1;$i<=$pages;$i++)
                                        {
                                            if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                                            else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

                                        }
                                        if($page<$pages) echo "<li><a href='index.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";

                                        ?>

                                    </ul>
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

<script language="JavaScript" type="text/javascript">
    function confirm_msg(){
        return confirm('Are you sure? ');
    }
</script>

<!-- required for search, block 5 of 5 start -->
<script>

    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 15));

            }
        });


        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });


    });

</script>
<!-- required for search, block5 of 5 end -->

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
