<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qcpl";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming user 2 requests to view a specific file
$fileId = $_GET['id']; // Assuming file_id is passed via GET parameter

// Retrieve file details from the database
$sql = "SELECT file_name, type, file_path FROM fileupload WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $fileId);
$stmt->execute();
$result = $stmt->get_result();

// Check if file exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $filename = $row['file_name'];
    $filetype = $row['type'];
    $filedata = $row['file_path'];

    // Output the file directly based on its type
    if (strpos($filetype, 'image') !== false) {
        // Display image
        echo "<img src=\"$filedata\" alt=\"$filename\">";
    } else {
        // For other file types, use a generic approach
        echo "<iframe src=\"$filedata\" style=\"width: 100%; height: 100%;\" frameborder=\"0\"></iframe>";
    }
} else {
    echo "File not found";
}

$stmt->close();
$conn->close();
?>
