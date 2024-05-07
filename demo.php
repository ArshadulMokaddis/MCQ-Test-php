<?php
$servername = "localhost";
$username = "id20936141_neww1";
$password = "Asa@@Babu12";
$database = "id20936141_neww";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform a SQL query to fetch distinct exm_type values
$sql = "SELECT DISTINCT exm_type FROM questions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $exmTypes = array();
    while ($row = $result->fetch_assoc()) {
        $exmTypes[] = $row['exm_type'];
    }
    echo json_encode($exmTypes); // Return the exm_type values as JSON
} else {
    echo "No exm_type data found";
}

$conn->close();
?>