<!DOCTYPE html>
<html>
<head>
  <title>Job Application Form</title>
<style>
body {
  font-family: Arial, sans-serif;
  background:url("formbg.jpg");
 background-repeat:no-repeat;
 background-size:100% 140%;
}
header {
      text-align: center;
      padding: 20px;
      background-color: #f1f1f1;
      width: 100%;
    }

    #logo {
      max-width: 100px;
      margin-bottom: 0px;
margin-top: 0px;
      float: left;
      margin-right: 10px;
    }

h1 {
  text-align: center;
}

form {
  max-width: 400px;
  margin: 0 auto;
}

div {
  margin-bottom: 10px;
}

label {
  display: inline-block;
  width: 120px;
}

input[type="text"],
input[type="date"],
input[type="tel"],
input[type="file"] {
  width: 200px;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="radio"] {
  margin-right: 5px;
}

button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #0047AB;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
 margin:10px;
}

button[type="submit"]:hover,
button[type="button"]:hover  {
  background-color: #45a049;
}
button[type="button"]{
display: block;
  width: 10%;
  padding: 10px;
  background-color: #0047AB;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
 margin:10px;}

.error {
  color: red;
  font-size: 12px;
  margin-top: 5px;
}

    footer {
      text-align: center;
      padding: 5px;
      background-color: #f1f1f1;
      width: 100%;
      position: fixed;
      bottom: 0;
      left: 0;
      height: 10%;
    }

    footer p {
      margin: 5px;
    }

</style>
  <script>
   function redirectTocandidatetable() {
      window.location.href = 'candidate.php';
    }
function showConfirmation() {
  const job = document.getElementById('job').value;
  const name = document.getElementById('name').value;
  const gender = document.querySelector('input[name="gender"]:checked');
  const qualification = document.getElementById('qualification').value;
  const dob = document.getElementById('dob').value;
  const mobile = document.getElementById('mobile').value;
  const resume = document.getElementById('resume').value;
  const errorMessage = document.getElementById('error-message');
  errorMessage.innerHTML = '';

  if (!job || !name || !gender || !qualification || !dob || !mobile || !resume) {
    errorMessage.innerHTML = 'All fields are required.';
    return false;
  }
}
</script>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "submit";
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sql2 = "SELECT id, company FROM submit"; 
$result2 = $connection->query($sql2);

if (!$result2) {
    die("Invalid query: " . $connection->error);
}

$submit = array(); 

if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        $submit[] = $row2; 
    }
}
?>
 <header>
    <img id="logo" src="log.jpg" alt="Job Portal Logo">
    <h1>Job Portal</h1>
  </header>
 <div class="header">
    <button type="button" onclick="redirectTocandidatetable()" style="float: right;">Home</button>
  </div>
<h1>Job Application Form</h1>
<form name="place" method="post" action="candidate.php">
 <div>
 <label for="job">Job:</label>
 <select id="job" name="select">
  <?php
  foreach ($submit as $array) {      
  echo '<option value="' . $array["company"] . '">' . $array["company"] . '</option>';
  }
   ?>
 </select>
    </div>
    <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div>
      <label>Gender:</label>
      <label for="male">Male</label>
      <input type="radio" id="male" name="gender" value="Male" required>
      <label for="female">Female</label>
      <input type="radio" id="female" name="gender" value="Female" required>
    </div>
    <div>
      <label for="qualification">Qualification:</label>
      <input type="text" id="qualification" name="qualification" required>
    </div>
    <div>
      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" required>
    </div>
    <div>
      <label for="mobile">Mobile:</label>
      <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required>
    </div>
    <div>
      <label for="resume">Resume:</label>
      <input type="file" id="resume" name="resume" required>
    </div>
    <div id="error-message" class="error"></div>
    <button type="submit" id="register" name="register" onclick="return showConfirmation()">REGISTER</button>
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
    } else {
        mysqli_close($con);
        header("Location: candidate.php"); 
        exit();
    }
}
?>
</body>
<footer>
    <p>2023 Job Portal. All rights reserved.</p>
  </footer>
</html>