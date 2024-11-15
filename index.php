<?php

 include('database/db.php');


   if(isset($_POST['login'])){

     $email = $_POST['email'];
     $pass1 = $_POST['pass'];

     $sql = "SELECT * FROM users WHERE Email = '$email'";
     $result = mysqli_query($conn,$sql);

     $row = mysqli_num_rows($result);

     if($row>0){

        $user = mysqli_fetch_assoc($result);

        $pass = $user['Pass'];
        $role = $user['Role'];
        $id = $user['SN'];

        if($pass !== $pass1){
            
            echo'
                <div class="alert alert-danger" role="alert">
                    Incorrect Password Try again
                </div></br>
            ';
    
        }else{
                header('location: Admin/index.php?uid='.$id.'');
                session_start();
                $_SESSION['user'] = $email;
    
        }

     }else{

        echo'
        <div class="alert alert-warning" role="alert">
           No user Foud
        </div></br>
    ';

     }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
        }
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .btn-primary {
            width: 100%;
        }
    </style>

<div class="login-container">
    <h2 class="text-center">Login</h2>
    <form action='index.php' method='POST'>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name='email' id="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name='pass' id="password" placeholder="Enter your password" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
      <button href="" class="btn btn-primary" name="login">Login</button>
    </form>

    <p class="mt-5">Don't have account yet? <a href="register.php">Register</a></p>
</div>




</body>
</html>



