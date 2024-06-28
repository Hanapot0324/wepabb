<?php
session_start();

include("db.php"); // Ensure this file path is correct

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password))
    {
        // Escape variables to protect against SQL injection
        $user_name = mysqli_real_escape_string($con, $user_name);
        $password = mysqli_real_escape_string($con, $password);

        // Query to check user credentials
        $query = "SELECT * FROM form WHERE username = '$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);

            if($user_data['password'] == $password)
            {
                // Password matches, redirect to home.php
                header("location: home.php");
                exit; // Always use exit/die after header redirect
            }
        }

        // If username/password doesn't match
        echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
    }
    else
    {
        // If fields are empty
        echo "<script type='text/javascript'> alert('Please enter valid information')</script>";
    }
}
?>






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log in</title>
        <link rel="icon" href="wisbuchicon.png" type="image/">
        
        <style>
   * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        body{
            background-color: #FDEFB2;
            overflow-x: hidden;
        }
        .bg{
            max-width: 100%;
            background-size: 100%;
        }
        .hero{
            width: 100%;
            height: 100%;          
            padding: 0, 2%;
        }

        nav{
            width: 100%;
            height: 15%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #865940;
            position: absolute;
            margin-bottom: 0;
            margin-top: 0%;
            
        }
        nav .logo{
            width: 110px;
            cursor: pointer;
            margin-right: 2%;
            margin-left: 2%;
            margin-top: 2%;
            margin-bottom: 2%;
            align-items: center;
        }
        nav ul{
            flex: 1;
            text-align: center;
            margin-left: 130px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        nav ul li{
            list-style: none;
            display: inline-flex;
            margin: 10px 12px;
            margin-bottom: 0%;
            margin-right: 0%;
            position: relative;
        }
        nav ul li a{
            text-decoration: none;
            color: white;
            font-weight: 600;
            font-size: 24px;
            padding: 3px;
            position: relative;
            transition: color 0.3s ease;
            z-index: 1;
        }
        nav ul li a::after {
            content: '';
            position: absolute;
            left: 45%;
            bottom: -33px;
            width: 100%;
            height: 5px;
            background: #FDEFB2;
            transition: width 0.3s ease, left 0.3s ease;
            z-index: -1;
            transform: translateX(-15%) scaleX(0);
            transform-origin: center;
            border-radius: 10%;
        }
        nav ul li a:hover::after,
        nav ul li a.active::after {
            width: 130%;
            height: 260%;
            left: -0.25%;
            transform: translateX(-13%) scaleX(0.9);
        }
        nav ul li a:hover,
        nav ul li a.active {
            color: #5f3e2a;
        }
        .login-signup {
            margin-left: 2%;
            margin-right: 2%;
        }


        .wrapper {
            float: left;
            width: 25%; /* Adjust width as needed */
            margin-left: 5%; /* Adjust margin as needed */ 
            margin-bottom: -60%;
            margin-top: 7%;
        }

        .container {
            float: right;
            width: 60%; /* Adjust width as needed */
            margin-right: 2%; /* Adjust margin as needed */
            padding: 20px;
            margin-left: 48%;
            margin-top: 6%;
            input[type="text"]::placeholder,
            input[type="password"]::placeholder {
                color: #FDEFB2; /* Change the color here */
            }
            }
        h1{
            color: #5f3e2a;
            text-align: right;
            margin-top: 10%;
            margin-bottom: 5%;
            margin-right: 10%;
            font-size: 45px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        input[type="text"],
        input[type="password"] {
            width: 60%;
            height: 60px;
            padding: 10px;
            margin-bottom: 15px;
            margin-top: 2.5%;
            margin-left: 20%;
            color: white; /* Change the color here */
            border: 1px solid #5f3e2a;
            background-color: #5f3e2a;
            border-radius: 30px;
            box-sizing: border-box;
            font-size: 20px;
            font-weight: bold;
        }


        input[type="submit"] {
            height: 60px;
            background-color: #5f3e2a;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 30px;
            cursor: pointer;
            width: 30%;
            font-size: 25px;
            margin-left: 36%;
            font-weight: bold;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        input[type="submit"]:hover {
            color: #5f3e2a;
            background-color: #E1A06C;
            border: 2px solid #5f3e2a;
        }

        h2{
            color: white;
            text-align: left;
            margin-top: 50%;
            margin-bottom: 2%;
            margin-left: 2%;
            font-size: 50px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        p{
            color: white;
            text-align: left;
            margin-bottom: 15%;
            margin-left: 15%;
            font-size: 20px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
        }
        .btn{
            height: 60px;
            background-color: #E1A06C;
            color: #5f3e2a;
            border: none;
            padding: 12px 20px;
            border-radius: 30px;
            cursor: pointer;
            width: 50%;
            font-size: 25px;
            margin-left: 25%;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-decoration: none;
        }
        .btn:hover {
        background-color: #5f3e2a; /* Change background color on hover */
        color: white; /* Change text color on hover */
        border: 2px solid #E1A06C;
        }
        
        </style>
    </head>
    
    <body background="bglogin_.png" class="bg">
        <div class="hero">
            <nav id="navbar">
                <img src="wisbuchlogo.png" class="logo">
                <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Books</a></li>
                <li><a href="">My Library</a></li>
                </ul>
                <div class="login-signup">
                    <ul>
                        <li><a href="login.php" class="active">Log in</a></li>
                        <li><a href="signup.php">Sign Up</a></li>
                    </ul>
                </div>
            </nav>

            <div class="wrapper">
                <div class="signup">
                    <h2>NEW HERE?</h2>
                    <p>&nbsp;&nbsp;Sign up and read a great<br> books!</p>
                    <div class="button">
                        <a href="signup.html" class="btn"><b>Sign Up</b></a> 
                    </div>
                </div>
            </div>
            <div class="container">
                <h1>LOG IN TO YOUR ACCOUNT</h1>
                <form method="POST">
                    <input type="text" name="user name" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Log in">
                </form>
            </div>
