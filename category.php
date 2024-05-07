
<!--<?php-->
// Check if the request method is POST
<!--if ($_SERVER['REQUEST_METHOD'] == 'POST') {-->
    // Retrieve the data sent from the Android app
<!--    $exm_type = $_POST['exm_type'];-->
<!--    $exm_subject = $_POST['exm_subject'];-->
<!--    $year = $_POST['year'];-->

    // Include your database connection code here
<!--     $servername = "localhost";-->
<!-- $username = "id20936141_neww1";-->
<!-- $password = "Asa@@Babu12";-->
<!-- $database = "id20936141_neww";-->

// Create a database connection
<!--$conn = mysqli_connect($servername, $username, $password, $database);-->

    // Prepare the SQL query to insert data into the categories table
<!--    $sql = "INSERT INTO categories (exm_type, exm_subject, year) VALUES (?, ?, ?)";-->

    // Create a prepared statement
<!--    $stmt = mysqli_prepare($con, $sql);-->

<!--    if ($stmt) {-->
        // Bind the parameters and execute the statement
<!--        mysqli_stmt_bind_param($stmt, "sss", $exm_type, $exm_subject, $year);-->

<!--        if (mysqli_stmt_execute($stmt)) {-->
<!--            echo "Category inserted successfully.";-->
<!--        } else {-->
<!--            echo "Error: " . mysqli_error($con);-->
<!--        }-->

        // Close the prepared statement
<!--        mysqli_stmt_close($stmt);-->
<!--    } else {-->
<!--        echo "Error: " . mysqli_error($con);-->
<!--    }-->

    // Close the database connection
<!--    mysqli_close($con);-->
<!--} else {-->
<!--    echo "Invalid request.";-->
<!--}-->
<!--?>-->
