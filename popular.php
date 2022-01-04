<?php

include("conn.php");
session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="ui.css">

</head>

<?php


?>

<body>



    <!-- NAVBAR -->

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
                    <a class="nav-link" href="indexExp2.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dailyoffer.php">News</a>
                </li>

                <?php

                if (isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='showfavourites.php'>Favourites</a>
                    </li>";

                    if ($_SESSION['permission'] == 2)
                        echo "<li class='nav-item'>
                    <a class='nav-link' href='admin.php'>Admin</a>
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

    <div class="container" id="searchcontainer">
        <div class="row justify-content-md-center">

            <div class="col-12-md-auto">
                <table class="table">

                    <thead class="thead-dark">


                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Title</th>
                            <th scope="col">Developer</th>
                            <th scope="col">Released</th>
                            <th scope="col">Platforms</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Reviews ratio</th>
                            <th scope="col">Average Playtime</th>
                            <th scope="col">Price</th>


                        </tr>
                    </thead>


                    <tbody>

                        <?php



                        $sql = "SELECT *, gamer_genre.genre_ID, genre.genre_name, platform.platform, game_image.game_image_url FROM gamer_table INNER JOIN gamer_genre ON gamer_table.id = gamer_genre.game_ID INNER JOIN genre ON gamer_genre.genre_ID = genre.genre_id
                INNER JOIN platform ON platform.platform_id = gamer_table.platforms INNER JOIN game_image ON game_image.game_id = gamer_table.id WHERE gamer_table.positive_ratings > '8000';";
                        $result = mysqli_query($conn, $sql);
                        $queryResult = mysqli_num_rows($result);

                        echo "There are " . $queryResult . " results";

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


                                echo "<tr>";
                                echo "<th scope='row'><img src='$media' width='150' height='60' class='d-inline-block'></th>";
                                echo "<td><a href='game.php?name=" . $name . "'>$name</a></td>";
                                echo "<td>$developer</td>";
                                echo "<td>$date</td>";
                                echo "<td>$platforms</td>";
                                echo "<td>$genre</td>";
                                echo "<td>$tags</td>";
                                echo "<td>$ratio</td>";
                                echo "<td>$avg</td>";
                                echo "<td>£$price</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No results found.";
                        }


                        ?>





                    </tbody>
                </table>


            </div>

        </div>









        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>

</html>