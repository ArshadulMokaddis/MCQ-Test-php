<?php
// Database connection parameters
$servername = "localhost";
$username = "id20936141_neww1";
$password = "Asa@@Babu12";
$database = "id20936141_neww";


// Get the selected "exm_type" from the query string
$selectedExmType = isset($_GET['exm_type']) ? $_GET['exm_type'] : null;

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform a SQL query to fetch "exm_subject" values based on the selected "exm_type"
$sql = "SELECT DISTINCT exm_subject FROM questions WHERE exm_type = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $selectedExmType);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $exmSubjects = array();
    while ($row = $result->fetch_assoc()) {
        $exmSubjects[] = $row['exm_subject'];
    }
    echo json_encode($exmSubjects); // Return the exm_subject values as JSON
} else {
    echo "No exm_subject data found for the selected exm_type";
}

$stmt->close();
$conn->close();
?>