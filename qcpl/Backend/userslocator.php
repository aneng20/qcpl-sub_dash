<?php
if(isset($_GET['find'])) {
    $finds = $_GET['id'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "qcpl";

    $conn = new mysqli($server, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE id = '$finds'
        UNION
        SELECT * FROM admins WHERE id = '$finds'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Account Found!');</script>"; 
    
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. "<br>Name: " . $row["name"]. "<br>Username: " . $row["username"]. 
            "<br>Password: " . $row["password"] . "<br>";
        }
    } else {
        echo "<script>alert('Account not found!'); window.location='/qcpl/Frontend/Dashboard/user.php';</script>";
    }
    $conn->close();
}
?>
