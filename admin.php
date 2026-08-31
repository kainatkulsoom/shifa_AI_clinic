<?php 
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit(); }
include 'includes/header.php'; 
include 'config.php'; 
?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color:#03045E;">Admin Panel - All Appointments</h2>
        <a href="export.php" class="btn btn-success fw-bold">📥 Export to Excel</a>
    </div>
    
    <div class="card shadow p-3">
        <table class="table table-bordered table-striped">
            <thead style="background-color:#03045E; color:white;">
                <tr>
                    <th>ID</th><th>Patient</th><th>Disease</th><th>Doctor</th>
                    <th>Date</th><th>Status</th><th>Image</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $result = $conn->query("SELECT * FROM appointments ORDER BY id DESC");
            while($row = $result->fetch_assoc()){
                $status_color = ($row['status'] == 'Approved') ? 'success' : 'warning';
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['disease']."</td>
                    <td>".$row['doctor']."</td>
                    <td>".$row['appointment_date']."</td>
                    <td><span class='badge bg-$status_color'>".$row['status']."</span></td>
                    <td><img src='".$row['image']."' height='50' class='rounded'></td>
                    <td>
                        <a href='approve.php?id=".$row['id']."' class='btn btn-success btn-sm mb-1'>Approve</a>
                        <a href='delete.php?id=".$row['id']."' class='btn btn-danger btn-sm' onclick=\"return confirm('Delete karni hai?')\">Delete</a>
                    </td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'includes/footer.php'; ?>