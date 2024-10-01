<?php
session_start();

if(!isset($_SESSION['logged_in'])){
    header('Location: login.php');
}
include 'connection.php';

if(isset($_POST['submit'])){


    $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['contact'];
    $hire_date=$_POST['hdate'];

    $employee_id = $_POST['id'];
     
    $query = "UPDATE employees SET first_name='$first_name', last_name='$last_name', email='$email', phone='$phone', hire_date='$hire_date' WHERE id='$employee_id'";
    $result = mysqli_query($conn, $query);

    if($result){
        header('Location: dashboard.php');
    }else{
        echo "Failed to update data";
    }

}

mysqli_close($conn);

?>