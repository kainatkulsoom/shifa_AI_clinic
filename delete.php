<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); }
include 'config.php';

$id = $_GET['id'];
$conn->query("DELETE FROM appointments WHERE id=$id");

header("Location: admin.php");
exit();
?>