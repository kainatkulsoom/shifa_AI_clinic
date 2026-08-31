<?php 
include 'includes/header.php'; 
include 'config.php';

$msg = "";
if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (name, email, message) VALUES ('$name','$email','$message')";
    
    if($conn->query($sql)){
        $msg = "<div class='alert alert-success'>Thank you! Your message has been sent.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Error. Try again.</div>";
    }
}
?>

<div class="container py-5">
    <h2 class="text-center fw-bold mb-4" style="color:#03045E;">Contact Us</h2>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <?php echo $msg; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Your Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Your Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Message</label>
                        <textarea name="message" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" name="send" class="btn btn-primary w-100">Send Message</button>
                </form>
            </div>

            <div class="card p-4 mt-4 text-center">
                <h5 class="fw-bold" style="color:#0077B6;">ShifaAI Clinic</h5>
                <p>Peshawar, Khyber Pakhtunkhwa, Pakistan</p>
                <p>Email: info@shifaai.com | Phone: +92 300 1234567</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>