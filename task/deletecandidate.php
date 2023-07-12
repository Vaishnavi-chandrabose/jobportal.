<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "submit";
$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
if (isset($_GET['id'])) {
    $candidateId = $_GET['id'];
    $query = "DELETE FROM candidate WHERE cid = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("i", $candidateId);
    if ($statement->execute()) {
        header("Location: candidate.php");
        exit();
    } else {
        echo "Error deleting candidate: " . $connection->error;
    }
    $statement->close();
    $connection->close();
} else {
    echo "Invalid request.";
}
?>
