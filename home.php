<?php
    include('db.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Home</title>
    
    <link rel="icon" href="wisbuchicon.png" type="image/">

    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        body {
            background-color: #FDEFB2;
            overflow-x: hidden;
        }
        .bg {
            max-width: 100%;
            background-size: 100%;
        }
        .hero {
            width: 100%;
            height: 100vh;          
            padding: 0, 2%;
        }
        nav {
            width: 100%;
            height: 15%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #865940;
        }
        nav .logo {
            width: 110px;
            cursor: pointer;
            margin-right: 2%;
            margin-left: 20%;
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
            color:white;
            font-weight: 600;
            font-size: 23px;
            padding: 3px;
            position: relative;
            transition: color 0.3s ease; /* Added transition for smooth effect */
            z-index: 1; /* Ensure text is above rectangle */
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
            z-index: -1; /* Ensure rectangle is behind text */
            transform: translateX(-15%) scaleX(0); /* Initially hide the rectangle */
            transform-origin: center; /* Ensure transformation starts from left */
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
        h1 {
            font-size: 80px;
            color: #865940;
            text-align: left;
            margin-top: 2%;
            margin-left: 10.5%;
            padding-top: 5%;
            font-family: impact;
        }
        h2 {
            font-size: 20px;
            color: #593724;
            margin-left: 11%;
            margin-top: 12px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: left;
            margin-bottom: 4%;
            text-align: justify;
        }
        .image {
            position: absolute;
            margin-left: 50%;
            margin-top: 15px;
            width: 520px; /* Adjust the width as needed */
            height: auto; /* Maintain aspect ratio */
        }
        .image img {
            width: 105%; /* Ensure the image takes up the full width of the container */
            height: auto; /* Maintain aspect ratio */
        }
        .btn {
            background-color: #643D33;
            color: #F7EBD2;
            border: 3px solid #593724;
            padding: 12px 25px;
            border-radius: 15px;
            cursor: pointer;
            width: 30%;
            font-size: 25px;
            text-decoration: none;
            margin-bottom: 0%;
            margin-left: 20%;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .btn:hover {
            background-color: #F7EBD2;
            color: #593724;
        }
    </style>
</head>
<body background="bglogin.png" class="bg">
    <div class="hero">
        <nav id="navbar">
            <a href="home.html"><img src="wisbuchlogo.png" class="logo"></a>
            <ul>
                <li><a href="home.html" class="active">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="books.html">Books</a></li>
                <li><a href="mylibrary.html">My Library</a></li>
            </ul>
            <div class="login-signup">
                <ul>
                    <li><a href="account.html">Account</a></li>
                </ul>
            </div>
        </nav>

        <div class="image">
            <img src="imghome.png" alt="Image">
        </div>
        <div class="content">
            <h1>Read,<br>
                Enjoy, &nbsp Learn</h1>
            <h2>Can't make it to the library? No problem! <br> 
                with WisBuch, your library is just a click <br>
                away! Access free books anytime, anywhere!</h2>
        </div>
        <div class="button">
            <a href="about.html" class="btn"><b>ABOUT</b></a> 
        </div>
    </div>
</body>
</html>