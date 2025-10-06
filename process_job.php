<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_SESSION['company'])) {
        $conn = new mysqli('localhost', 'root', '', 'web2022');
    
        $title = $_POST['title'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $salary = $_POST['salary'];
        $posted_date = $_POST['posted_date'];
        $companyName = $_SESSION['company']['name'];
        $companyID = $_SESSION['company']['id'];
        $createdBy = $_SESSION['user']['id'];
    
        $query = "INSERT INTO job_offers ( title, description, company, location, salary, posted_date, created_by, company_id) VALUES
        ('$title', '$description', '$companyName', '$location', '$salary', '$posted_date', '$createdBy', '$companyID')";

        if (mysqli_query($conn, $query)) {
            echo "Job offer created successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_close($conn);
        echo " <a href='punet.php'> Back </a>";
    } else {
        echo "You dont have permission to create Job offer";
    }
}

?>
