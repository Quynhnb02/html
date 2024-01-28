<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $studentName = $_POST["name"];
    $studentEmail = $_POST["email"];
    $workStudyDepartment = $_POST["work_study_department"];
    $file = $_FILES["resume"]["name"];
    $experience = $_POST["experience"];
    $whyHire = $_POST["whyhire"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "work_study_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert 
    $sql = "INSERT INTO students (name, email, work_study_department, resume, experience, why_hire) 
            VALUES ('$studentName', '$studentEmail', '$workStudyDepartment', '$file', '$experience', '$whyHire')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
