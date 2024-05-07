<?php
$servername = "localhost";
$username = "id20936141_neww1";
$password = "Asa@@Babu12";
$database = "id20936141_neww";

// Create a database connection
$con = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Couldn't connect to the database! <br>" . mysqli_connect_error();
} else {
    // Check if the request method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['e'];
        $password = $_POST['p'];

        // Sanitize user inputs to prevent SQL injection (you should use prepared statements instead)
        $email = mysqli_real_escape_string($con, $email);
        $password = mysqli_real_escape_string($con, $password);

        // Query to check if email and password match an existing user
        $sql = "SELECT * FROM user_table WHERE email='$email' AND password='$password'";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            echo "Login successful";
            // You can return a JSON response to indicate success if needed
            // echo json_encode(["message" => "Login successful"]);
        } else {
            echo "Login failed";
            // You can return a JSON response to indicate failure if needed
            // echo json_encode(["message" => "Login failed"]);
        }
    } else {
        echo "Invalid request method";
        // You can return a JSON response to indicate an invalid request if needed
        // echo json_encode(["message" => "Invalid request method"]);
    }
}

mysqli_close($con);
?>
