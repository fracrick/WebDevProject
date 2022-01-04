<?php
$passw = "21vPNwR4SRQJkPXk";

$username = "fcrickard01";

$db = "fcrickard01";

$host = "fcrickard01.lampt.eeecs.qub.ac.uk";

$conn = new mysqli($host, $username, $passw, $db);

if ($conn->error) {
    echo "not connected" . $conn->error;
}
