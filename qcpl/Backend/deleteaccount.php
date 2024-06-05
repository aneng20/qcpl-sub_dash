<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";
$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $roles = ['users', 'admins', 'boss1', 'boss2'];
    $deleted = false;

    foreach ($roles as $role) {
        $query = "SELECT * FROM $role WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $deleteQuery = "DELETE FROM $role WHERE id = ?";
            $deleteStmt = $conn->prepare($deleteQuery);
            $deleteStmt->bind_param("i", $id);
            $deleteStmt->execute();

            if ($deleteStmt->affected_rows > 0) {
                $deleted = true;
                break;     
             }
        }
    }

    if ($deleted) {
        echo "<script>alert('You have deleted the Account.'); window.location.href='/qcpl/Frontend/Dashboard/user.php';</script>";
        exit();
    } else {
        echo "<script>alert('No record found with ID: $id'); window.history.back();</script>";
        exit();
    }
}
?>