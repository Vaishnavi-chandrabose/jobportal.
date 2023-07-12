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
    $jobId = $_GET['id'];
    $query = "SELECT * FROM submit WHERE id = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("i", $jobId);
    $statement->execute();
    $statement->bind_result($id, $company, $job, $salary, $number, $location);
    if ($statement->fetch()) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Job</title>
        </head>
        <body>
            <h1>Edit Job</h1>
            <form name="editJobForm" method="post" action="jobupdate.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div>
                    <label for="company">Company:</label>
                    <input type="text" id="company" name="company" value="<?php echo $company; ?>" required>
                </div>
                <div>
                    <label for="job">Job Title:</label>
                    <input type="text" id="job" name="job" value="<?php echo $job; ?>" required>
                </div>
                <div>
                    <label for="salary">Salary:</label>
                    <input type="text" id="salary" name="salary" value="<?php echo $salary; ?>" required>
                </div>
                <div>
                    <label for="number">Number of Posting:</label>
                    <input type="text" id="number" name="number" value="<?php echo $number; ?>" required>
                </div>
                <div>
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" value="<?php echo $location; ?>" required>
                </div>
         <button type="submit" name="update">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Job not found.";
    }
    $statement->close();
    $connection->close();
} 
?>