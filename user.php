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
                        <li><a href="c.html">General</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="panels.html">Panels</a></li>
                        <li><a href="font_awesome.html">Font Awesome</a></li>
                     </ul>
                  </li>
                  <li class="sub-menu">
                     <a href="javascript:;">
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
               <div class="table-container">
               <?php 
                  $sql = "SELECT * FROM user";
                  $results = mysqli_query($conn,$sql);
                  ?>
                  <div id="search-bar">
          <label>Search :</label>
          <input type="text" id="search" name="search"autocomplete="off">
        </div>
               <table>
                  <thead class="bg-light">
                     <tr>
                       
                        <th>Name</th>
                    
                     </tr>
                  </thead>
                  <tbody>
                     <?php while($row = mysqli_fetch_assoc($results)):?>
                     <tr>
                       
                        <td id="table-data">
                           
                        </td>
                       
                   
                     <?php endwhile;?>
                  </tbody>
               </table>
                     </div>
            </section>
         </section>
      </section>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // Load Table Records
    function loadTable(){
     
      $.ajax({
        url : "ajax-load.php",
        type : "POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    }
    loadTable(); // Load Table Records on Page Load

  

    // Live Search
     $("#search").on("keyup",function(){
     
       var search_term = $(this).val();

       $.ajax({
         url: "ajax-search.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data").html(data);
         }
       });
     });
  });
</script>

      <script src="js/jquery/jquery.min.js"></script>
      <script src="css/bootstrap/js/bootstrap.min.js"></script>
      <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
      <script src="js/jquery.scrollTo.min.js"></script>
      <script src="js/common-scripts.js"></script>
    
   </body>
</html>