<?php
// Database connection parameters
$servername = "localhost";
$username = "id20936141_neww1";
$password = "Asa@@Babu12";
$database = "id20936141_neww";

// Get the selected "exm_type" and "exm_subject" from the query string
$selectedExmType = isset($_GET['exm_type']) ? $_GET['exm_type'] : null;
$selectedExmSubject = isset($_GET['exm_subject']) ? $_GET['exm_subject'] : null;

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform a SQL query to fetch "year" values based on the selected "exm_type" and "exm_subject"
$sql = "SELECT DISTINCT year FROM questions WHERE exm_type = ? AND exm_subject = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $selectedExmType, $selectedExmSubject);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $years = array();
    while ($row = $result->fetch_assoc()) {
        $years[] = $row['year'];
    }
    echo json_encode($years); // Return the year values as JSON
} else {
    echo "No year data found for the selected exm_type and exm_subject";
}

$stmt->close();
$conn->close();