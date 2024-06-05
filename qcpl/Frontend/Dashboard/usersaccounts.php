
<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>

    <!-- Styles -->
    <link rel="shortcut icon" type="image/x-icon" href="imgs/logo.png">
    <link rel="stylesheet" href="style.css">
</head>

<body>
         <!-- =============== Navigation ================ -->
  <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="img">
                            <img src="imgs/logo.png" >
                        </span>
                        <span class="title">Quezon City Public Library</span>
                    </a>
                </li>
                
                <li>
                    <a href="dash.php" class="dropdown-toggle">
                    <span class="icon">
                    <ion-icon name="apps"></ion-icon>
                    </span>
                    <span class="title">Dashboard<ion-icon id="dash_down_btn" name="caret-down-outline"></ion-icon></span>
                    </a>
                    

                         <li class="sub_dash"><a href="incoming.php">Incoming</a></li>
                         <li class="sub_dash"><a href="outgoing.php">Outgoing</a></li>
                
                </li>
         
                <li>
                    <a href="user.php">
                        <span class="icon"><ion-icon name="people"></ion-icon></span>
                        <span class="title">Accounts<ion-icon id="acct_down_btn" name="caret-down-outline"></ion-icon></span>
                        
                    </a>

                         <li class="sub_dash"><a href="usersaccounts.php">Users</a></li>
                         <li class="sub_dash"><a href="adminsaccounts.php">Admins</a></li>
                         <li class="sub_dash"><a href="boss1accounts.php">Boss 1</a></li>
                         <li class="sub_dash"><a href="boss2accounts.php">Boss 2</a></li>
                    </a>
                </li>


                <li>
                    <a href="doc.html">
                        <span class="icon">
                            <ion-icon name="add-circle"></ion-icon>
                        </span>
                        <span class="title">Upload Document</span>
                    </a>
                </li>

                <li>
                    <a href="adduser.html">
                        <span class="icon">
                            <ion-icon name="person-add"></ion-icon>
                        </span>
                        <span class="title" >Add Account</span>
                    </a>
                </li>


                <li>
                    <a href="/qcpl/Backend/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
            
        </div>

        <!-- Main Content -->
        <div class="main">
            <div class="topbar">
                <div class="toggle"><ion-icon name="menu-outline"></ion-icon></div>

                <div class="user"><span class="icon"><ion-icon name="person"></ion-icon></span></div>
            </div>

            <!-- Document Summary -->
            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>USER</h2>

                        <div class="accts_user">
                        <?php
$rowsPerPage = 4;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $rowsPerPage;
$sql = "SELECT id, name, division, username, password FROM users LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $rowsPerPage, $offset);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table aria-describedby='user-table'>";
    echo "<tr><th>ID</th><th>Name</th><th>Division</th><th>Username</th><th>Password</th><th colspan='2'>Action</th></tr>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["division"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
        echo "<td>" . str_repeat("*", strlen($row["password"])) . "</td>";
        echo "<td id='us_edit'><a href='/qcpl/Backend/updateuseraccount.php?id=" . htmlspecialchars($row["id"]) . "'>Edit</a></td>";
        echo "<td id='us_delete'><a href='#' onclick='confirmDelete(" . htmlspecialchars($row["id"]) . ")'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    $prevPage = $page - 1;
    if ($prevPage > 0) {
        echo "<a href='?page=$prevPage' id='prev'><ion-icon name='arrow-back-circle'></ion-icon></a>";
    }
    $nextPage = $page + 1;
    echo "<a href='?page=$nextPage' id='next'><ion-icon name='arrow-forward-circle-sharp'></ion-icon></a>";
} else {
    echo "<script>alert('No User Account found!'); window.location.href = '?page=1';</script>";
}

$conn->close();
?>

<script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        window.location.href = '/qcpl/Backend/deleteaccount.php?id=' + id;
    }
}
</script>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="main.js"></script>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
    