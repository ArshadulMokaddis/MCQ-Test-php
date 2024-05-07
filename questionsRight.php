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

// Check if the request is to retrieve correct answers
if ($_GET['action'] == 'retrieve_correct_answer') {
    // Get the question number for which you want to retrieve the correct answer
    $question_number = $_GET['question_number'];

    // Query the database to retrieve the correct answer for the specified question
    $sql = "SELECT correct_option FROM questions WHERE question_number = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $question_number);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                // Return the correct answer as a JSON response
                echo json_encode(array('correct_option' => $row['correct_option']));
            } else {
                echo "Question not found";
            }
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
