<!DOCTYPE html>
<html>
<head>
<style>
body {
       background:url("tablebackground.jpg");
      background-repeat: no-repeat;
      background-size: 100% 140%;
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

    function editCandidate(candidateId) {
        window.location.href = 'editcandidate.php?id=' + candidateId;
    }

    function deleteCandidate(candidateId) {
        if (confirm('Are you sure you want to delete this candidate?')) {
            window.location.href = 'deletecandidate.php?id=' + candidateId;
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
    <table border="2">
        <thead>
            <tr>
                <th bgcolor="darksalmon" style="font-style: Georgia; color: brown; font-size: 18px;">Job ID</th>
                <th bgcolor="#F0E68C" style="font-style: Georgia; color: brown; font-size: 18px;">Company</th>
                <th bgcolor="#BCB88A" style="font-style: Georgia; color: brown; font-size: 18px;">Name</th>
                <th bgcolor="rosybrown" style="font-style: Georgia; color: brown; font-size: 18px;">Gender</th>
                <th bgcolor="darksalmon" style="font-style: Georgia; color: brown; font-size: 18px;">Qualification</th>
                <th bgcolor="#73A16C" style="font-style: Georgia; color: brown; font-size: 18px;">DOB</th>
                <th bgcolor="#BCB88A" style="font-style: Georgia; color: brown; font-size: 18px;">Mobile </th>
                <th bgcolor="rosybrown" style="font-style: Georgia; color: brown; font-size: 18px;">Resume Upload</th>
                <th bgcolor="darksalmon" style="font-style: Georgia; color: brown; font-size: 18px;">Actions</th>
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
        $sql = "SELECT * FROM candidate";
        $result = $connection->query($sql);

        if (!$result) {
            die("Invalid query: " . $connection->error);
        }
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["cid"] . "</td>
                <td>" . $row["title"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["gender"] . "</td>
                <td>" . $row["qualification"] . "</td>
                <td>" . $row["dob"] . "</td>
                <td>" . $row["mobile"] . "</td>
                <td>" . $row["resume"] . "</td>
                <td>
                    <button type='button' onclick='deleteCandidate(" . $row["cid"] . ")'>Delete</button>
                </td>
            </tr>";
        }
        $connection->close();
        ?>
<?php
if (isset($_POST["register"])) {
    $sel = $_POST["selectt"];
    $job = $_POST["select"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $qualification = $_POST["qualification"];
    $dob = $_POST["dob"];
    $mobile = $_POST["mobile"];
    $resume = $_POST["resume"];

    $con = mysqli_connect("localhost", "root", "", "submit");
    if (!$con) {
        die("Connection failed");
    }

    $query = "INSERT INTO candidate (id, title, name, gender, qualification, dob, mobile, resume) 
              VALUES ('$sel', '$job', '$name', '$gender', '$qualification', '$dob', '$mobile', '$resume')";

    $r = mysqli_query($con, $query);
    if (!$r) {
        die("Insertion failed");
    } 
}
?>

        </tbody>
    </table>
<center>
    <button type="button" onclick="window.location.href = 'candidateform.php'">ADD</button>
</center>
</div>
</body>
</html>
