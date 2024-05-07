<?php
$servername = "localhost";
$username = "id20936141_neww1";
$password = "Asa@@Babu12";
$database = "id20936141_neww";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Specify the exam type, subject, and year for filtering
$exm_type = "JSC";
$exm_subject = "Bangla";
$year = "2010";

// Fetch questions from the database for the specified criteria
$query = "SELECT * FROM questions WHERE exm_type='$exm_type' AND exm_subject='$exm_subject' AND year='$year'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$questions = array();

while ($row = mysqli_fetch_assoc($result)) {
    $questions[] = $row;
}

// Return questions as JSON
echo json_encode($questions);

// Close the database connection
mysqli_close($conn);
?>
