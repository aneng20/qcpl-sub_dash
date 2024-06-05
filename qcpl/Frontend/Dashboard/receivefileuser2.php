<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qcpl";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM testupload ORDER BY ID DESC"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>List of Files:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        $fileName = $row["filename"];
        $filePath = $row["filepath"];
        echo "<li><a href='receivefileuser2.php?file=$filePath'>$fileName</a></li>";
    }
    echo "</ul>";
} else {
    echo "No files found.";
}

if(isset($_GET['file'])) {
    $filePath = $_GET['file'];
    if (file_exists($filePath)) {
        $fileName = basename($filePath);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . $fileName);
        readfile($filePath);
        exit();
    } else {
        echo "File not found.";
    }
}

$conn->close();
?>
