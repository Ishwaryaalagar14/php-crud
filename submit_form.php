<?php
include 'connection.php';

if(isset($_POST['submit'])){


    $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['contact'];
    $hire_date=$_POST['hdate'];

    $query="insert into employees (first_name,last_name,email,phone,hire_date) values ('$first_name','$last_name','$email','$phone','$hire_date')";
    $result=mysqli_query($conn,$query);

    if($result){
        header('Location: dashboard.php');
    }else{
        echo "Failed to submit data";
    }
}
mysqli_close($conn);

?>