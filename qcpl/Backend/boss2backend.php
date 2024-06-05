<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qcpl";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $locator_num = isset($_POST['locator_num']) ? $_POST['locator_num'] : '';
    $boss2_comment = isset($_POST['comment']) ? $_POST['comment'] : ''; 
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE fileupload SET  boss2_comment='$boss2_comment', status='$status' WHERE locator_num='$locator_num'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Successfully Updated the Database!'); window.location='/qcpl/Frontend/Dashboard/boss2account.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "'); window.location='/qcpl/Frontend/Dashboard/boss2account.php';</script>";
    }

    $conn->close();
}
?>
