<?php



include("conn.php");

if (isset($_POST['submit-add'])) {

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



    $sql = "INSERT INTO `gamer_table`( `name`, `description`, `release_date`, `developer`, `platforms`, `age_rating`,
     `tags`, `achievements`, `positive_ratings`, `negative_ratings`, `avg_playtime`, `price`, `favourite`) VALUES ('$name', '$desc', '$newDate', '$developer',
      '$platform','$age','$tags','$achieve','$positive','$negative', '$avg', '$price', '$favourite');";

    $result = mysqli_query($conn, $sql);



    header('Location: indexExp2.php'); // Redirecting To login

} else {
    header('Location: login.php'); // Redirecting To login
}
