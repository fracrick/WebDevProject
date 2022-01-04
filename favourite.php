<?php


include("conn.php");

session_start();



if (isset($_POST['submit-favourite'])) {


    $name = mysqli_real_escape_string($conn, $_GET['name']);
    $sql = "UPDATE `gamer_table` SET `favourite`='1' WHERE name = '$name';";
    $result = mysqli_query($conn, $sql);
}
header('Location: indexExp2.php'); // Redirecting To Home Page
