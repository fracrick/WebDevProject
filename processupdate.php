<?php



include("conn.php");

if (isset($_POST['submit-update'])) {

    $name = $_POST['game_name'];
    $desc = $_POST['description'];
    $date = $_POST['date'];
    $developer = $_POST['developer'];
    $platform = $_POST['platforms'];
    $age = $_POST['age'];
    $tags = $_POST['tags'];
    $achieve = $_POST['achievements'];
    $positive = $_POST['positive'];
    $negative = $_POST['negative'];
    $avg = $_POST['avg'];
    $price = $_POST['price'];
    $favourite = 0;


    $newDate = date("Y-m-d", strtotime($date));

    $orgname = mysqli_real_escape_string($conn, $_GET['name']);

    $sql = "UPDATE `gamer_table` SET `name`= '$name', `$desc`= 'test',
    `release_date`= '$newDate',`developer`= '$developer',`platforms`= '$platform',`age_rating`= '$age',`tags`= '$tags',`achievements`='$achieve',
    `positive_ratings`= '$positive',`negative_ratings`='$negative',`avg_playtime`= '$avg',`price`='15',`favourite`= '$favourite' WHERE gamer_table.name = '$orgname';";

    $result = mysqli_query($conn, $sql);



    header('Location: indexExp2.php'); // Redirecting To login

} else {
    header('Location: login.php'); // Redirecting To login
}
