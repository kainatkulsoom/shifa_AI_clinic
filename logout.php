<?php
session_start(); // session start karo
session_destroy(); // saari session khatam kar do
header("Location: index.php"); // wapas home page pe bhej do
exit();
?>