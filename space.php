<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "space";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['Mmail'];
$group_id = $_POST['groupid'];
$mission_name = $_POST['missionname'];
$rover_name = $_POST['rovername'];
$captain_name = $_POST['captainname'];
$message = $_POST['textarea'];

$sql = "INSERT INTO missions (name, email, group_id, mission_name, rover_name, captain_name, message)
VALUES ('$name', '$email', '$group_id', '$mission_name', '$rover_name', '$captain_name', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
