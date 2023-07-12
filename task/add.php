<!DOCTYPE html>
<html>
<head>
<style>
body {
    background:url("tablebackground.jpg");
      background-repeat: no-repeat;
      background-size: 100% 140%;
}

.button-container {
    display: flex;
    justify-content: center;
}

table {
    margin: 0 auto;
    border-collapse: collapse;
    width: 80%;
}

th {
    font-style: Georgia;
    color: brown;
    font-size: 18px;
    background-color: darksalmon;
    padding: 10px;
}

td {
    padding: 10px;
}

button[type="button"] {
    display: block;
    width: 100px;
    padding: 10px;
    background-color: #0047AB;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin: 5px;
}

button[type="button"]:hover {
    background-color: #45a049;
}

</style>
<script>
    function redirectToHome() {
        window.location.href = 'index.php';
    }

    function editJob(jobId) {
        window.location.href = 'jobedit.php?id=' + jobId;
    }

    function deleteJob(jobId) {
        if (confirm('Are you sure you want to delete this job?')) {
            window.location.href = 'jobdelete.php?id=' + jobId;
        }
    }
</script>
</head>
<body>
<div class="header">
    <button type="button" onclick="redirectToHome()" style="float: right;">Home</button>
</div>
<div class="home-content">
    <br>
    <div class="button-container">
        <table border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>COMPANY NAME</th>
                    <th>JOB TITLE</th>
                    <th>SALARY</th>
                    <th>NUMBER OF POSTING</th>
                    <th>LOCATION</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "submit";
            $connection = new mysqli($servername, $username, $password, $database);
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            $sql = "SELECT * FROM submit";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["company"] . "</td>
                        <td>" . $row["job"] . "</td>
                        <td>" . $row["salary"] . "</td>
                        <td>" . $row["number"] . "</td>
                        <td>" . $row["location"] . "</td>
                        <td>
                            <button type='button' onclick='editJob(" . $row["id"] . ")'>Edit</button>
                            <button type='button' onclick='deleteJob(" . $row["id"] . ")'>Delete</button>
                        </td>
                    </tr>";
            }
            $connection->close();
            ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "submit";
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['submit'])) {
    $company = $_POST['t1'];
    $jobTitle = $_POST['t2'];
    $salary = $_POST['t3'];
    $postings = $_POST['t4'];
    $location = $_POST['t5'];

    $query = "INSERT INTO submit (company, job, salary, number, location) VALUES ('$company', '$jobTitle', '$salary', '$postings', '$location')";
    
    if ($connection->query($query) === TRUE) {
        echo ".";
    } else {
        echo "Error inserting job: " . $connection->error;
    }
    
    $connection->close();
}
?>
            </tbody>
        </table>
    </div>
</div>
<center>
    <button type="button" onclick="window.location.href = 'job.php'">ADD</button>
</center>
</body>
</html>
