<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["uploaded_file"])) {
    $file_name = $_FILES["uploaded_file"]["name"];
    $file_tmp = $_FILES["uploaded_file"]["tmp_name"];
    $file_size = $_FILES["uploaded_file"]["size"];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if ($file_extension !== "pdf") {
        echo "Error: Only PDF files are allowed.";
        exit;
    }

    $upload_dir = "C:/xampp/htdocs/qcpl/Backend/File_Uploaded";
    $upload_path = $upload_dir . $file_name;
    if (!move_uploaded_file($file_tmp, $upload_path)) {
        echo "Error: Failed to move uploaded file.";
        exit;
    }

    header("Content-Type: application/pdf");
    header("Content-Disposition: inline; filename=\"" . basename($file_name) . "\""); // Display inline

    readfile($upload_path);
    exit;
}
?>