<div class="container">
<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$owner = "user";

$sql = "SELECT * FROM fileupload WHERE owner = '$owner'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    echo "<table>";
    echo "<tr><th>Owner</th><th>Division</th><th>Section</th><th>Category</th><th>Locator Number</th><th>Received Date</th><th>Received From</th><th>Type</th><th>File</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" ."<center>". $row["owner"] . "</td>";
        echo "<td>" ."<center>". $row["division"] . "</td>";
        echo "<td>" ."<center>". $row["section"] . "</td>";
        echo "<td>" ."<center>". $row["category"] . "</td>";
        echo "<td>" ."<center>". $row["locator_num"] . "</td>";
        echo "<td>" ."<center>". $row["received_date"] . "</td>";
        echo "<td>" ."<center>". $row["received_from"] . "</td>";
        echo "<td>" ."<center>". $row["type"] . "</td>";
        echo "<td><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_blank'>View File</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<script>alert('No document found!');</script>";
}

$conn->close();
?>
</div>