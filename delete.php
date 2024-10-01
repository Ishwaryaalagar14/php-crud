<?php
session_start();
include 'connection.php';

$employee_id = $_GET['id'];

$query = "DELETE FROM employees WHERE id='$employee_id'";
$result = mysqli_query($conn, $query);


