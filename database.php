<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "space";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
    $group_id = isset($_POST['groupid']) ? (int)$_POST['groupid'] : 0;
    $mission_name = isset($_POST['missionname']) ? $conn->real_escape_string($_POST['missionname']) : '';
    $rover_name = isset($_POST['rovername']) ? $conn->real_escape_string($_POST['rovername']) : '';
    $captain_name = isset($_POST['captainname']) ? $conn->real_escape_string($_POST['captainname']) : '';
    $message = isset($_POST['message']) ? $conn->real_escape_string($_POST['message']) : '';

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO missions (name, email, group_id, mission_name, rover_name, captain_name, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissss", $name, $email, $group_id, $mission_name, $rover_name, $captain_name, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
}

$conn->close();
?>

