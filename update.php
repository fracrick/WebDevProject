<?php


session_start();
include("conn.php");



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
            <li class="breadcrumb-item"><a href="indexExp2.php">Home</a></li>

            <li class="breadcrumb-item active" aria-current="page">Admin</li>
        </ol>
    </nav>
    <div class="container" id="logins">





        <div class="row">
            <div class="col-sm-8">
                <?php
                $name = mysqli_real_escape_string($conn, $_GET['name']);
                ?>


                <h2>Edit game info</h2>
                <h2>Game: $name</h2>
                <p>
                <form action="processupdate.php" method="POST">

                    <input type="text" name="game_name" placeholder="Game title">
                    <input type="text" name="description" placeholder="Description">
                    <input type="date" name="date" placeholder="Date of release">
                    <input type="text" name="developer" placeholder="Developer name">
                    <input type="number" name="platforms" placeholder="Platforms 1-4">
                    <input type="number" name="age" placeholder="Age rating">
                    <input type="text" name="tags" placeholder="Game tags">
                    <input type="number" name="achievements" placeholder="Number of achievements">
                    <input type="number" name="positive" placeholder="Positive reviews number">
                    <input type="number" name="negative" placeholder="Negative reviews number">
                    <input type="number" name="avg" placeholder="Average playtime in hours">
                    <input type="number" name="price" placeholder="Price in GBP(decimal)">



                    <button type="Submit" name="submit-update" class=" btn btn-success d-line-block">Make changes</button>


                </form>






            </div>

        </div>







    </div>









    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>

</html>