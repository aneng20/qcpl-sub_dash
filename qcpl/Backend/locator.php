<?php
if(isset($_GET['find'])) {
    $locator = $_GET['locator'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "qcpl";

    $conn = new mysqli($server, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM fileupload WHERE locator_num = '$locator'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('File was Found!');</script>";

        while($row = $result->fetch_assoc()) {
            echo "Filename: " . $row["file_name"].  "<br>Division: " . $row["division"]. 
            "<br> Section: " . $row["section"] . "<br>Category: " . $row["category"]. "<br>Locator Number: " . $row["locator_num"].
            "<br>Received Date: " . $row["received_date"] ."<br>Received From: " . $row["received_from"]. "<br>Subject: " . $row["subject"].
            "<br>Description: " . $row["description"]. "<br>Type: " . $row["type"]. "<br>File: <a href='/qcpl/Backend/".$row["file_path"]."' target='_blank'>View File</a>". $row["status"];
        }
    } else {
        echo "<script>alert('No document found!'); window.location='/qcpl/Frontend/Dashboard/dash.php';</script>";
    }
    $conn->close();
}
?>
