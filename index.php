<?php 
   require('connection.php');
   session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Login</title>
      <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
      <link href="css/style.css" rel="stylesheet">
      <link href="css/style-responsive.css" rel="stylesheet">
   </head>
   <body>
      <section id="container">
         <aside>
            <div id="sidebar" class="nav-collapse ">
               <ul class="sidebar-menu" id="nav-accordion">
                  <?php if(isset($_COOKIE['remember']) || $_SESSION['logged-in'])
                     {        
                      if($_SESSION){
                     echo "<h5 class='text-center'>".$_SESSION['username']."</h5>";
                     }
                       else{
                     echo "<h5 class='text-center'>".$_COOKIE['username']."</h5>";
                      }	
                          ?>   
                  <li class="mt">
                     <a class="active" href="index.php">
                     <i class="fa fa-dashboard"></i>
                     <span>Dashboard</span>
                     </a>
                  </li>
                  <li class="sub-menu">
                     <a href="javascript:;">
                     <i class="fa fa-desktop"></i>
                     <span>Courses</span>
                     </a>
                     <ul class="sub">
                        <li><a href="index.php">General</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="panels.html">Panels</a></li>
                        <li><a href="font_awesome.html">Font Awesome</a></li>
                     </ul>
                  </li>
                  <li class="sub-menu">
                     <a href="user.php">
                     <i class="fa fa-users"></i>
                     <span>Users</span>
                     </a>
                  </li>
               </ul>
            </div>
         </aside>
         <header class="header black-bg">
            <div class="sidebar-toggle-box">
               <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="index.php" class="logo"><b>MADHUR<span>OKADE</span></b></a>
            <div class="top-menu">
               <ul class="nav pull-right top-menu">
                  <?php
                     echo " <li> <a  class='logout' href='logout.php'>Logout</a></li>";
                     }
                     else{
                     header("location: login.php");
                     }
                     ?>
               </ul>
            </div>
         </header>
         <section id="main-content">
            <section class="wrapper">
               <div class="row mt">
                  <div class="col-md-4 col-sm-4 mb">
                     <div class="grey-panel pn donut-chart">
                        <div class="grey-header">
                           <h5>Total Users</h5>
                        </div>
                        <div class="row">
                           <div class="col-md-4 col-xs-6" style="width:100%;">
                              <h2 class="text-center">21</h2>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-4 mb">
                     <div class="darkblue-panel pn">
                        <div class="darkblue-header">
                           <h5>Total Courses</h5>
                        </div>
                        <div class="col-md-4 col-xs-6" style="width:100%;">
                           <h2 class="text-center">21</h2>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </section>
      </section>
      <script src="js/jquery/jquery.min.js"></script>
      <script src="css/bootstrap/js/bootstrap.min.js"></script>
      <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
      <script src="js/jquery.scrollTo.min.js"></script>
      <script src="js/common-scripts.js"></script>
      <script src="js/ajax.js"></script>
   </body>
</html>