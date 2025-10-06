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
                  <li><a href="https://www.zeri.app/">zeri.app</a></li>
                  <li><a href="https://www.fature.al//">fature.al</a></li>
              </ul>
            </li>
           <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">CONTACTS<span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <li><p><a href="mailto:jobportalcontact@gmail.com" class="p"><i class="fa fa-envelope"></i>&#9993; jobportalcontact@gmail.com</a></p></li>
                 <li><p><a href="tel: 0683433903"><i class="fa fa-phone"></i><span style="color: black;">&#9742;</span>Call us</a></p></li>
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


   
 <div class="container">



  <div class="row">
    
    <div class="col-sm-5">
      <h2 class="secondtitle"> <div class="container"><span style="color: black; padding-left: 40px;">ODA</div></span></h2><br>
    <p class="par">Job Portal will allow job provider to establish one to one relationships with candidates. This Portal will primarily focus on the posting and management of job vacancies. This system is designed
    such that ultimately all vacancies will be posted online and would offer employers the facilities to post their vacancies online<br>
 <b style="color: black;">It</b>  helps to review and manage the resulting applications efficiently through the web. Employer can also find the resume according to key skill in very less amount oftime
 <br>
 </p><br>
</div>
  <div class="col-sm-7">
<img src="assets/image/android.jpg" style="width: 750px;"> 
  </div>
  </div>

  
 </body>
            <hr>            
   <!-- Container (Contact Section) -->
<div id="contact" style="background-color:lightblue;"><b>
  <h2 class="text-center" style="font-family: Nunito;padding-left: 50px; color: black; text-align: justify;padding-top: 30px;">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p style="font-family:Nunito; color:black; text-align: justify; padding-left: 50px;"> Response in 24 hours.</p> <br>
      <p style="color: black; font-size: 15px; text-align: justify; padding-left: 50px;font-family: Nunito;"><span class="glyphicon glyphicon-map-marker" style="color:#007bff;"></span> Tirana, ALB</p>
      <p style="color: black;font-size: 15px; text-align: justify;font-family: Nunito; padding-left: 50px;"><span class="glyphicon glyphicon-phone" style="color:#007bff;"></span> +355683433903</p>
      <p style="color: black;font-size: 15px; text-align: justify;font-family: Nunito; padding-left: 50px;"><span class="glyphicon glyphicon-envelope" style="color:#007bff;"></span> jobportalcontact@gmail.com</p>
    </div>
    <div class="col-sm-7 slideanim"style="padding-right: 50px;">
      <div class="row">
        <div class="col-sm-6 form-group">
          
          <form name="myForm">
          <input  class="form-control" id="username" name="name"  placeholder="Name"  type="text" required>

        </div>
        <div class="col-sm-6 form-group">

          <input  class="form-control" id="email" name="email" placeholder="Email" type="email" required >
        </div>
      </div>
      <textarea class="form-control" id="comments"  name="comments" placeholder="Comment" rows="5" required ></textarea><br>
    
      <div class="row">
        <div class="col-sm-12 form-group">
  <button onclick="myFunction()"  class="btn btn-default pull-right" type="submit"  style="font-family: Nunito;"> <a ref="mailto:jobportalcontact@gmail.com">Send</button></form>
   
    <script src="assets/js/function.js"></script>

        </div>
      </div>
    </div>
  </div>
</div>

  

<hr class="my-5"/>
                <div class="row">
                    <div class="col-md-12 small" style="padding-bottom: 20px;text-align: center; font-size: 15px; font-family:nunito;">Copyright &copy; Oda Solution 2023. All Rights Reserved.</div>


</body>  
</html>