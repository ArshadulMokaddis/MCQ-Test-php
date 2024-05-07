<?php
// Database connection parameters
$host = "localhost";
$username = "id20936141_neww1";
$password = "Asa@@Babu12";
$database = "id20936141_neww";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the Android POST request
$exm_type = $_POST['exm_type'];
$exm_subject = $_POST['exm_subject'];
$year = $_POST['year'];
$question_text = $_POST['question_text'];
$option_a = $_POST['option_a'];
$option_b = $_POST['option_b'];
$option_c = $_POST['option_c'];
$option_d = $_POST['option_d'];
$correct_option = $_POST['correct_option'];

// Prepare and execute the SQL INSERT query
$sql = "INSERT INTO questions (exm_type, exm_subject, year, question_text, option_a, option_b, option_c, option_d, correct_option)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssssssss", $exm_type, $exm_subject, $year, $question_text, $option_a, $option_b, $option_c, $option_d, $correct_option);
    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
