<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "submit";
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $company = $_POST['company'];
    $job = $_POST['job'];
    $salary = $_POST['salary'];
    $number = $_POST['number'];
    $location = $_POST['location'];
    $query = "UPDATE submit SET company = ?, job = ?, salary = ?, number = ?, location = ? WHERE id = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("sssssi", $company, $job, $salary, $number, $location, $id);
    if ($statement->execute()) {
       header("Location: add.php");
    } else {
        echo "Error updating job: " . $connection->error;
    }
    $statement->close();
    $connection->close();
} else {
    echo "Invalid request.";
}
?>
