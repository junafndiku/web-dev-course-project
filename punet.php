<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head class="clearfix">
<link rel="stylesheet" href="assets/css/styleWeb.css" >

<title>ODA SOLUTION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/animate.css" >
  <link rel="stylesheet" href="assets/css/animate.min.css" >
  <link rel="stylesheet" href="assets/css/punet.css" >
 
  <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<!-- Navigation -->
<body data-spy="scroll-left" data-target=".navbar" data-offset="100">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

  <div id="container" >
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>

    <a class="navbar-brand" href="#" style="color:white; padding-left:70px; font-family:nunito; "><b> ODA SOUTION</b></a> 
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar" style="width:80%; height: 450px; padding-left: 200px">
        <ul class="nav navbar-nav" style="color: white; float: right; ">
          <li><a href="web.php">HOME</a></li>
          <li><a href="rrethnesh.php">ABOUT US</a></li>
          <li><a href="sherbimet.php">SERVICES</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">PRODUCTS<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="https://www.zeri.app/">voice.app</a></li>
                  <li><a href="https://www.fature.al//">transcript.al</a></li>
              </ul>
            </li>
           <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">CONTACTS<span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <li><p><a href="mailto:jobportalcontact@gmail.com" class="p"><i class="fa fa-envelope"></i>&#9993; jobportalcontact@gmail.com</a></p></li>
                 <li><p><a href="tel: 0698795551"><i class="fa fa-phone"></i><span style="color: black;">&#9742;</span>Call us</a></p></li>
              </ul>
            </li>
            <?php if(isset($_SESSION['role'])) {
              echo "<li class='dropdown'>";
                echo "<a class='dropdown-toggle' data-toggle='dropdown' href='#'>";
                echo  "Welcome "; 
                echo $_SESSION['user']['username'];
                echo "<span class='caret'></span>";
                echo "</a>";
                echo "<ul class='dropdown-menu'>";
                echo "<li><a href=\"punet.php\">Jobs</a></li>";
                if (isset($_SESSION['role']) && $_SESSION['role'] == "company") {
                  echo "<li><a href='create_job.php'>Create new job</a></button></li>";
                }
                echo "<li><a href='logout.php'>Logout</a></button><li>";
                echo "</ul>";
                echo "</li>";    
              } else {
                echo "<li><a href='index.php'>Login</a></li>";
              }
              ?>
        </ul>
      </div>
    </div>
  </div>
</nav>    
<div class="container" style="margin-top: 80px;">
  <div class="row">
    <?php
    $userID = 0;
    if (isset($_SESSION['user'])) {
      $userID = $_SESSION['user']['id'];
    }

    // Connect to the database (assuming you already have a connection established)
    $mysqli = new mysqli('localhost', 'root', '', 'web2022');

    // Check for connection errors
    if ($mysqli->connect_errno) {
      echo "<p class='error-message'>Failed to connect to MySQL: " . $mysqli->connect_error . "</p>";
      exit();
    }

    // Query to retrieve job offers
    $query = "
      SELECT j.*, COUNT(a.id) AS num_applicants
      FROM job_offers j
      LEFT JOIN user_job_applications a ON j.id = a.job_offer_id
      GROUP BY j.id
      ORDER BY j.id DESC
    ";
    $result = $mysqli->query($query);

    // Check if there are any job offers
    if ($result->num_rows > 0) {
      // Start the HTML list
      echo "<ul class='job-offers'>";

      // Loop through each job offer and display the details
      while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        $company = $row['company'];
        $location = $row['location'];
        $salary = $row['salary'];
        $posted_date = $row['posted_date'];
        $num_applicants = $row['num_applicants'];

        $jobId = $row['id'];
        $hasApplied = false; // Set the initial value to false

        if (isset($_SESSION['role']) && $_SESSION['role'] != "company") {
          // Perform a database query to check if the user has applied for this job
          $checkQuery = "SELECT COUNT(*) AS total FROM user_job_applications WHERE user_id = $userID AND job_offer_id = $jobId";
          $checkResult = mysqli_query($mysqli, $checkQuery);

          if ($checkResult) {
            $checkRow = mysqli_fetch_assoc($checkResult);
            $hasApplied = $checkRow['total'] > 0; // If total > 0, the user has applied
          }

          // Generate HTML list item for each job offer
          echo "<li class='job-offer'>";
          echo "<h3 class='job-title" . ($hasApplied ? " applied" : "") . "'>$title";
          if ($hasApplied) {
            echo "<span class='badge'>Applied &#10004;</span>";
          }
          echo "</h3>";
        } else {
          echo "<li class='job-offer'>";
          echo "<h3 class='job-title'>$title</h3>";
        }

        echo "<p><strong>Company:</strong> $company</p>";
        echo "<p><strong>Location:</strong> $location</p>";
        echo "<p><strong>Salary:</strong> $salary</p>";
        echo "<p><strong>Posted Date:</strong> $posted_date</p>";
        echo "<p><strong>Description:</strong> $description</p>";
        echo "<p><strong>Applicants:</strong> $num_applicants</p>";

        if (isset($_SESSION['role'])) {
          if (!$hasApplied && $_SESSION['role'] != "company") {
            echo "<form method='post' action='applyjob.php'>";
            echo "<input type='hidden' name='job_id' value='$id'>";
            echo "<input class='btn btn-info' type='submit' name='apply' value='Apply' onclick='return confirm(\"Are you sure you want to apply?\")'>";
            echo "</form>";
          }
        } else {
          echo "<form method='post' action='index.php'>";
          echo "<input type='hidden' name='job_id'>";
          echo "<input class='btn btn-info' type='submit' name='apply' value='Apply'>";
          echo "</form>";
        }

        echo "</li>";
      }

      // End the HTML list
      echo "</ul>";
    } else {
      echo "<p class='no-offers-message'>No job offers found.</p>";
    }

    // Close the database connection
    $mysqli->close();
    ?>
  </div>
</div>
<hr>
                <div class="row">
                    <div class="col-md-12 small" style="padding-bottom: 20px; padding-left:0px; text-align: center; font-family: nunito;">Copyright &copy; Oda Solution 2021. All Rights Reserved.</div>



</body>

</html>