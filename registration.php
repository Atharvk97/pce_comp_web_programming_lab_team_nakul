<?php
if($_SERVER["REQUEST_METHOD"] == "POST") { 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "water";

    $conn = mysqli_connect($server, $username, $password, $database);
    if(!$conn){
        die("connection to this database is failed due to ".mysqli_connect_error());
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Check if email already exists
    $check_query = "SELECT * FROM `signup` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        $error_message = "Email address already exists!";
    } else {
        // Hash the password using bcrypt
        $hash = password_hash($password,PASSWORD_DEFAULT);
        // You should use prepared statements to prevent SQL injection
        $sql= "INSERT INTO `water`.`signup` (`name`, `email`,`phone`, `pass`, `date`) VALUES ('$username', '$email','$phone', '$hash', current_timestamp())";
        
        if($conn->query($sql) == true){
            header("location: wfc.php");
        } else {
            $error_message = "Error occurred while registering. Please try again later.";
        }
    }
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(https://hdqwalls.com/wallpapers/ocean-waves-at-sunset.jpg);
            background-size: cover;
        }

        /* Styling for the main container */
        div.hi {
            border-radius: 25px;
            background-size: cover;
            background-color: transparent;
            padding: 10px;
            margin: 0 auto; 
            /* Center the div horizontally */
            margin-top: 10%; /* Adjust margin from top */
            background-color: transparent;
            height: auto; 
            /* Allow height to adjust based on content */
            width: 500px;
            overflow: hidden;
            max-height: 100%;

            /* opacity: 50%; */
            /* Set a maximum height */
        }


        button {
            background-color: rgba(54, 58, 190, 0.749);
            border-radius: 20px;
            margin: 20px 0;
            /* Adjust margin */
            height: 30px;
            width: 80px;
            padding: 2px;
            text-align: center;
            display: block;
            /* Ensure button is a block element */
            margin-left: auto; 
            /* Center button horizontally */
            margin-right: auto;
            /* Center button horizontally */
        }

        input[type="text"] {
            width: 200px;
            height: 30px;
            border-radius: 10px;
            color: rgb(8, 7, 7);
            display: block;
            /* Ensure input is a block element */
            margin: auto;
            /* Center input horizontally */
        }

        /* Styling for labels */
        .k {
            color: rgb(8, 7, 7);
            text-align: center;
            font-weight: 600;
            
        }   
        .k1{
            position: relative;
            width: 200px;
            height: 30px;
            border-radius: 10px;
            color: rgb(8, 7, 7);
            display: block;
            /* Ensure input is a block element */
            margin: auto;
        }
form 
{
    max-width: 600px;
    margin: 0 auto;
    padding: 30px;
    border-radius: 8px;
   
}
#name{
    opacity: 56%;
}
a{
    color: aliceblue;
    text-decoration: none;
}
    </style>
</head>

<body>
    <!-- Main container for the registration form -->
    <div class="hi">
        <!-- Registration form -->
        <form action="registration.php" method="post" onsubmit="return validateForm()">
        <!-- Fieldset for grouping form elements -->
            <!-- Legend for the fieldset -->
            <legend style="text-align: center; color: rgba(22, 7, 121, 0.856);font-size: 22px; font-weight: bold;">Register to calculate water footprint </legend>
            <!-- Name input field --> 
            <p class="k"> <label for="username">Name:</label></p>
            <input type="text" id="username" name="username" placeholder="Name" required>
            <!-- Email input field -->
            <p class="k"> <label for="email">E-mail Id:</label></p>
            <input type="text" id="email" name="email" placeholder="abcd@gamil.com" required>
            <!-- Phone number input field -->
            <p class="k"> <label for="phone">Phone No:</label></p>
            <input type="text" id="phone" name="phone" placeholder="92932XXXXX" required>
            <!-- Address input field -->
            <p class="k"> <label for="password">Password:</label></p>
            <input class="k1" type="password" name="password" id="password" placeholder="XXXXXX" required>
            <br>
            <!-- Register button -->
            <button style= " color:aliceblue; cursor: pointer;" type="submit">Register</button>
    </form>
    </div>
    <script>
        function validateForm() {
            var name = document.getElementById('username').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var password = document.getElementById('password').value;

            // Check if any field is empty
            if (name === '' || email === '' || phone === '' || password === '') {
                alert('Please fill in all fields');
                return false;
            }

            // Check if the email format is valid
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address');
                return false;
            }

            if (password.length < 6) {
            alert('Password must be at least 6 characters long');
            return false;
        }

            // Check if the phone number format is valid
            var phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phone)) {
                alert('Please enter a valid phone number');
                return false;
            }

            return true; // Form submission allowed if all validations pass
        }
    </script>
</body>

</html>
