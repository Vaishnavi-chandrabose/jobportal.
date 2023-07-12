<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "submit";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the job ID is provided in the URL parameter
if (isset($_GET['id'])) {
    $jobId = $_GET['id'];
    $query = "DELETE FROM submit WHERE id = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("i", $jobId);
    if ($statement->execute()) {
        header("Location: add.php");
        exit();
    } else {
        echo "Error deleting job: " . $connection->error;
    }
    $statement->close();
    $connection->close();
} else {
    echo "Invalid request.";
}
?>
