<?php session_name('hosthubSession');
  session_start(); 

require 'lib/db.php';
$db = new Database();

$error = "";

if(isset($_POST['submit'])){


    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $db->select($sql);

    $total_results = iterator_count($result); 

      if($total_results > 0){

            foreach ($result as $key) {
              $_SESSION['id']         = $key['id'];
              $_SESSION['name']       = $key['name'];
              $_SESSION['email']      = $key['email'];
              $_SESSION['password']   = $key['password'];
              $_SESSION['isLogin']    = true;
              
              echo "<script> location.href='portfolio'; </script>";
              exit;



            } 
    
        }
        elseif($total_results === 0){

            $error = "Username or password incorrect";
            header("Location: login.php");
          
         }

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

    <title>HostHub - Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="css/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo.png">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <form action="login.php" method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" name="submit" class="btn btn-success" style="width: 30%;">Login</button>
                <p style="color: red;"><?php echo $error; ?></p>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="images/logo.gif"></h1>
                  <!-- <img src="images/logo.png" style="width: 70%"> -->

                  <p>©2019 All Rights Reserved. <b>Coordinator</b> </p>
                </div>
              </div>
            </form>

          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
