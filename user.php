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
                        <li><a href="c.html">Show</a></li>
                        <li><a href="buttons.html">Add</a></li>
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
            <a href="index.php" class="logo"><b>MADHU<span>ROKADE</span></b></a>
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
               <table class="table table-borderless align-middle mb-0 bg-white">
                  <thead class="bg-light">
                     <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php while($row = mysqli_fetch_assoc($results)):?>
                     <tr>
                        <td>
                           <div class="d-flex align-items-center">
                              <div class="ms-3">
                                 <p class="fw-bold mb-1"><?php echo $row['id']?></p>
                              </div>
                           </div>
                        </td>
                        <td>
                           <p class="fw-normal mb-1"><?php echo $row['name']?></p>
                        </td>
                        <td>
                           <p class="fw-normal mb-1"><?php echo $row['contact']?></p>
                        </td>
                        <td>	<?php 
                           if($row['status']=="1")
                           
                              echo
                           "<a href=deactivate.php?id=".$row['id']." class='btn btn-danger'>Deactivate</a>";
                           else
                              echo
                           "<a href=activate.php?id=".$row['id']." class='btn btn-success'>Activate</a>";
                           ?>
                           </td>
                     </tr>
                     <?php endwhile;?>
                  </tbody>
               </table>
                     </div>
            </section>
         </section>
      </section>
      <script src="js/jquery/jquery.min.js"></script>
      <script src="css/bootstrap/js/bootstrap.min.js"></script>
      <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
      <script src="js/jquery.scrollTo.min.js"></script>
      <script src="js/common-scripts.js"></script>
   </body>
</html>