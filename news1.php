<?php
session_start();

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Define variables and set to empty values
$fnameErr = $lnameErr = $cityErr = $phonenoErr = $emailErr = "";
$fname = $lname = $city = $phoneno = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate first name
    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
    } else {
        $fname = test_input($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            $fnameErr = "Only letters and white space allowed";
        }
    }

    // Validate last name
    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
    } else {
        $lname = test_input($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
            $lnameErr = "Only letters and white space allowed";
        }
    }

    // Validate city
    if (empty($_POST["city"])) {
        $cityErr = "Name of city is required";
    } else {
        $city = test_input($_POST["city"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
            $cityErr = "Only letters and white space allowed";
        }
    }

    // Validate phone number
    if (empty($_POST["phoneno"])) {
        $phonenoErr = "Phone number is required";
    } else {
        $phoneno = test_input($_POST["phoneno"]);
        if (!preg_match("/^[0-9]{10}$/", $phoneno)) {
            $phonenoErr = "Phone number must be a 10-digit number";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } elseif (!preg_match("/@gmail\.com$/", $email)) {
            $emailErr = "Email must be a Gmail address (ending with '@gmail.com')";
        }
    }

    if ($fnameErr == "" && $lnameErr == "" && $cityErr == "" && $phonenoErr == "" && $emailErr == "") {
        // If no validation errors, proceed with database insertion
        try {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "form";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }

            $hashedemail = password_hash($email, PASSWORD_BCRYPT);
            $sql = "INSERT INTO water (fname,lname,city,phoneno,email) VALUES ('$fname','$lname','$city','$phoneno','$hashedemail')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['fname'] = $fname;
                header('Location: check.php');
                exit(); // Make sure to exit after redirection
            } else {
                throw new Exception("Error: " . $sql . "<br>" . $conn->error);
            }

            $conn->close();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Add your CSS and JavaScript links here -->
    <style>
        /* Your CSS styles */
        body {
      background-color: rgb(219, 241, 241);
    }

    .head {
      display: none ;
      justify-content: center;
      text-align: center;
      align-items: center;
      width: 100%;
      height: 650px;
      background-image: url(https://www.bhmpics.com/downloads/16K-Ultra-HD-Wallpapers-Top-Free-16K-Ultra-HD-Backgrounds/8.217935.jpg);
      margin: 0;
      padding: 0;
      outline: 0;
      box-sizing: border-box;
      background-size: cover;
    }

    #name {
      color: white;
      font-size: 80px;
      display:inline-flex;
      margin-top: 150px;
    }

    .middle {
      display: flexbox;
      align-items: center;
      flex-direction: row;
      margin: 20px 40px;
      padding: 10px 20px;

    }

    .im {
      margin: 10px 5px;
      padding: 20px;
      width: 1350px;
      height: 120px;
      background-color: rgb(208, 235, 225);
      justify-content: center;
      font-size: x-large;
      text-decoration: solid;

    }

    a {
      cursor: pointer;
      color: darkblue;

    }

    h4 {
      display: block;
      margin-block-start: 1.33em;
      margin-block-end: 1.33em;
      margin-inline-start: 0px;
      margin-inline-end: 0px;
      font-weight: bold;
      color: #092d74;
      font-weight: 700;
      font-size: xx-large;
    }

    .form {
      margin: 10px 5px;
      padding: 20px;
      width: 1350px;
      height: 120px;

    }

    p {
      font-size: 15px;
      line-height: 1.5;
      font-family: Nunito Sans, sans-serif;
    }

    .lname {
      font-weight: bold;
      font-size: larger;
    }

    .address {
      font-weight: bold;
      font-size: larger;
    }

    .city {
      font-weight: bold;
      font-size: larger;
    }

    .a1 {
      border: 1px solid #333;
      display: block;
      margin-bottom: 8px;
      min-height: 25px;
      width: 200px;
    }

    .a2 {
      border: 1px solid #333;
      display: block;
      margin-bottom: 8px;
      min-height: 33px;
      width: 550px;
    }

    .a3 {
      border: 1px solid #333;
      display: block;
      margin-bottom: 8px;
      min-height: 25px;
      width: 200px;
    }

    .a4 {
      border: 1px solid #333;
      display: block;
      margin-bottom: 8px;
      min-height: 25px;
      width: 300px;
    }

    .a5 {
      border: 1px solid #333;
      display: block;
      margin-bottom: 8px;
      height: 80px;
      width: 300px;
    }

    .a6 {
      border: 1px solid #333;
      height: 17px;
      width: 70px;
    }
    </style>
</head>

<body>

<div class="head">
    <div id="name">
      Conserve With Us
    </div>

  </div> <br> <br> <br>
  <div class="middle">
    <div class="im" id="m1">
      <ul type="none" id="item" class="list">
        <li id="item1" class="list1">
          <a href="http://127.0.0.1:3000/Aboutus.html" style="text-decoration: none;">About Us</a>
        </li>
        <li id="item2" class="list2">
          <a href="http://127.0.0.1:3000/Aboutus1.html" style="text-decoration: none;">Who We Are</a>
        </li>
        <li id="item3" class="list3">
          <a href="http://127.0.0.1:3000/contactus.html" id="a1" style="text-decoration: none;">Contact Us</a>
        </li>
        <script>
          const currentPageLink = document.getElementById("a1");
          currentPageLink.href = window.location.href;
        </script>
      </ul>
    </div>
    <div>
      <h4>History of Liquid Legacy</h4>
      <p>The Water – Use It Wisely campaign was launched in 1999 to promote an ongoing water conservation ethic among
        Arizona’s rapidly growing population. “Don’t tell us to save water. Show us how.” That was the sentiment of
        Arizona residents when local cities studied the best messages to use with water conservation outreach.

        With a mission to keep water conservation in the forefront of people’s minds in a smart, fun, and practical way,
        Water – Use It Wisely created unexpected, but highly effective water-saving devices, like a toothbrush, broom,
        and a tuna can. These, and 100+ other devices, remind consumers to think about the water they’re using when they
        come across the items in everyday life. Water-saving device #1 is, of course, you!</p>
      <p>Even more essential though, the campaign is designed to build awareness for Arizona’s unique water situation,
        and to educate the public on why water conservation in our state is so important. On our pages or in our
        messaging, you’ll find Arizona water facts, kid’s games, blogs, landscaping advice, and more.

        The campaign was initially offered outside of the state, and following Arizona’s lead, nearly 400 towns, cities,
        states, utilities, and private and public organizations adopted the Water – Use It Wisely campaign, making it
        one of the largest conservation educational outreach programs of its kind.</p>
      <h4>How to conserve with us</h4>
      <p>This campaign is all about giving voice to water – your voice. No matter where you need to get the water word
        out – business, home, classroom, or municipality – we’ve developed a variety of ways to use Liquid Legacy as a
        tool to help spread your own unique water conservation message</p>
      <h3><span style="font-weight:bold;">1. Sign-up for Our Liquid Legacy News</span></h3>
      <p>Sign up for our news updates for delivery right to your inbox and receive regular updates on water events,
        workshops, and news. Sign up below.</p>
      <h3><span style="font-weight:bold;">2. Get Educational Materials for Kids</span></h3>
      <p>Help teach children about water conservation so they can build smart habits that will last a lifetime. Check
        out our other pages that provides the all the overview of water conservation including water conservation
        techniques,water saving- indoor, outdoor,importance of conserving water and also water footprint calculator
        which indicate our daily water usage. </p>
      <h3><span style="font-weight:bold;">3. Spread the Word</span></h3>
      <p>Are you writing an article, or do you need tips for a newsletter, a blog or a school paper? Water – Use It
        Wisely is overflowing with great water-saving tips, ideas and tools to share. Feel free to share our 100+ tips,
        information from our section on Top Landscape Ideas, or a listing of our Arizona landscape classes and more.
        When suitable, provide credit as “Liquid Legacy"</p>
    </div>
    <!-- Your HTML content goes here -->
    <div class="form">
        <h4>Newsletter</h4>
        <p>Drop us a note if you have comments or questions about saving water.</p>

        <div class="form-container">
            <h1>Subscribe to our Newsletter</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="fname">First Name:</label><br>
                <input type="text" name="fname" value="<?php echo $fname; ?>"><br>
                <span class="error"><?php echo $fnameErr; ?></span><br>

                <label for="lname">Last Name:</label><br>
                <input type="text" name="lname" value="<?php echo $lname; ?>"><br>
                <span class="error"><?php echo $lnameErr; ?></span><br>

                <label for="email">Email:</label><br>
                <input type="text" name="email" value="<?php echo $email; ?>"><br>
                <span class="error"><?php echo $emailErr; ?></span><br>

                <label for="phoneno">Phone No.:</label><br>
                <input type="tel" id="phoneno" name="phoneno" value="<?php echo $phoneno; ?>"><br>
                <span class="error"><?php echo $phonenoErr; ?></span><br>

                <label for="city">Select a State:</label><br>
                <select id="state" name="city">
                    <option value="">Select a State</option>
                    <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">India</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
    <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
                    <!-- Add your options here -->
                </select><br>
                <span class="error"><?php echo $cityErr; ?></span><br>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Your JavaScript code goes here -->

</body>

</html>
