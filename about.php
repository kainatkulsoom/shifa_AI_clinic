<?php include 'includes/header.php'; ?>

<style>
    .about-hero {
        background: linear-gradient(135deg, #03045E 0%, #0077B6 100%);
        color: white;
        padding: 60px 20px;
        border-radius: 20px;
        text-align: center;
        margin-bottom: 40px;
    }
    .feature-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s;
        height: 100%;
    }
    .feature-card:hover {
        transform: translateY(-10px);
    }
    .feature-icon {
        font-size: 40px;
        margin-bottom: 15px;
    }
</style>

<div class="container py-5">
    <div class="about-hero">
        <h1 class="fw-bold display-5">About ShifaAI Clinic</h1>
        <p class="lead">Your Health, Powered by Artificial Intelligence</p>
    </div>

    <div class="row mb-5">
        <div class="col-md-8 mx-auto text-center">
            <h3 class="fw-bold" style="color:#03045E;">Our Mission</h3>
            <p class="fs-5 text-muted">
                ShifaAI is a Final Year Project. Our goal is to use AI to suggest doctors and 
                treatment images instantly based on patient disease. This reduces waiting time 
                and helps patients get faster guidance and better care.
            </p>
        </div>
    </div>

    <h3 class="text-center fw-bold mb-4" style="color:#03045E;">Key Features</h3>
    <div class="row g-4">
        <div class="col-md-3 col-6">
            <div class="feature-card">
                <div class="feature-icon">🤖</div>
                <h5 class="fw-bold">AI Diagnosis</h5>
                <p class="text-muted">Instant disease analysis with AI</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="feature-card">
                <div class="feature-icon">👨‍⚕️</div>
                <h5 class="fw-bold">Doctor Recommendation</h5>
                <p class="text-muted">Best doctor for your disease</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="feature-card">
                <div class="feature-icon">📅</div>
                <h5 class="fw-bold">Easy Booking</h5>
                <p class="text-muted">Book appointment in 2 minutes</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h5 class="fw-bold">Admin Panel</h5>
                <p class="text-muted">Approve, Delete & Export Data</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>