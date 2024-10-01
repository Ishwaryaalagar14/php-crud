<?php
session_start();

if(!isset($_SESSION['logged_in'])){
    header('Location: login.php');
}

include 'connection.php';

$employee_id = $_GET['id'];


$query = "SELECT * FROM employees WHERE id='$employee_id'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0){
    echo "No data found with this id";
    exit(); 
}


while($row = mysqli_fetch_assoc($result)){
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $hire_date = $row['hire_date'];
}


?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex  justify-center items-center h-[100vh] bg-[#333333] gap-1">
    <div>
    
    <form action="edit_form.php" method="post" class="flex flex-col bg-[#28282B] p-4 rounded-xl w-96 gap-3 mx-96">
    <h1 class="text-3xl text-white">Edit Details</h1>
        <label for="fname" class=" text-base text-white">First Name</label>
        <input type="text" name="fname" id="fname" value="<?php echo $first_name; ?>" class="rounded-xl p-3 border-2 text-white bg-[#595959] border-[#ff1ac6]  focus:outline-none focus:border-b focus:ouline-red-500">
        <label for="lname" class=" text-base text-white">Last Name</label>
        <input type="text" name="lname" id="lname" value="<?php echo $last_name; ?>" class="rounded-xl p-3 border-2 text-white  bg-[#595959] border-[#ff1ac6]  focus:outline-none focus:border-b focus:ouline-red-500">
        <label for="email" class=" text-base text-white">Email</label>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="rounded-xl p-3 border-2 text-white bg-[#595959] border-[#ff1ac6]  focus:outline-none focus:border-b focus:ouline-red-500">
        <label for="contact" class=" text-base text-white">Contact No</label>
        <input type="number" name="contact" id="contact" value="<?php echo $phone; ?>" class="rounded-xl p-3 border-2 text-white bg-[#595959] border-[#ff1ac6]  focus:outline-none focus:border-b focus:ouline-red-500">
        <label for="hdate" class=" text-base text-white">Hire Date</label>
        <input type="date" name="hdate" id="hdate" value="<?php echo $hire_date; ?>" class="rounded-xl p-3 border-2 text-white bg-[#595959] border-[#ff1ac6]  focus:outline-none focus:border-b focus:ouline-red-500">
        <input type="hidden" name="id" value="<?php echo $employee_id; ?>">
        <button type="submit" name="submit" class="text-center text-white bg-[#ff33cc] rounded-2xl p-3 my-4">Submit</button>
    </form>
   
    </div>
</form>
    
</body>
</html>
