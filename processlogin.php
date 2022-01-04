<?php



include("conn.php");

if (isset($_POST['submit-login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND password = '$password';";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if ($queryResult == 1) {

        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['permission'] = $row['permission'];
        $permission = $row['permission'];

        header('Location: indexExp2.php');
    } else {

        header('Location: login.php');
    }
} else {
    header('Location: login.php'); // Redirecting To login
}
