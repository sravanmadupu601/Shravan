<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dataphi";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$other = $_POST['other'];
$sql = "INSERT INTO  patientinfo(fname,lname,age,dob,gender,mobile,other) VALUES ('$fname','$lname','$age','$dob','$gender','$mobile','$other')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	return true;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	return false;
}

$conn->close();
?> 