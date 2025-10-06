<?php
   session_start();
  $mysqli = new mysqli('localhost', 'root', '', 'web2022');

  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    
    header("Location: punet.php");
    exit();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $companyName = $_POST['company-name'];
    $companyAddress = $_POST['company-address'];
    $companyLocation = $_POST['company-location'];
    $companyIndustry = $_POST['company-industry'];

    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
    if ($mysqli->query($query)) {
      echo "Registration successful!";
    } else {
      echo "Error: " . $mysqli->error;
    }
    $user = null;

    $insertedUserId = mysqli_insert_id($mysqli); 
    $selectQuery = "SELECT * FROM users WHERE id = $insertedUserId";
    $result = mysqli_query($mysqli, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
      $userID = $user['id'];
    }
    if($role == "company") {
      $query = "SELECT MAX(id) AS maxId FROM company";
      $result = mysqli_query($mysqli, $query);
      $row = mysqli_fetch_assoc($result);
      $maxCompanyID = $row['maxId'] + 1;
      $query = "INSERT INTO company (id, name, location, address, industry) VALUES ('$maxCompanyID', '$companyName', '$companyLocation', '$companyAddress', '$companyIndustry')";
      $mysqli->query($query);
      $query = "UPDATE users SET company_id = '$maxCompanyID' WHERE id = $userID";
      mysqli_query($mysqli, $query);
    }

    if ($user != null) {
     
      // Storing username in session variable
      $_SESSION['username'] = $user['username'];
      $_SESSION['role'] = $user['role'];
      $_SESSION['loginID'] = $user['id'];
      $_SESSION['user'] = $user;
      if($user['role'] == 'company') {
        // $companyID = $user['company_id'];
        // $query = "SELECT * FROM company WHERE id='$maxCompanyID' limit 1";
        // $result = mysqli_query($mysqli, $query);
        // $company = mysqli_fetch_assoc($result);
        // $_SESSION['company'] = $company;
        $companyQuery = "SELECT * FROM company WHERE id = $maxCompanyID";
        $companyResult = mysqli_query($mysqli, $companyQuery);
        $company = null;
        if ($companyResult && mysqli_num_rows($companyResult) > 0) {
          $company = mysqli_fetch_assoc($companyResult);
        }
        $object = json_decode(json_encode($company), true);
        $_SESSION['company'] = $company;
         
      }
      header("Location: web.php");
    }
  }
  
  $mysqli->close();
?>
