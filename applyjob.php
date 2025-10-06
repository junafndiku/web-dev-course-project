<?php
  session_start();
// Connect to the database (assuming you already have a connection established)
$mysqli = new mysqli('localhost', 'root', '', 'web2022');

// Check for connection errors
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

// Check if the apply button was clicked
if (isset($_POST['apply'])) {
  // Get the job ID from the hidden input field
  $jobId = $_POST['job_id'];

  // Get the user ID (replace with your actual user ID retrieval logic)
  $userId = $_SESSION['user']['id'];

  // Insert the application into the user_job_applications table
  $query = "INSERT INTO user_job_applications (user_id, job_offer_id) VALUES ($userId, $jobId)";

  if ($mysqli->query($query)) {
    echo "Application submitted successfully.";
    header("Location: punet.php");
  } else {
    echo "Error submitting application: " . $mysqli->error;
  }
}

// Close the database connection
$mysqli->close();
?>
