<?php
// Database connection parameters
$host = "localhost";
$username = "id20936141_neww1";
$password = "Asa@@Babu12";
$database = "id20936141_neww";

// Check if exm_type, exm_subject, and year are set in the request
if (isset($_GET['exm_type']) && isset($_GET['exm_subject']) && isset($_GET['year'])) {
    $exm_type = $_GET['exm_type'];
    $exm_subject = $_GET['exm_subject'];
    $year = $_GET['year'];

    // Create a database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT question_id, question_text, option_a, option_b, option_c, option_d, correct_option FROM questions WHERE exm_type = ? AND exm_subject = ? AND year = ?");
    $stmt->bind_param("sss", $exm_type, $exm_subject, $year);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Close the database connection
    $stmt->close();
    mysqli_close($conn);

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // Handle missing parameters
    echo "Missing exm_type, exm_subject, or year parameters";
}
?>