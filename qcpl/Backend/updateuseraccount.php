<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $query = "UPDATE users SET name=?, username=?, password=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $name, $username, $password, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Account updated successfully.');</script>";
        header("Location: /qcpl/Frontend/Dashboard/usersaccounts.php"); 
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            color: #0277bd; 
        }
        p {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #01579b; 
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #81d4fa;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #0288d1;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0277bd;
        }
    </style>
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to update this user?");
        }
    </script>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return confirmUpdate();">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>">
        </p>
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $user['username']; ?>">
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?php echo $user['password']; ?>">
        </p>
        <input type="submit" value="Update User">
    </form>
</body>
</html>
