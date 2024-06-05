<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qcpl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, username FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Username: " . $row["username"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
