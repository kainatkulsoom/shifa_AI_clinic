<?php 
include 'includes/header.php'; 
include 'config.php';

$result_msg = "";

if(isset($_POST['book'])){
    $name = $_POST['name'];
    $disease = strtolower($_POST['disease']);
    $date = $_POST['date'];
    
    // Doctor and Image Mapping - Using your uploads folder
    $doctors = [
        "fever" => "Dr. Ayesha Khan",
        "cough" => "Dr. Ali Raza", 
        "headache" => "Dr. Sara Ahmed",
        "stomach" => "Dr. Usman Malik",
        "diabetes" => "Dr. Fatima Noor",
        "skinrash" => "Dr. Hina Tariq",
        "asthma" => "Dr. Bilal Khan",
        "backpain" => "Dr. Zainab Ali",
        "heartproblem" => "Dr. Imran Sheikh",
        "allergy" => "Dr. Maryam Iqbal",
        "denguie" => "Dr. Kamran Shah",
        "bloodpresure" => "Dr. Nida Farooq",
        "eyeproblems" => "Dr. Omer Tariq",
        "toothache" => "Dr. Sana Javed",
        "fracture" => "Dr. Waqas Ahmed"
    ];
    
    $images = [
        "fever" => "uploads/Symptoms-fever.jpg",
        "cough" => "uploads/cough.jfif", 
        "headache" => "uploads/headache.jpg",
        "stomach" => "uploads/stomach.jfif",
        "diabetes" => "uploads/Diabetes-mellitus.jpg",
        "skinrash" => "uploads/skinrash.jfif",
        "asthma" => "uploads/asthma.jfif",
        "backpain" => "uploads/backpain.jfif",
        "heartproblem" => "uploads/heartproblem.jfif",
        "allergy" => "uploads/Allergy.jfif",
        "denguie" => "uploads/denguie.jfif",
        "bloodpresure" => "uploads/bloodpresure.jpeg",
        "eyeproblems" => "uploads/eyeproblems.jfif",
        "toothache" => "uploads/toothache.jfif",
        "fracture" => "uploads/fracture.jfif"
    ];

    $doctor_name = "Dr. General Physician";
    $image_path = "uploads/fracture.jfif"; // default image

    foreach($doctors as $key => $val){
        if(strpos($disease, $key) !== false){
            $doctor_name = $val;
            $image_path = $images[$key];
            break;
        }
    }

    $sql = "INSERT INTO appointments (name, disease, doctor, appointment_date, image) VALUES ('$name','$disease','$doctor_name','$date','$image_path')";
    
    if($conn->query($sql)){
        $result_msg = "
        <div class='alert alert-success'>
            <h5>Appointment Booked Successfully!</h5>
            <p><b>Patient:</b> $name</p>
            <p><b>Disease:</b> $disease</p>
            <p><b>Recommended Doctor:</b> $doctor_name</p>
            <p><b>Date:</b> $date</p>
            <img src='$image_path' class='img-fluid rounded mt-2' style='max-height:200px;'>
        </div>";
    } else {
        $result_msg = "<div class='alert alert-danger'>Error booking appointment.</div>";
    }
}
?>

<div class="container py-5">
    <h2 class="text-center fw-bold mb-4" style="color:#03045E;">Book AI Appointment</h2>
    
    <div class="row">
        <!-- Booking Form -->
        <div class="col-md-6">
            <div class="card p-4 shadow">
                <h5 class="fw-bold mb-3">Enter Your Details</h5>
                <?php echo $result_msg; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Patient Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Describe Your Disease</label>
                        <input type="text" name="disease" class="form-control" placeholder="e.g. fever, cough, headache, asthma" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Appointment Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <button type="submit" name="book" class="btn btn-primary w-100">Book with AI</button>
                </form>
            </div>
        </div>

        <!-- AI CHATBOT -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-white fw-bold" style="background-color:#03045E;">
                    ShifaAI Chatbot 🤖
                </div>
                <div class="card-body" id="chatbox" style="height:350px; overflow-y:auto; background:#CAF0F8;">
                    <div class="alert alert-info">Bot: Hello! Type your disease like 'fever', 'asthma', 'diabetes'</div>
                </div>
                <div class="card-footer">
                    <form id="chatForm">
                        <div class="input-group">
                            <input type="text" id="userInput" class="form-control" placeholder="Type disease..." required>
                            <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Chatbot Disease Database - Using your exact uploads images
const diseaseDB = {
    "fever": {doctor: "Dr. Ayesha Khan", img: "uploads/Symptoms-fever.jpg"},
    "cough": {doctor: "Dr. Ali Raza", img: "uploads/cough.jfif"},
    "headache": {doctor: "Dr. Sara Ahmed", img: "uploads/headache.jpg"},
    "stomach": {doctor: "Dr. Usman Malik", img: "uploads/stomach.jfif"},
    "diabetes": {doctor: "Dr. Fatima Noor", img: "uploads/Diabetes-mellitus.jpg"},
    "skinrash": {doctor: "Dr. Hina Tariq", img: "uploads/skinrash.jfif"},
    "asthma": {doctor: "Dr. Bilal Khan", img: "uploads/asthma.jfif"},
    "backpain": {doctor: "Dr. Zainab Ali", img: "uploads/backpain.jfif"},
    "heartproblem": {doctor: "Dr. Imran Sheikh", img: "uploads/heartproblem.jfif"},
    "allergy": {doctor: "Dr. Maryam Iqbal", img: "uploads/Allergy.jfif"},
    "denguie": {doctor: "Dr. Kamran Shah", img: "uploads/denguie.jfif"},
    "bloodpresure": {doctor: "Dr. Nida Farooq", img: "uploads/bloodpresure.jpeg"},
    "eyeproblems": {doctor: "Dr. Omer Tariq", img: "uploads/eyeproblems.jfif"},
    "toothache": {doctor: "Dr. Sana Javed", img: "uploads/toothache.jfif"},
    "fracture": {doctor: "Dr. Waqas Ahmed", img: "uploads/fracture.jfif"}
};

document.getElementById('chatForm').addEventListener('submit', function(e){
    e.preventDefault();
    let userMsg = document.getElementById('userInput').value.toLowerCase();
    let chatbox = document.getElementById('chatbox');
    chatbox.innerHTML += `<div class="alert alert-primary text-end">You: ${userMsg}</div>`;
    
    let reply = "Bot: Sorry, I don't have info about this. Please book an appointment above.";
    for(let disease in diseaseDB){
        if(userMsg.includes(disease)){
            let data = diseaseDB[disease];
            reply = `Bot: For ${disease}, I recommend ${data.doctor} <br> <img src="${data.img}" height="80" class="mt-2 rounded">`;
            break;
        }
    }
    chatbox.innerHTML += `<div class="alert alert-info">${reply}</div>`;
    chatbox.scrollTop = chatbox.scrollHeight;
    document.getElementById('userInput').value = "";
});
</script>

<?php include 'includes/footer.php'; ?>