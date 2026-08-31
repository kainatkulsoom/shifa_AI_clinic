<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); }

include 'config.php';

// Set Headers to download file
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=ShifaAI_Appointments_' . date('Y-m-d') . '.csv');

// Create output stream
$output = fopen('php://output', 'w');

// Add CSV Column Names
fputcsv($output, array('ID', 'Patient Name', 'Disease', 'Doctor', 'Appointment Date', 'Image Path'));

// Fetch data from DB
$result = $conn->query("SELECT * FROM appointments ORDER BY id DESC");

while($row = $result->fetch_assoc()){
    fputcsv($output, array(
        $row['id'],
        $row['name'],
        $row['disease'],
        $row['doctor'],
        $row['appointment_date'],
        $row['image']
    ));
}

fclose($output);
exit();
?>