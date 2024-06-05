<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";
$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$output = '';

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = $conn->real_escape_string($_GET['name']);

    $sql = "SELECT id, name, division, 'User' as role FROM users WHERE name LIKE ?
            UNION
            SELECT id, name, division, 'Admin' as role FROM admins WHERE name LIKE ?
            UNION
            SELECT id, name, division, 'Boss1' as role FROM boss1 WHERE name LIKE ?
            UNION
            SELECT id, name, division, 'Boss2' as role FROM boss2 WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$name%";
    $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $output .= "<table><tr><th>Name</th><th>Division</th><th>Role</th><th>Details</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr><td>" . htmlspecialchars($row['name']) . "</td>";
            $output .= "<td>" . htmlspecialchars($row['division']) . "</td>";
            $output .= "<td>" . htmlspecialchars($row['role']) . "</td>";
            $output .= "<td><a href='info.php?id=" . $row['id'] . "'>View Details</a></td></tr>";
        }
        $output .= "</table>";
    } else {
        $output = "No accounts found with the name '$name'.";
    }
    $stmt->close();
} else {
    $output = "Please enter a name to search.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="/path/to/your/css/style.css">
</head>
<body>
    <h1>Search Results</h1>
    <?php echo $output; ?>
</body>
</html>