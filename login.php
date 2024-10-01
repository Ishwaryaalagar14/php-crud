<?php
session_start();

if(isset($_SESSION['logged_in'])){
    header('Location: dashboard.php');
}

include 'connection.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $_SESSION['logged_in'] = $email;
        header('Location: dashboard.php');
    }else{
        echo "Invalid email or password";
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex  justify-center items-center h-[100vh] bg-[#333333] gap-1">
<form action="" method="POST">
    <div class=" flex flex-col bg-[#28282B] p-4 rounded-xl w-96 gap-3">
       
        <h1 class="text-center text-[#ff1ac6] font-bold text-3xl">Welcome back  </h1>
        <h1 class="text-center text-white text-sm">Glad to see you again</h1>
        <h1 class="text-center text-white text-sm">Login to you account below</h1>
        <label for="" class=" text-base text-white">Email</label>
        <input type="email" name="email" placeholder="Enter Email..." class="rounded-xl p-3 border-2  bg-[#595959] border-[#ff1ac6] hover:border-b hover:border-blue-500 focus:outline-none focus:border-b focus:ouline-red-500">
        <label for="" class=" text-base text-white">Password</label>
        <input type="password" name="password" placeholder=" Enter Password..." class=" rounded-xl p-3 border-2 bg-[#595959] border-[#ff1ac6] hover:border-b hover:border-blue-500 focus:outline-none focus:border-b focus:ouline-red-500">
        <input type="submit" name="submit" class="text-center text-white bg-[#ff33cc] rounded-2xl p-3 my-4">
        
        
        <p class="text-sm text-white p-5">Dont have an account? <a href='#' class="text-[#ff1ac6]">Sign up for free</a></p>
        

    </div>
   
    </form>

</body>
</html>