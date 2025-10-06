<?php
// Retrieve the form data
$username = $_POST['username'];
$password = $_POST['password'];
$db = mysqli_connect('localhost', 'root', '', 'web2022');
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$results = mysqli_query($db, $query);
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
// // $results = 1 means that one user with the
// // entered username exists
if ($user != null) {
  session_start();
  // Storing username in session variable
  $_SESSION['username'] = $user['username'];
  $_SESSION['role'] = $user['role'];
  $_SESSION['loginID'] = $user['id'];
  $_SESSION['user'] = $user;
  if($user['role'] == 'company') {
    $companyID = $user['company_id'];
    $query = "SELECT * FROM company WHERE id='$companyID'";
      $results = mysqli_query($db, $query);
      $stmt = $db->prepare($query);
      $stmt->execute();
      $result = $stmt->get_result();
      $company = $result->fetch_assoc();
      $_SESSION['company'] = $company;
  }
  header("Location: web.php");
} else {
  header("Location: index.php");
}
?>
