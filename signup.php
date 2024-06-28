<?php
session_start();

include("db.php"); // Make sure db.php contains your database connection code

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];

    // Check if email and password are not empty and email is not numeric
    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
        // Escape variables to protect against SQL injection
        $user_name = mysqli_real_escape_string($con, $user_name);
        $email = mysqli_real_escape_string($con, $email);
        $contact = mysqli_real_escape_string($con, $contact);
        $password = mysqli_real_escape_string($con, $password);

        // Construct SQL query with correct quoting for email field
        $query = "INSERT INTO form (username, email, cnum, password) VALUES ('$user_name', '$email', '$contact', '$password')";

        // Execute query
        if(mysqli_query($con, $query))
        {
            echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('Error: " . mysqli_error($con) . "')</script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'> alert('Please Enter some Valid Information')</script>";
    }
}

?>






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
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
            margin-top: -7.5%;
            
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
                width: 125%;
                height: 260%;
                left: -0.25%;
                transform: translateX(-9%) scaleX(0.9);
            }
            nav ul li a:hover,
            nav ul li a.active {
                color: #5f3e2a;
            }
        .login-signup {
        margin-left: 2%;
        margin-right: 2%;
        }
h3{
    color: #5f3e2a;
    margin-left: 41%;
    margin-top: 7.5%;
    font-size: 30px;
    font-family: impact;
}
.container {
            width: 80%;
            max-width: 600px;
            margin: 13px auto;
            padding: 5px;

input[type="text"]::placeholder,
input[type="email"]::placeholder,
input[type="password"]::placeholder {
    color: #FDEFB2; /* Change the color here */
}
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    height: 62px;
    padding: 10px;
    margin-bottom: 15px;
    color: #FDEFB2; /* Change the color here */
    border: 1px solid #5f3e2a;
    background-color: #5f3e2a;
    border-radius: 30px;
    box-sizing: border-box;
    font-size: 18px;
    font-weight: bold;
}


        input[type="submit"] {
            height: 45px;
            background-color: #865940;
            color: #FDEFB2;
            border: none;
            padding: 9px 22px;
            border-radius: 30px;
            cursor: pointer;
            width: 30%;
            margin-left: 34%;
            font-size: 25px;
            font-weight: bold;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        input[type="submit"]:hover {
            color: #5f3e2a;
            background-color: #FDEFB2;
            border: 2px solid #5f3e2a;
        }
        #passwordMatchError {
            display: none;
            color: #5f3e2a;
            text-align: center; 
            font-size: 150%;
            margin-top: 10px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bold;
        }

</style>
    </head>
    
    <body background="bgsignup.png" class="bg">
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
                        <li><a href="login.html">Log in</a></li>
                        <li><a href="signup.html" class="active">Sign Up</a></li>
                    </ul>
                </div>
            </nav>
    </body>

    <div class="content">
        <h3>Create an Account</h3>
    </div>

    <div class="container">
        <form method="POST">
            <input type="text" name="user_name" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="contact" placeholder="Contact Number" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            <input type="submit" value="Sign Up">
        </form>
        <p id="passwordMatchError" style="display: none; color: #405B35;">Passwords do not match!</p>
    </div>

    <script>

        

        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            if (password !== confirmPassword) {
                document.getElementById("passwordMatchError").style.display = "block";
                return false;
            } else {
                document.getElementById("passwordMatchError").style.display = "none";
                return true;
            }
        }
    </script>

    

    
</html>

