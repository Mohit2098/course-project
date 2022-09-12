<?php 
   require('connection.php');
   session_start(); 
   
   if(isset($_POST["submit"])){
   
   $username=$_POST['username'];
   $password=$_POST['password'];
   date_default_timezone_set('Asia/Kolkata');
   $date = date('d-m-y h:i:s');

   $sql="SELECT * FROM admin_login WHERE username = '$username'"; 
   
   $result = mysqli_query($conn,$sql);
   
     
     if($result){
   
      if(mysqli_num_rows($result)==1)
      {
   
      $result_fetch = mysqli_fetch_assoc($result);
   
      if($password == $result_fetch['password']){
    
        if(!empty($_POST["rememberMe"])){
          setcookie('remember','remember',time()+60*60*7);
        }
        setcookie('username',$result_fetch['username'],time()+60*60*7);
        $_SESSION["logged-in"]=true;
        $_SESSION['username']=$result_fetch['username'];
        $sql = "UPDATE admin_login SET last_login = '$date' where username = '$username'";
        mysqli_query($conn, $sql);
        header("location: index.php");
   
       
    
     } 

      else{ 
      
        echo "<script>alert('Incorrect Password');</script>";
        
     } 
   
    
     }  
     else{
       echo "<script>alert('Username Not Registered');</script>";
     }
   

   }
   
    
    }
   
   ?>
<!doctype html>
<html lang="en">
   <head>
      <title>Admin Pannel Login</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/login-form.css">
   </head>
   <body>
      <section class="login-section">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12 col-lg-10">
                  <div class="wrap d-md-flex">
                     <div class="welcome-image  d-flex order-md-last">
                        <img src ="images/Login_image.png">
                     </div>
                     <div class="login-wrapper p-4 p-lg-5">
                        <div class="d-flex">
                           <div class="w-100">
                              <h3 class="mb-4">Sign In</h3>
                           </div>
                        </div>
                        <form action="login.php" class="signin-form" method="Post">
                           <div class="form-group mb-3">
                              <label class="label" for="name">Username</label>
                              <input type="text" class="form-control" name="username" placeholder="Username" required>
                           </div>
                           <div class="form-group mb-3">
                              <label class="label" for="password">Password</label>
                              <input type="password" class="form-control" name="password" placeholder="Password" required>
                           </div>
                           <div class="form-group">
                              <button type="submit" name="submit" class="form-control btn btn-primary sign-in-btn px-3">Sign In</button>
                           </div>
                           <div class="form-group d-md-flex">
                              <div class="w-50 text-left">
                                 <input type="checkbox" value="rememberMe" name="rememberMe" > <label for="rememberMe">Remember me</label>
                                 </label>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>