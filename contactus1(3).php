<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <style>
        body {
             background-color: rgb(219, 241, 241);
        }
        .head {
            display: flex;
            justify-content: center;
            text-align: center;
            align-items: center;
            width: 100%;
            height: 650px;
            background-image: url(https://wallpapers.com/images/hd/hd-river-in-the-mountains-kgb9wrcm1wmrfa5m.jpg);
            margin: 0;
            padding: 0;
            outline: 0;
            box-sizing: border-box;
        }
        #name {
            color: white;
            font-size: 80px;
        } 
        .middle {
            display: flexbox;
            align-items: center;
            flex-direction: row;
            margin: 20px 40px;
            padding: 10px 20px;
            
        }
        .im  {
            margin: 10px 5px ;
            padding: 20px;
            width: 1350px;
            height: 120px;
            background-color: rgb(208, 235, 225);
            justify-content: center;
            font-size: x-large;
            text-decoration: solid;
   
        }
        a{
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
        .form{
            margin: 10px 5px ;
            padding: 20px;
            width: 1350px;
            height: 120px;

        }  
        p{
            font-size: 15px;
            line-height: 1.5;
            font-family: Nunito Sans, sans-serif;
        }
        .lname{
            font-weight: bold;
            font-size: larger;
        }
        .address{
            font-weight: bold;
            font-size: larger;
        }
        .city{
            font-weight: bold;
            font-size: larger;
        }
        .a1{
            border: 1px solid #333;
            display: block;
            margin-bottom: 8px;
            min-height: 25px;
            width: 200px; 
        }
        .a2{
            border: 1px solid #333;
            display: block;
            margin-bottom: 8px;
            min-height: 33px;
            width: 550px;
        }
        .a3{
            border: 1px solid #333;
            display: block;
            margin-bottom: 8px;
            min-height: 25px;
            width: 200px; 
        }
        .a4{
            border: 1px solid #333;
            display: block;
            margin-bottom: 8px;
            min-height: 25px;
            width: 300px; 
        }
        .a5{
            border: 1px solid #333;
            display: block;
            margin-bottom: 8px;
            height: 80px;
            width: 300px; 
        }
        .a6{
            border: 1px solid #333;
            height: 17px;
            width: 70px;  
        }
    </style>
    <style>
  .error{
    color: red;
    font-weight: 400;
    padding: 6px 0;
    font-size: 14px;        
    }
</style>
</head>
<body>
    <div class="head" id="name">

        About Us    


    </div> <br> <br> <br>
    <div class="middle">
        <div class="im" id="m1">
            <ul type="none" id="item" class="list">
                <li  id="item1" class="list1">
                    <a href="http://127.0.0.1:3000/Aboutus.html" style="text-decoration: none;">About Us</a>
                </li>
                <li  id="item2" class="list2">
                    <a href="http://127.0.0.1:3000/Aboutus1.html" style="text-decoration: none;">Who We Are</a>
                </li>
                <li  id="item3" class="list3">
                    <a href="http://localhost/wp/contactus1.php" id="a1" style="text-decoration: none;">Contact Us</a>
                </li>
                
            </ul>
        </div>
            <div class="form">
                <h4>Contact Us</h4>
                <p>Drop us a note if you have comments or questions about saving water.</p>
                <?php
                
                require_once 'datainit(2).php';

                // Function to sanitize input data
                function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
                }
                $fnameErr = $lnameErr = $addressErr = $cityErr = $zipcodeErr = $emailErr = $messageErr = "";
                $fname = $lname = $address = $city = $zipcode = $email = $message ="";




                if (isset($_POST["submit"])) 
                {
                
                $fname = test_input($_POST["fname"] ?? '');
                $lname = test_input($_POST["lname"] ?? '');
                $address = test_input($_POST["address"] ?? '');
                $city = test_input($_POST["city"] ?? '');
                $zipcode = test_input($_POST["zipcode"] ?? '');
                $email = test_input($_POST["email"] ?? '');
                $message = test_input($_POST["message"] ?? '');

                

                if (empty($fname)) {
                    $fnameErr = '<span class="error">* First Name is required </span>';
                } else {
                    $fname = trim($_POST["fname"]);
                    if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
                     $fnameErr = '<span class="error">* Only letters and white space allowed.</span>';
                    }
                }
                if (empty($lname)) 
                {
                 $lnameErr = '<span class="error">* Last Name is required </span>';
                } else {
                    $lname = trim($_POST["lname"]);
                    if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
                        $lnameErr = '<span class="error">* Only letters and white space allowed.</span>';
                    }
                }
                if (empty($address)) 
                {
                    $addressErr = '<span class="error">* Address is required </span>';
                } else {
                    $address = trim($_POST["address"]);
                }
                if (empty($city)) 
                {
                    $cityErr = '<span class="error">* Name of city is required </span>';
                } else {
                    $city = trim($_POST["city"]);
                    if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
                        $cityErr = '<span class="error">* Only letters and white space allowed.</span>';
                    }
                }
                if (empty($zipcode)) 
                {
                    $zipcodeErr = '<span class="error">* Zipcode is required </span>';
                } else if (!preg_match("/^[0-9]{5}$/", trim($_POST["zipcode"]))) {
                    $zipcodeErr = '<span class="error">* Zipcode must be a 5-digit number.</span>';
                } else {
                    $zipcode = trim($_POST["zipcode"]);
                }
                if (empty($email)) 
                {
                    $emailErr = '<span class="error">* Email is necessary </span>';
                } else {
                    // Check if the email address is valid
                    
                    $email = trim($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                     $emailErr = '<span class="error">* Invalid email format.</span>';
                    }
                    elseif (!preg_match("/@gmail\.com$/", $email)) {
                        $emailErr = "Email must be a Gmail address (ending with '@gmail.com').";
                    }
                }
                if (empty($message)) 
                {
                    $messageErr = '<span class="error">* Please write a message </span>';
                } 
                else{
                $message = trim($_POST["message"]);               
                }
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo "<p>$error</p>";
                    }
                }  
                
                else {
                    $hashedemail = password_hash($email, PASSWORD_BCRYPT);
                                       
                    $sql = "INSERT INTO cont (fname, lname, address, city, zipcode, email, message) VALUES ('$fname', '$lname', '$address', '$city', '$zipcode', '$hashedemail', '$message')";

                    if (mysqli_query($conn, $sql)) {
                        echo "Record inserted successfully";
                    } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                }
                }

            
            
           
            ?>
                
            <form action="contactus1.php" method=post>
                    <label >First Name:</label><br>
                    <input type="text"  name="fname"><br>
                    <p> <?php echo $fnameErr;?></p>
                    <label >Last Name:</label><br>
                    <input type="text"  name="lname"><br>
                    <p> <?php echo $lnameErr;?></p>
                    <label >Address:</label><br>
                    <input type="text" name="address"><br>
                    <p> <?php echo $addressErr;?></p>
                    <label >City:</label><br>
                    <input type="text"  name="city" ><br>
                    <p> <?php echo $cityErr;?></p>
                    <label >Zip Code:</label><br>
                    <input type="text"  name="zipcode"><br>
                    <p> <?php echo $zipcodeErr;?></p>
                    <label >Email:</label><br>
                    <input type="text" name="email" ><br>
                    <p> <?php echo $emailErr;?></p>
                    <label >Message:</label><br>
                    <textarea name="message"></textarea><br>
                    <p> <?php echo $messageErr;?></p>
                    <input type="checkbox" id="signup" name="signup" value="subscribe">
                    <label for="signup">Sign up for our newsletter</label><br> <br>
                    <input type="submit" name="submit">
                        
            </form> 
                    <div class="footer">
                      <footer>
                        <div class="container"> <br>
                          <p>     &copy;2023 My Website. All rights reserved.</p>
                        </div>
                      <div id="map" style="width:500px; height: 300px;"></div> <br> <br>
                      <script>
                            // Initialize the map
                          var map = L.map('map').setView([18.9902, 73.1277], 12);

                           // Add a tile layer (e.g. OpenStreetMap)
                           L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(map);

                        // Add a marker at the specified location
                        L.marker([18.9902, 73.1277]).addTo(map)
                          .bindPopup('1234, Sector 4, Panvel, Navi Mumbai, Maharashtra, India, 410206')
                          .openPopup();

                        // Add a circle around the marker with a radius of 500 meters
                        L.circle([18.9902, 73.1277], {
                          color: 'red',
                          fillColor: '#f03',
                          fillOpacity: 0.5,
                          radius: 500
                        }).addTo(map);
                      
                        // Add a popup with additional features
                        var popup = L.popup()
                        .setLatLng([18.9902, 73.1277])
                        .setContent('<b>Additional Features:</b><br>Zoom in/out<br>Pan/scroll<br>Layers<br>Measure distance/area<br>Draw shapes')
                        .openOn(map);
                          
                      </script>
                      
                      </footer>
                      </div>
            </div>
    </div>
</body>
                        
</html>