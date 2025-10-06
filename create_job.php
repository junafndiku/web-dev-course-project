<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head class="clearfix">
<head>
  <title>Create Job Offer</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    h2 {
      color: #333;
    }

    form {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
      color: #555;
    }

    input[type="text"],
    textarea,
    input[type="number"],
    input[type="datetime-local"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      color: #555;
    }
    textarea {
      resize: none; /* Disable textarea resizing */
    }


    input[type="submit"] {
      background-color: #1d244c;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 4px;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: ##0a0d1c;
    }
    
  </style>
</head>
<link rel="stylesheet" href="assets/css/styleWeb.css" >

<title>ODA SOLUTION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
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
                  <li><a href="punet.php">Punet</a></li>
                  <?php 
                    if (isset($_SESSION['role']) && $_SESSION['role'] == "company") {
                      echo "<li><a href='create_job.php' class='btn btn-info'>Create job offers</a></button></li>";
                    }
                  ?>
              </ul>
            </li>
           <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">CONTACTS<span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <li><p><a href="jobportalcontact@gmail.com" class="p"><i class="fa fa-envelope"></i>&#9993; jobportalcontact@gmail.com</a></p></li>
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
                echo "<li><a href='logout.php'>Logout</a></button><li>";
                echo "</ul>";
                echo "</li>";
              } else {
                echo "<li><a href='punet.php'>Jobs</a></li>";
                echo "<li><a href='index.php'>Login</a></li>";
              }
              ?>
          </div>
        </ul>
      </div>
    </div>
  </div>
</nav>    

<div class="container " style="margin-top:80px;"> 
  <div class="row">
      <form method="POST" action="process_job.php">
        <h1 style='padding-bottom: 20px; text-align: center;'>Create job offer</h1>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required><br>

        <label for="salary">Salary:</label>
        <input type="number" name="salary" id="salary" step="0.01" required><br>

        <label for="posted_date">Posted Date:</label>
        <input type="datetime-local" name="posted_date" id="posted_date" value="<?php echo date('Y-m-d\TH:i'); ?>"><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="6" cols="50"></textarea><br>

        <input style='margin-top:20px' type="submit" value="Create">
      </form>
  </div>
</div> 
<hr>
  <div class="row">
  <div class="col-md-12 small" style="padding-bottom: 20px; padding-left:0px; text-align: center; font-family: nunito;">Copyright &copy; Oda Solution 2021. All Rights Reserved.</div>
</body>
</html>