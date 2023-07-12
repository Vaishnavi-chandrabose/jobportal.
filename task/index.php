<!DOCTYPE html>
<html>
<head>
  <title>Job Portal</title>
  <style>
    body {
      background: url(two.jpg);
      background-repeat: no-repeat;
      background-size: 100% 140%;
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

    #search-bar {
      text-align: right;
      margin: 20px;
    }

    #search-bar input[type="text"] {
      padding: 8px;
      border-radius: 4px;
      border: none;
    }

    #search-bar input[type="submit"] {
      padding: 8px 12px;
      background-color: #0047AB;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    section#banner {
      text-align: center;
      margin-top: 60px;
    }

    .banner-content {
      background-color:#D3D3D3
      padding: 30px;
      border-radius: 4px;
      display: inline-block;
    }

    .btn {
      display: inline-block;
      padding: 12px 20px;
      background-color:  #0047AB;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s;
      margin-right: 10px;
    }

    .btn:hover {
      background-color: #555;
    }

    footer {
      text-align: center;
      padding: 5px;
      background-color: #f1f1f1;
      width: 100%;
      position: fixed;
      bottom: 0;
      left: 0;
      height: 20%;
    }

    footer p {
      margin: 5px;
    }
  </style>
</head>
<body>
  <header>
    <img id="logo" src="log.jpg" alt="Job Portal Logo">
    <h1>Job Portal</h1>
  </header>

  <div id="search-bar">
    <form>
      <input type="text" placeholder="Search job opportunities">
      <input type="submit" value="Search">
    </form>
  </div>

  <section id="banner">
    <div class="banner-content">
      <h2>Find Your Dream Job</h2>
      <p>Search thousands of job opportunities</p>
      <a href="add.php" class="btn">Jobs</a>
      <a href="candidate.php" class="btn">Click here to Apply</a>
    </div>
  </section>


  <footer>
    <h3>Mail ID:</h3>
    <p>Jobportal@gmail.com</p>
    <h3>Phone:</h3>
    <p>1234567890</p>
    <h3>Our Website:</h3>
    <p>www.jobportal.com</p>
    <p>2023 Job Portal. All rights reserved.</p>
  </footer>
</body>
</html>
