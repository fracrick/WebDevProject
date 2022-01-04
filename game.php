<?php


include("conn.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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
                <?php

                if (isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='showfavourites.php'>Favourites</a>
                    </li>";
                }

                ?>


            </ul>
            <?php
            if (isset($_SESSION['username'])) {
                echo
                "<form action='logout.php' method='POST'>

                <button type='Submit' name='submit-logout' class=' btn btn-success d-line-block'>Log out</button>
            </form>";
            } else {
                echo "
                <form action='login.php' method='POST'>

                <button type='Submit' name='submit-login' class=' btn btn-success d-line-block'>Log in</button>
            </form>";
            }

            ?>
        </div>
    </nav>


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Games</a></li>
            <li class="breadcrumb-item active" aria-current="page">Results</li>
        </ol>
    </nav>






    <?php

    $name = mysqli_real_escape_string($conn, $_GET['name']);

    $sql = "SELECT *, gamer_genre.genre_ID, genre.genre_name, platform.platform, game_image.game_image_url FROM gamer_table INNER JOIN gamer_genre ON gamer_table.id = gamer_genre.game_ID INNER JOIN genre ON gamer_genre.genre_ID = genre.genre_id
                INNER JOIN platform ON platform.platform_id = gamer_table.platforms INNER JOIN game_image ON game_image.game_id = gamer_table.id WHERE name = '$name';";


    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    // echo "There are " . $queryResult . " results";

    if ($queryResult > 0) {

        while ($row = mysqli_fetch_assoc($result)) {



            $name = $row['name'];
            $desc = $row['description'];
            $date = $row['release_date'];
            $developer = $row['developer'];
            $platforms = $row['platform'];
            $age = $row['age_rating'];
            $tags = $row['tags'];
            $achievements = $row['achievements'];
            $positive = $row['positive_ratings'];
            $negative = $row['negative_ratings'];
            $avg = $row['avg_playtime'];
            $price = $row['price'];
            $genre = $row['genre_name'];
            $media = $row['game_image_url'];
            $ratio = $positive - $negative;
            $fav = $row['favourite'];
        }
    } else {
        echo "No results found.";
    }



    ?>







    <div class="container" id="gamecontain">

        <div class="container" id="gamecontainer">
            <div class="row">
                <div class="col">
                    <h1 class="display-4">
                        <p class="font-weight-bold"><?php echo "$name" ?></p>
                    </h1>
                </div>
                <div class="col">
                    <?php
                    echo "<img src='$media' width='400' height='150'>";
                    ?>

                </div>
                <div class="w-100"></div>
                <div class="col">
                    <p> </p>

                    <p class="h5">Developer:</p>
                    <p><?php echo "$developer" ?></p>
                    <p class="h5">Release date:</p>
                    <p><?php echo "$date" ?></p>
                    <p class="h5">Platforms:</p>
                    <p><?php echo "$platforms" ?></p>
                    <p class="h5">Age rating:</p>
                    <p><?php echo "$age" ?></p>
                    <p class="h5">Genres:</p>
                    <p><?php echo "$genre" ?></p>
                    <p class="h5">Tags:</p>
                    <p><?php echo "$tags" ?></p>



                    <?php
                    if (isset($_SESSION['username'])) {
                        echo
                        "<form action='favourite.php?name=" . $name . "' method='POST'>

                        <button type='Submit' name='submit-favourite' class=' btn btn-success'>Favourite</button>
                    </form>";
                    }
                    ?>





                </div>
                <div class="col">
                    <p> </p>
                    <p class="h5">Description:

                    <p><?php echo "$desc" ?></p>
                    </p>
                    <p class="h5">In-game achievements:</p>
                    <p><?php echo "$achievements" ?></p>
                    <p class="h5">Reviews ratio:</p>
                    <p><?php echo "$ratio" ?></p>
                    <p class="h5">Average playtime (hours):</p>
                    <p><?php echo "$avg" ?></p>
                    <p class="h5">Price:</p>
                    <p><?php echo "£$price" ?></p>

                    <p></p>

                    <?php
                    if (isset($_SESSION['username'])) {
                        echo
                        "<form action='update.php?name=" . $name . "' method='POST'>

                        <button type='Submit' name='submit-update' class=' btn btn-warning'>Edit</button>
                    </form>";
                    }
                    ?>





                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>