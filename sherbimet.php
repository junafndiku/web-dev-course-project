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

  <div id="container " >
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>

    <a class="navbar-brand" href="#" style="color:white; padding-left:70px; font-family:nunito; "><b> ODA SOUTION</b></a> 
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar" style="width:80%; height: 450px; padding-left: 200px; ">
        <ul class="nav navbar-nav" style="color: white; float: right; ">
          <li><a href="web.php">HOME</a></li>
          <li><a href="rrethnesh.php">ABOUT US</a></li>
          <li><a href="sherbimet.php">SERVICES</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">PRODUKTET<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="https://www.zeri.app/">zeri.app</a></li>
                  <li><a href="https://www.fature.al//">transcript.al</a></li>
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
  <h2>SHERBIMET</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="assets/image/webi.jpg"; style="image-shadow: transparent 10%; width:80%; height: 450px; padding-left: 200px;">
        <div class="carousel-caption">
         
          
        </div>
      </div>

      <div class="item">
        <img src="assets/image/Teamwork.jpg" alt="" style="width:80%; height: 450px; padding-left: 200px;">
        <div class="carousel-caption">
          
        </div>
      </div>
    
      <div class="item">
        <img src="assets/image/Konsulence.jpg" alt="" style="width:80%; height: 450px; padding-left: 200px;">
        <div class="carousel-caption">
        
         
        </div>
      </div>
       <div class="item">
        <img src="assets/image/enterprise.png" alt="" style="width:80%;height: 450px;  padding-left: 200px;">
        <div class="carousel-caption">
        
          
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<script>
$(document).ready(function(){
  // Activate Carousel
  $("#myCarousel").carousel({interval: 1200});
    
  // Enable Carousel Indicators
  $(".item1").click(function(){
    $("#myCarousel").carousel(0);
  });
  $(".item2").click(function(){
    $("#myCarousel").carousel(1);
  });
  $(".item3").click(function(){
    $("#myCarousel").carousel(2);
  });
  $(".item4").click(function(){
    $("#myCarousel").carousel(3);
  });
  
   // Enable Carousel Controls
  $(".left").click(function(){
    $("#myCarousel").carousel("prev");
  });
  $(".right").click(function(){
    $("#myCarousel").carousel("next");
  });
});
</script>
<br><br>

<div id="services" class="container text-justify">
  <h2 style="font-family:Nunito; color: black;">SERVICES</h2>
  
  <br>
  <div class="row">
    <div class="col-sm-3">
      
      <h4  style="font-family: Nunito;text-align: justify; color: #007bff;">What we offer</h4>
      <p style="font-family:Nunito;color: black;text-align: justify; ">The online job Portal System  provides the members with jobs information,
online applying for jobs and many other facilities. This system provides service to the job
applicants to search for working opportunities. </p>
    </div>
    <div class="col-sm-3">
      
      <h4  style="font-family: Nunito; color: #007bff;">Intership</h4>
      <p style="font-family:Nunito;color: black;color: black;">Students who are still in the first steps of their career who have just finished school or even want their careers to take a different course, Oda gives them a chance to do this through internships.</p>
    </div>


    <div class="col-sm-3">
      <h4 style="font-family: Nunito; color: #007bff;">Consulting</h4>
      <p style="font-family: Nunito;color: black;">To achieve all objectives and informatization of all processes, we offer professional consultancy in all fields.</p>
    </div>
     <div class="col-sm-3">
      <h4 style="font-family: Nunito; color: #007bff; ">Enterprise</h4>
      <p style="font-family: Nunito;color: black;">We are committed to providing services at all levels of enterprise to enable our public and private sector users, in Albania and abroad, to overcome the challenges of job searching.  </p>
    </div>

    
  </div>
<hr>
<br>
<div class="container "> 
  <img src="assets/image/motivated.png" style="width: 50px; height: 50px; display: block;
  margin-left: auto;
  margin-right: auto"><br>
  <p style="text-align: center;font-family: nunito; font-size: 20px; color:  black;"><b>We strive to achieve these by inspiring our users to work with integrity, high quality, based on international standards and best practices.</b></p></div>
  <br><br>
  
            <hr>
  <!-- Container (Contact Section) -->
<div id="contact"  style="background-color:lightblue;"><b>
  <h2 class="text-center" style="font-family: Nunito;padding-left: 50px; color: black; text-align: justify;padding-top: 30px;">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p style="font-family:Nunito;color:black; text-align: justify; padding-left: 50px;"> Response in 24 hours.</p> <br>
      <p style="color: black; font-size: 15px; text-align: justify;font-family: Nunito; padding-left: 50px;"><span class="glyphicon glyphicon-map-marker" style="color:#007bff;"></span> Tirana, ALB</p>
      <p style="color: black;font-size: 15px; text-align: justify; font-family: Nunito; padding-left: 50px;"><span class="glyphicon glyphicon-phone" style="color:#007bff;"></span> +355683433903</p>
      <p style="color: black;font-size: 15px; text-align: justify; padding-left: 50px; font-family: Nunito;"><span class="glyphicon glyphicon-envelope" style="color:#007bff;"></span> jobportalcontact@gmail.com</p>
    </div>
    <div class="col-sm-7 slideanim" style="padding-right: 50px;">
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
                    <div class="col-md-12 small" style="padding-bottom: 20px;text-align: center;font-family: Nunito; font-size: 15px;">Copyright &copy; Oda Solution 2023. All Rights Reserved.</div>


  
</body>
</html>
