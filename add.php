<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex  justify-center items-center h-[100vh] bg-[#333333] gap-1">
<div class="container ">

    <form action="submit_form.php" method="post" class="flex flex-col bg-[#28282B] p-4 rounded-xl w-96 gap-3 mx-96">
    <h1 class="text-3xl text-white">Add Details</h1>
        <label for="fname" class=" text-base text-white">First Name</label>
        <input type="text" name="fname" id="fname" class="rounded-xl p-3 border-2 text-white bg-[#595959] border-[#ff1ac6]  focus:outline-none focus:border-b focus:ouline-red-500">
        <label for="lname" class=" text-base text-white">Last Name</label>
        <input type="text" name="lname" id="lname" class="rounded-xl p-3 border-2 text-white  bg-[#595959] border-[#ff1ac6]  focus:outline-none focus:border-b focus:ouline-red-500">
        <label for="email" class=" text-base text-white">Email</label>
        <input type="text" name="email" id="email" class="rounded-xl p-3 border-2 text-white bg-[#595959] border-[#ff1ac6]  focus:outline-none focus:border-b focus:ouline-red-500">
        <label for="contact" class=" text-base text-white">Contact No</label>
        <input type="number" name="contact" id="contact" class="rounded-xl p-3 border-2 text-white bg-[#595959] border-[#ff1ac6]  focus:outline-none focus:border-b focus:ouline-red-500">
        <label for="hdate" class=" text-base text-white">Hire Date</label>
        <input type="date" name="hdate" id="hdate" class="rounded-xl p-3 border-2 text-white bg-[#595959] border-[#ff1ac6]  focus:outline-none focus:border-b focus:ouline-red-500">
        <button type="submit" name="submit" class="text-center text-white bg-[#ff33cc] rounded-2xl p-3 my-4">Submit</button>
    </form>

</div>
    
</body>
</html>