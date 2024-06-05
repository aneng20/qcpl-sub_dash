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
    $query = "UPDATE boss2 SET name=?, username=?, password=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $name, $username, $password, $id);
    if ($stmt->execute()) {
        echo "Boss2 updated successfully.";
        header("Location: /qcpl/Frontend/Dashboard/boss2accounts.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM boss2 WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $boss2 = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Boss2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa; /* Light blue background */
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
            color: #0277bd; /* Dark blue heading */
        }
        p {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #01579b; /* Medium blue label */
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #81d4fa; /* Light blue border */
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #0288d1; /* Blue button */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0277bd; /* Darker blue on hover */
        }
    </style>
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to update this Boss2?");
        }
    </script>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return confirmUpdate();">
        <input type="hidden" name="id" value="<?php echo $boss2['id']; ?>">
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $boss2['name']; ?>">
        </p>
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $boss2['username']; ?>">
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?php echo $boss2['password']; ?>">
        </p>
        <input type="submit" value="Update Boss2">
    </form>
</body>
</html>
