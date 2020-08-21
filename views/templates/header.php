<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="config/core/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="config/core/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="config/core/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="config/core/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="config/core/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="config/scripts/css/print-preview.css.css">
  <link rel="stylesheet" href="config/core/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="config/core/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="config/core/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="config/core/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="config/core/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  .pg_notify{
	display: none !important;
  }
  </style>
  </head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="index2.html" class="logo">
      <!--<span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Admin</b>LTE</span>-->
	  <img src="imgs/logo.png" style="width: 100%;height: 54px;">
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style=" font-size: 129%; ">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		<?php
		if($_SESSION['User_access']=='Y'){
		?>
		<li class="dropdown user user-menu">			
			<a style="cursor: pointer;" class="menu_click" data-page="settings.php">
			  <i class="fa fa-cogs" style=" font-size: 175%; "></i>
			  <span class="hidden-xs">Settings</span>
			</a>
		</li>
		<?php } ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <i class="fa fa-user" style=" font-size: 175%; "></i>
              <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu" style="top: 55px;">				
              <li class="user-header">
                <img src="config/core/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
	
                <p>
                  Admin User - 2018
                  <small>Member since Nov. 2018</small>
                </p>
              </li>
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat" onclick="signout()">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  