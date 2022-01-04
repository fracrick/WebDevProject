<?php



include("conn.php");

if (isset($_POST['submit-register'])) {

    $username = $_POST['newusername'];
    $email = $_POST['email'];
    $password = $_POST['newpassword'];

    //  $sql = "INSERT INTO `users`(`username`, `user_email`, `password`,`permission`) VALUES ('$username','$email', AES_ENCRYPT('key','$password'),'1');";
    $sql = "INSERT INTO `users`(`username`, `user_email`, `password`,`permission`) VALUES ('$username','$email', '$password', '1');";

    $result = mysqli_query($conn, $sql);
    header('Location: indexExp2.php');
} else {
    header('Location: login.php'); // Redirecting To login
}
