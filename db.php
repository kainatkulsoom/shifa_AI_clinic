<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shifa_clinic"; // yahan apne database ka naam likho

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>