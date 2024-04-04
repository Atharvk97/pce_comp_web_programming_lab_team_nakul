<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Water Footprint Calculator</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            background-image: linear-gradient(120deg, #e0fdfd 0%, #cdf3e1 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 800px;
            padding: 40px;
            text-align: center;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        iframe {
            border-radius: 20px;
            width: 100%;
            height: 400px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 42px;
            color: #008080;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 24px;
            text-decoration: none;
            color: #fff;
            background-color: #008080;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #005555;
        }

        .login,
        .register {
            font-size: 24px;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #008080;
            background-color: #e0f2f1;
            transition: background-color 0.3s;
        }

        .login:hover,
        .register:hover {
            background-color: #b2dfdb;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Water Footprint Calculator</h1>
        <iframe width="752" height="423" src="https://www.youtube.com/embed/48g7ATzuBIQ" title="What is a Water Footprint?" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <h2>Learn about water footprint & calculate your daily water usage</h2>
        <a href="http://localhost/finalproject/login.php" class="btn">LOGIN to use our calculator</a>
        <a href="http://localhost/finalproject/registration.php" class="register">New user? Register here</a>
    </div>
</body>

</html>
