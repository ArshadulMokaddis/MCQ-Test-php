<?php
header('Content-Type: application/json');

// Connect to the database
$mysqli = new mysqli("localhost", "id20936141_neww1", "Asa@@Babu12", "id20936141_neww");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to fetch exm_type
function getExmTypes() {
    global $mysqli;
    $result = $mysqli->query("SELECT DISTINCT exm_type FROM questions");
    $types = array();
    while ($row = $result->fetch_assoc()) {
        $types[] = $row['exm_type'];
    }
    return $types;
}

// Function to fetch exm_subject based on exm_type
function getExmSubjects($exm_type) {
    global $mysqli;
    $exm_type = $mysqli->real_escape_string($exm_type);
    $result = $mysqli->query("SELECT DISTINCT exm_subject FROM questions WHERE exm_type = '$exm_type'");
    $subjects = array();
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row['exm_subject'];
    }
    return $subjects;
}

// Function to fetch years based on exm_type and exm_subject
function getYears($exm_type, $exm_subject) {
    global $mysqli;
    $exm_type = $mysqli->real_escape_string($exm_type);
    $exm_subject = $mysqli->real_escape_string($exm_subject);
    $result = $mysqli->query("SELECT DISTINCT year FROM questions WHERE exm_type = '$exm_type' AND exm_subject = '$exm_subject'");
    $years = array();
    while ($row = $result->fetch_assoc()) {
        $years[] = $row['year'];
    }
    return $years;
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'exm_types') {
        $exmTypes = getExmTypes();
        echo json_encode($exmTypes);
    } elseif ($action === 'exm_subjects') {
        $exm_type = $_GET['exm_type'];
        $exmSubjects = getExmSubjects($exm_type);
        echo json_encode($exmSubjects);
    } elseif ($action === 'years') {
        $exm_type = $_GET['exm_type'];
        $exm_subject = $_GET['exm_subject'];
        $years = getYears($exm_type, $exm_subject);
        echo json_encode($years);
    }
}

$mysqli->close();
?>
