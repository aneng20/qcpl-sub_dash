<?php
session_start();
if(isset($_POST["login"])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "qcpl";

    $conn = new mysqli($server, $username, $password, $db);

    if($conn->connect_error) {
        die("Failed to connect: " . $conn->connect_error);
    }

    $query = "SELECT * FROM admins WHERE BINARY username = ? AND BINARY password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $_SESSION["name"] = "Admin"; 
        $_SESSION["role"] = "admin";
        $_SESSION["division"] = $admin['division']; 
        echo "<script>alert('Successfully Login as Admin'); window.location='/qcpl/Frontend/Dashboard/dash.php';</script>";
    } else {
        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION["name"] = $user['name']; 
            $_SESSION["role"] = "user";
            $_SESSION["division"] = $user['division']; 
            echo "<script>alert('Successfully Login as User'); window.location='/qcpl/Frontend/userdashboard.php';</script>";
        } else {
            
            $query = "SELECT * FROM boss1 WHERE username = ? AND password = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0) {
                $boss1 = $result->fetch_assoc();
                $_SESSION["name"] = $_POST['username']; 
                $_SESSION["role"] = "boss1"; 
                $_SESSION["division"] = $boss1['division']; 
                echo "<script>alert('Successfully Login as Boss1'); window.location='/qcpl/Frontend/Dashboard/boss1account.php';</script>";
            } else {
               
                $query = "SELECT * FROM receiving WHERE username = ? AND password = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0) {
                    $boss2 = $result->fetch_assoc();
                    $_SESSION["name"] = $_POST['username']; 
                    $_SESSION["role"] = "receiving"; 
                    $_SESSION["division"] = $receiving['division']; 
                    echo "<script>alert('Successfully Login as Receiving'); window.location='/qcpl/Frontend/Dashboard/receiving.php';</script>";
                }else {
               
                $query = "SELECT * FROM boss2 WHERE username = ? AND password = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0) {
                    $boss2 = $result->fetch_assoc();
                    $_SESSION["name"] = $_POST['username']; 
                    $_SESSION["role"] = "boss2"; 
                    $_SESSION["division"] = $boss2['division']; 
                    echo "<script>alert('Successfully Login as Boss2'); window.location='/qcpl/Frontend/Dashboard/boss2account.php';</script>";
                } else {
                    echo "<script>alert('Incorrect Username or Password'); window.location='/qcpl/Frontend/login.html';</script>";
                }
            }
        }
    }

    $stmt->close();
    $conn->close();
}
}
?>