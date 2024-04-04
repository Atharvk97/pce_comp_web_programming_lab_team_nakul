<?php
session_start(); // Start the session

$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "water";

    // $conn = mysqli_connect($server, $username, $password, $database);
    // if (!$conn) {
    //     die("Connection to this database is failed due to " . mysqli_connect_error());
    // }
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "water";
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get email and password from the form
    $email = $_POST["email"];
    $password1 = $_POST["password"];
   
    // Fetch hashed password from the database for the provided email
    // $sql = "SELECT password FROM signup WHERE email='$email'";
    // $result = mysqli_query($conn, $sql);
    $stmt = $conn->prepare("SELECT * FROM signup WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
if ($result->num_rows == 1) {
    // Fetch the row data
    $row = $result->fetch_assoc();
    $stored_hash = $row["pass"];
    echo "Entered password: $password1<br>";
echo "Retrieved hashed password from database: $stored_hash<br>";
    
    //echo "Retrieved hashed password from database: $hashed_password"; // Debugging

    // Verify hashed password with the provided password
   // Verify hashed password with the provided password
if (password_verify($password1,$stored_hash)) {
    $login = true;
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    header("location: wfc.html");
    exit(); // Terminate script execution after redirection
} else {
    $showError = "Invalid Credentials";
    echo "Password verification failed"; // Debugging
}

} else {
    $showError = "Invalid Credentials";
    echo "Query failed"; // Debugging
}

    // Close database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the webpage -->
    <title>Login Page</title>
    <!-- Internal CSS styling -->
    <style>
        /* Styling for the container */

        /* Body background image and size */
        body {
            font-family: Arial, sans-serif;
            background-image: url(https://hdqwalls.com/wallpapers/ocean-waves-at-sunset.jpg);
            background-size: cover;
        }
        /* Styling for the login box */
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
span{
    position: relative;
    top: 70%;
    left: 21%;
    color: aliceblue;
    font-size: 24px;
    font-weight: 400;
}
    </style>
</head>

<body>
<?php
  if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You are logged in successfully
    </div>';
  }
  if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>'. $showError.'
    </div>';
}
?>
 <!-- Main container for the registration form -->
 <div class="hi">
    <!-- Registration form -->
    <form action="login.php" method="post">
    <!-- Fieldset for grouping form elements -->
        <!-- Legend for the fieldset -->
        <legend style="text-align: center; color: rgba(22, 7, 121, 0.856);font-size: 22px; font-weight: bold;">Login here </legend>
        <p class="k"> <label for="name">E-mail Id:</label></p>
        <input type="text" id="email" name="email" placeholder="abcd@gamil.com" required>
        <p class="k"> <label for="name">Password:</label></p>
        <input class="k1" type="password" name="password" id="password" placeholder="XXXXXX" required>
        <br>
        <!-- Register button -->
        <a href="wfc.html"><button style= " color:aliceblue; cursor: pointer;" type="submit">LOGIN</button></a>
        <span>Forgot password</span>
                <!-- Link for new user registration -->
                <a href="http://localhost/finalproject/registration.php"><span>New user</span></a>
    </form>
</div>

</body>

</html>


