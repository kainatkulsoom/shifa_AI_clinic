<?php 
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit(); }
include 'includes/header.php'; 
include 'config.php'; 

// ADD NEW SERVICE
if(isset($_POST['add'])){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $conn->query("INSERT INTO services(title, description) VALUES('$title','$desc')");
    header("Location: services.php");
}

// DELETE SERVICE
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $conn->query("DELETE FROM services WHERE id=$id");
    header("Location: services.php");
}
?>

<div class="container py-5">
    <h2 class="text-center fw-bold mb-4" style="color:#03045E;">Our Services - Admin Panel</h2>

    <div class="card shadow p-4 mb-4">
        <h4>Add New Service</h4>
        <form method="POST">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <input type="text" name="title" class="form-control" placeholder="Service Title" required>
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" name="description" class="form-control" placeholder="Service Description" required>
                </div>
                <div class="col-md-2 mb-2">
                    <button name="add" class="btn btn-primary w-100 fw-bold">Add</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card shadow p-4">
        <h4>All Services</h4>
        <table class="table table-bordered table-striped">
            <thead style="background-color:#03045E; color:white;">
                <tr><th>ID</th><th>Title</th><th>Description</th><th>Action</th></tr>
            </thead>
            <tbody>
            <?php 
            $result = $conn->query("SELECT * FROM services ORDER BY id DESC");
            while($row = $result->fetch_assoc()){
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['title']."</td>
                    <td>".$row['description']."</td>
                    <td><a href='services.php?del=".$row['id']."' class='btn btn-danger btn-sm' onclick=\"return confirm('Delete this service?')\">Delete</a></td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'includes/footer.php'; ?>