<?php
  session_name('hosthubSession');
  session_start();


if (isset($_SESSION['id'])) {
    $user_id    = $_SESSION['id'];
    $username   = $_SESSION['name'];
    $email      = $_SESSION['email'];
    $password   = $_SESSION['password'];
    $isLogin    = $_SESSION['isLogin'];
    $role    = $_SESSION['role'];
} else {
      echo "<script> location.href='../login.php'; </script>";
  }



?>



<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coordinator - Dashboard</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <script src="../js/jquery/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="../css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- NProgress -->
    <link href="../css/nprogress/nprogress.css" rel="stylesheet">

    <link rel="shortcut icon" href="../images/favicon.png">

    <!-- Custom Theme Style -->
    <link href="../css/custom.min.css" rel="stylesheet">


    <!-- editor -->
  <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
  <link href="../css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="../css/editor/index.css" rel="stylesheet">

   <!-- richtext editor -->
  <script src="../js/editor/bootstrap-wysiwyg.js"></script>
  <script src="../js/editor/external/jquery.hotkeys.js"></script>
  <script src="../js/editor/external/google-code-prettify/prettify.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular-sanitize.js"></script>
<script src="../../js/angular/tinymce.js"></script>
  <script src="../../js/angular/CMS_APP.js"></script>
  <script src="../../js/angular/scopeService.js"></script>
  <script src="../../js/angular/UploadService.js"></script>
  <script src="../portfolio1/portfolioController.js"></script>
  <script src="../packages1/packagesController.js"></script>
  <script src="../banner-content/banner-content.Controller.js"></script>
  
  <!-- Custom styling plus plugins -->
  <link href="../css/custom.css" rel="stylesheet">
  <link href="../css/icheck/flat/green.css" rel="stylesheet">
  <link href="../css/animate.min.css" rel="stylesheet">

   <!-- <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script> -->
  <!-- <link rel="stylesheet" type="text/css" href="../tinymce/demo_style.css" />
		
		<script type="text/javascript" src="../tinymce/jscripts/tiny_mce/plugins/tiny_mce_wiris/core/display.js"></script>
		<script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script> 


  </head>

  <body class="nav-md" >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="text-align: center; background: white">
                <a href="javascript:;" class="site_title">
                  <img src="../images/logo.gif" alt="Coordinator" style="width: 50px">
                </a>
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="../images/default.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo "Admin"; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Admin Panel</h3>
                <ul class="nav side-menu" style="overflow-y: scroll;height: 450px;max-width: 230px;">

                    <li><a href="../banner-content"><i class="fa fa-play"></i> Banner Content</a></li>
                    <li><a href="../portfolioCategories"><i class="fa fa-sitemap"></i> Portfolio Categories</a></li>
                    <li><a href="../portfolio1"><i class="fa fa-globe"></i> Portfolio </a></li>
                    <li><a href="../clients"><i class="fa fa-users"></i> Our Clients </a></li>
                    <li><a href="../team"><i class="fa fa-users"></i> Team </a></li>
                    <li><a href="../services"><i class="fa fa-edit"></i> Services </a></li>
                    <li><a href="../testimonials"><i class="fa fa-quote-right"></i> Testimonials </a></li>
                    <li><a href="../blog"><i class="fa fa-edit"></i> Blog </a></li>
                    <li><a href="../aboutus"><i class="fa fa-edit"></i> About Us </a></li>
                    <li><a href="../contactus"><i class="fa fa-edit"></i> Contact Us </a></li>
                    <li><a href="../contactus_user"><i class="fa fa-inbox"></i> Messages</a></li>
                    <li><a href="../funfacts"><i class="fa fa-edit"></i> Fun Facts </a></li>
                    <li><a href="../subscribers"><i class="fa fa-heart"></i>Subscribers </a></li>
                    <li><a href="../packageServices"><i class="fa fa-edit"></i>Package Services </a></li>
                    <li><a href="../packages1"><i class="fa fa-edit"></i>Packages </a></li>
                    <?php 
                      if($role=="superAdmin"){
                        echo '<li><a href="../users"><i class="fa fa-user"></i>Users </a></li>';
                      }
                    ?>
                    
                     <!-- <li><a href="contact"><i class="fa fa-envelope"></i> Contact Messages </a></li> -->                  
                </ul>
                </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a href="../logout.php" data-toggle="tooltip" data-placement="top" style="width: 100%" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">

            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/default.png" alt=""><?php echo "Admin"; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <!-- <li><a href="settings.php"> Profile</a></li> -->

                    <li><a href="../archon/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>

                  </ul>
                </li>
              </ul>
            </nav>

          </div>
        </div>
        <!-- /top navigation -->
