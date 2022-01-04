<?php


session_start();
include("conn.php")

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="ui.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <!-- Image and text -->
        <nav class=" navbar">
            <a class="navbar-brand">
                <img src="alien.jpg" width="50" height="50" class="d-inline-block " alt="">
                Alien Gaming
            </a>
        </nav>
        <button class="navbar-toggler" id="navbarbutton" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" id="nav1">
                <li class="nav-item active">
                    <a class="nav-link" href="indexExp2.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>



            </ul>

        </div>
    </nav>


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
    <div class="container" id="logins">






        <h2>Sign in</h2>
        <p>
        <form action="processlogin.php" method="POST">

            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="Submit" name="submit-login" class=" btn btn-success d-line-block">Log in</button>


        </form>

        </p>


        <h2>New user? Register here</h2>

        <form action="register.php" method="POST">

            <input type="text" name="newusername" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="newpassword" placeholder="Password">
            <button type="Submit" name="submit-register" class=" btn btn-success d-line-block">Register New User</button>


        </form>







    </div>









    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>

</html>