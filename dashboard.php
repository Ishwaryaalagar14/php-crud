<?php
session_start();


if(!isset($_SESSION['logged_in'])){
    header('Location: login.php');
}

include 'connection.php';

$query = "SELECT * FROM employees";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0){
    echo "No data found";
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    

    <!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 ">
            <div>
              <h2 class="text-xl font-semibold text-gray-800 ">
                Employee Details
              </h2>
             
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                <a href="add.php" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" >
                 Create
                </a>
              </div>
              <div class="inline-flex gap-x-2">
                <a href="logout.php" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none" >
                  Logout
                </a>
              </div>
            </div>
          </div>
          <!-- End Header -->
          <!-- Table -->
          <table class="min-w-full divide-y divide-gray-200 ">
            <thead class="bg-gray-50 ">
              <tr>
                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center justify-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                      Employee ID
                    </span>
                    </div>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center justify-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                      First Name
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center justify-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                      Last Name
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center justify-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                      Email
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center justify-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                      Contact
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-end">
                <div class="flex items-center justify-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                      Hiring Date
                    </span>
                  </div>
                
                </th>
              </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 ">
            <?php
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr class='bg-white hover:bg-gray-50'>";
            echo "<td class='size-px whitespace-nowrap text-center'>".$row['id']."</td>";
            echo "<td class='size-px whitespace-nowrap text-center'>".$row['first_name']."</td>";
            echo "<td class='size-px whitespace-nowrap text-center'>".$row['last_name']."</td>";
            echo "<td class='size-px whitespace-nowrap text-center'>".$row['email']."</td>";
            echo "<td class='size-px whitespace-nowrap text-center'>".$row['phone']."</td>";
            echo "<td class='size-px whitespace-nowrap text-center'>".$row['hire_date']."</td>";
            echo "<td class='size-px whitespace-nowrap text-center'><a class='text-blue-600 underline' href='edit_details.php?id=".$row['id']."'>Edit</a> <a href='#' class='text-red-600 underline' onclick='deleteEmployee(".$row['id'].")'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
              
      <!-- End Body -->
    </div>
  </div>
</div>
<!-- End Modal -->
    <script>
        function deleteEmployee(id){
            fetch('delete.php?id='+id, {
                method: 'DELETE'
            }).then(response => {
                if(response.ok){
                    alert('Employee deleted successfully');
                    location.reload();
                }else{
                    alert('Employee deletion failed');
                }
            });
            }
    </script>


</body>
</html>