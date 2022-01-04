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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" href="ui.css">

</head>

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



    <?php


    $sql = "SELECT *, gamer_genre.genre_ID, genre.genre_name, platform.platform, game_image.game_image_url FROM gamer_table INNER JOIN gamer_genre ON gamer_table.id = gamer_genre.game_ID INNER JOIN genre ON gamer_genre.genre_ID = genre.genre_id
                INNER JOIN platform ON platform.platform_id = gamer_table.platforms INNER JOIN game_image ON game_image.game_id = gamer_table.id LIMIT 15;";


    ?>




    <div class="navbar2">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="#">All Games</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="newGames.php">New Releases</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="popular.php">Most Popular</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sale.php">On Sale</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="classics.php">Classics</a>
            </li>

            <form action="search.php" method="POST" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit-search">Search</button>
            </form>
        </ul>


    </div>


    <div class="container">



        <div class="row">

            <div class="col-12" id="maincol">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="racing-game-7.jpg" width="500" height="500" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="counterstrike.jpg" width="500" height="500" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="tf2.jpg" width="500" height="500" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-9">
                <h1>Game Zone</h1>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Trending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Puzzle Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">What's being played</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="multi-tab" data-toggle="tab" href="#multi" role="tab" aria-controls="multi" aria-selected="false">Multiplayer</a>
                    </li>
                </ul>


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Developer</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Platforms</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($conn, $sql);
                                $queryResult = mysqli_num_rows($result);



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
                                        echo "<td>$genre</td>";
                                        echo "<td>$platforms</td>";
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


                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Developer</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Platforms</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $sql2 = "SELECT *, gamer_genre.genre_ID, genre.genre_name, platform.platform, game_image.game_image_url FROM gamer_table INNER JOIN gamer_genre ON gamer_table.id = gamer_genre.game_ID INNER JOIN genre ON gamer_genre.genre_ID = genre.genre_id
                INNER JOIN platform ON platform.platform_id = gamer_table.platforms INNER JOIN 
                game_image ON game_image.game_id = gamer_table.id WHERE gamer_table.tags LIKE '%puzzle%' LIMIT 15;";

                                $result = mysqli_query($conn, $sql2);
                                $queryResult = mysqli_num_rows($result);



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
                                        echo "<td>$genre</td>";
                                        echo "<td>$platforms</td>";
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
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Developer</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Platforms</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $sql2 = "SELECT *, gamer_genre.genre_ID, genre.genre_name, platform.platform, game_image.game_image_url FROM gamer_table INNER JOIN gamer_genre ON gamer_table.id = gamer_genre.game_ID INNER JOIN genre ON gamer_genre.genre_ID = genre.genre_id
                INNER JOIN platform ON platform.platform_id = gamer_table.platforms INNER JOIN game_image ON game_image.game_id = gamer_table.id WHERE gamer_table.id > '42' AND gamer_table.id < '60' LIMIT 15;";

                                $result = mysqli_query($conn, $sql2);
                                $queryResult = mysqli_num_rows($result);



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
                                        echo "<td>$genre</td>";
                                        echo "<td>$platforms</td>";
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
                    <div class="tab-pane fade" id="multi" role="tabpanel" aria-labelledby="multi-tab">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Developer</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Platforms</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $sql2 = "SELECT *, gamer_genre.genre_ID, genre.genre_name, platform.platform, game_image.game_image_url FROM gamer_table INNER JOIN gamer_genre ON gamer_table.id = gamer_genre.game_ID INNER JOIN genre ON gamer_genre.genre_ID = genre.genre_id
                INNER JOIN platform ON platform.platform_id = gamer_table.platforms INNER JOIN game_image ON game_image.game_id = gamer_table.id WHERE gamer_table.platforms = '1' AND gamer_table.age_rating > '0' AND gamer_table.id > '1409' LIMIT 15;";

                                $result = mysqli_query($conn, $sql2);
                                $queryResult = mysqli_num_rows($result);



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
                                        echo "<td>$genre</td>";
                                        echo "<td>$platforms</td>";
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
            </div>

            <div class="col" id="sidereel">
                <h1>Alien News Zone</h1>

                <div class="card" style="width: 15rem;">
                    <img class="card-img-top" src="venom-deck-1-1620653154034.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Gaming News</h5>
                        <p class="card-text">There are a lot of things that could be in the Venom game, if it does come out. The biggest thing that could be in the game would be a moral system.
                            That gives you the choice of what to do in the game rather than the option to be a hero or a villain and resemble the Web of Shadows game.
                            If this Venom game does come to be true. Let’s all hope they focus on the Anti-Hero character. Let’s bite some heads off as Venom in 2021!</p>
                    </div>

                </div>

                <div class="card" id="card2" style="width: 15rem;">
                    <img class="card-img-top" src="Half-Life_2_Steam_library_cover.jpg" height="250" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Daily Offer</h5>
                        <p class="card-text">Click on the link to find out what Today's special is. And don't forget to add your favourites to the Favourite section</p>
                        <a href="dailyoffer.php" class="btn btn-primary">Go to offer</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <!-- Footer -->
    <footer class="page-footer font-small unique-color-dark">

        <!-- Footer Elements -->
        <div class="container">

            <!-- Call to action -->
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h5 class="mb-1">Register for free</h5>
                </li>
                <li class="list-inline-item">
                    <a href="login.php" class="btn btn-outline-white btn-rounded">Sign up!</a>
                </li>
            </ul>
            <!-- Call to action -->

        </div>
        <!-- Footer Elements -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href="indexExp2.php"> F.Crickard - 40133374</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>

</html>