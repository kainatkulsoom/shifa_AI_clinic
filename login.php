<?php 
session_start();
include 'config.php';

$error = "";
if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Simple login. Username: admin  Password: 1234
    if($user == "admin" && $pass == "1234"){
        $_SESSION['admin'] = "admin";
        header("Location: admin.php");
    } else {
        $error = "Invalid Username or Password!";
    }
}
include 'includes/header.php'; 
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4 shadow">
                <h3 class="text-center fw-bold mb-4" style="color:#03045E;">Admin Login</h3>
                <?php if($error) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="admin" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="1234" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                </form>
                <p class="text-center mt-3 text-muted">Demo: admin / 1234</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>