<?php
$servername = "localhost";
$username = "id20936141_neww1";
$password = "Asa@@Babu12";
$database = "id20936141_neww";

$con = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Couldn't connect to database! <br>" . mysqli_connect_error();
} else {
    echo "Successfully connected to the database.";
    
    // Check if the required parameters are set in $_GET
    if (isset($_GET['n']) && isset($_GET['e']) && isset($_GET['p'])) {
        $name = $_GET['n'];
        $email = $_GET['e'];
        $password = $_GET['p'];

        // Sanitize user inputs to prevent SQL injection (you should use prepared statements instead)
        $name = mysqli_real_escape_string($con, $name);
        $email = mysqli_real_escape_string($con, $email);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "INSERT INTO user_table (name, email, password) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "\nRecord inserted successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Missing required parameters in the URL.";
    }
}

mysqli_close($con);
?>
