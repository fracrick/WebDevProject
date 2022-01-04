<?php
include("conn.php");

if (isset($_POST['submit-logout'])) {

    session_start();
    session_unset();
    session_destroy();

    header('Location: indexExp2.php');
    exit();
};
