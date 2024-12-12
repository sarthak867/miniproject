<?php
// Database connection
$servername = "localhost:3307"; // Default localhost
$username = "root";        // Default MySQL username
$password = "";            // Default MySQL password
$dbname = "login-lostsync"; // Database name

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['name'];
    $college_id = $_POST['Collegeid'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone'];
    $password = $_POST['Password'];
    $confirm_password = $_POST['confirm-Password'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into the database
        $sql = "INSERT INTO login_register (full_name, college_id, email, phone_no, password, gender) 
                VALUES ('$full_name', '$college_id', '$email', '$phone_no', '$hashed_password', '$gender')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the connection
$conn->close();
?>