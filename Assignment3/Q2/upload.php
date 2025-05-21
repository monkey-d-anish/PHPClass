<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resumeDir = "uploads/resumes/";
    $photoDir = "uploads/photos/";


    if (!is_dir($resumeDir)) mkdir($resumeDir, 0777, true);
    if (!is_dir($photoDir)) mkdir($photoDir, 0777, true);


    $resume = $_FILES["resume"];
    $resumeName = basename($resume["name"]);
    $resumePath = $resumeDir . $resumeName;
    $resumeFileType = strtolower(pathinfo($resumePath, PATHINFO_EXTENSION));

    if (file_exists($resumePath)) {
        echo "Error: Resume file already exists.<br>";
    } elseif ($resume["size"] > 500000) {
        echo "Error: Resume file too large. Max 500KB.<br>";
    } elseif (!in_array($resumeFileType, ["pdf", "doc", "docx"])) {
        echo "Error: Resume must be PDF or DOC.<br>";
    } elseif (!is_uploaded_file($resume["tmp_name"])) {
        echo "Error: Resume not uploaded via HTTP POST.<br>";
    } else {
        move_uploaded_file($resume["tmp_name"], $resumePath);
        echo "Resume uploaded successfully.<br>";
    }

    $photo = $_FILES["photo"];
    $photoName = basename($photo["name"]);
    $photoPath = $photoDir . $photoName;
    $photoFileType = strtolower(pathinfo($photoPath, PATHINFO_EXTENSION));

    if (file_exists($photoPath)) {
        echo "Error: Photo file already exists.<br>";
    } elseif ($photo["size"] > 1000000) {
        echo "Error: Photo file too large. Max 1MB.<br>";
    } elseif (!in_array($photoFileType, ["jpg", "jpeg"])) {
        echo "Error: Photo must be JPG or JPEG.<br>";
    } elseif (!is_uploaded_file($photo["tmp_name"])) {
        echo "Error: Photo not uploaded via HTTP POST.<br>";
    } else {
        move_uploaded_file($photo["tmp_name"], $photoPath);
        echo "Photo uploaded successfully.<br>";
    }
}
?>
