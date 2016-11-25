<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atomic Project</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../resource/assets/bootstrap/text-animation/animate.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Merriweather|Montserrat|Shrikhand" rel="stylesheet">
    <link rel="stylesheet" href="../../resource/assets/bootstrap/css/atomic-style.css">

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
            <img src="../../resource/assets/img/atomiclogo.png" alt="..." class="img-responsive">
        </div>
        <div class="header-info col-md-4">
            <h2 class="project-heading animate-head-text">Atomic Project</h2>
            <h3 class="project-sub-heading animate-head-text">SEIP 137008 B35 Web Application PHP</h3>
        </div>
        <div class="user-img col-md-4">
            <img src="../../resource/assets/img/user-img.jpg" alt="..."  class="img-circle size">
        </div>
    </div>
</div>

<hr class="hr-divider">
<div role="alert" class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Welcome!!</strong> Choose one form the category below by clicking image <span class="glyphicon glyphicon-arrow-down"></span>
    Click here <span class="glyphicon glyphicon-arrow-right"></span> <a href="index.php" class="btn btn-warning" >Log Out!</a>
</div>
<hr class="hr-divider">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <a href="BookTitle/index.php" >
                <img src="../../resource/assets/img/category-image/book-title.png" alt="..." class="img-responsive img-rounded category-image center-block">
                <span class="category-heading btn btn-success">Book tittle</span>
            </a>
        </div>
        <div class="col-md-3">
            <a href="Birthday/index.php">
                <img src="../../resource/assets/img/category-image/birthdate.png" alt="..." class="img-responsive img-rounded category-image center-block ">
                <span class="category-heading btn btn-success">Birthdate</span>
            </a>
        </div>
        <div class="col-md-3">
            <a href="City/index.php">
                <img src="../../resource/assets/img/category-image/city.jpg" alt="..." class="img-responsive img-rounded category-image center-block">
                <span class="category-heading btn btn-success">City</span>
            </a>
        </div>
        <div class="col-md-3">
            <a href="Email/index.php">
                <img src="../../resource/assets/img/category-image/email.jpg" alt="..." class="img-responsive img-rounded category-image center-block">
                <span class="category-heading btn btn-success">Email</span>
            </a>
        </div>
    </div>
    <hr class="hr-divider">
    <div class="row">
        <div class="col-md-3">
            <a href="Gender/index.php">
                <img src="../../resource/assets/img/category-image/gender.jpg" alt="..." class="img-responsive img-rounded category-image center-block">
                <span class="category-heading btn btn-success">Gender</span>
            </a>
        </div>
        <div class="col-md-3">
            <a href="Hobbies/index.php">
                <img src="../../resource/assets/img/category-image/hobbies.png" alt="..." class="img-responsive img-rounded category-image center-block">
                <span class="category-heading btn btn-success">Hobbies</span>
            </a>
        </div>
        <div class="col-md-3">
            <a href="ProfilePicture/index.php">
                <img src="../../resource/assets/img/category-image/profile-picture.png" alt="..." class="img-responsive img-rounded category-image center-block">
                <span class="category-heading btn btn-success">Profile Picture</span>
            </a>
        </div>
        <div class="col-md-3">
            <a href="SummaryOfOrganization/index.php">
                <img src="../../resource/assets/img/category-image/summary-of-org.jpg" alt="..." class="img-responsive img-rounded category-image center-block">
                <span class="category-heading btn btn-success">Summary of Organization</span>
            </a>
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
<script src="../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../resource/assets/bootstrap/js/bootstrap.min.js"></script>

<script src="../../resource/assets/bootstrap/text-animation/jquery.fittext.js"></script>
<script src="../../resource/assets/bootstrap/text-animation/jquery.lettering.js"></script>
<script src="../../resource/assets/bootstrap/text-animation/jquery.textillate.js"></script>

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