<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- ======= Styles ====== -->
    <link rel="shortcut icon" type="image/x-icon" href="imgs/logo.png">
    <link rel="stylesheet" href="boss1.css">
</head>

<body>

    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="img">
                            <img src="imgs/logo.png">
                        </span>
                        <span class="title">Quezon City Public Library</span>
                    </a>
                </li>
                

                <li>
                    <a href="boss1account.php" class="dropdown-toggle">
                    <span class="icon">
                    <ion-icon name="documents-outline"></ion-icon>
                    </span>
                    <span class="title">Documents<ion-icon id="dash_down_btn" name="caret-down-outline"></ion-icon></span>
                         <li class="sub_dash"><a href="boss1incoming.php">Incoming</a></li>
                         <li class="sub_dash"><a href="boss1outgoing.php">Outgoing</a></li>
                         </a>
                
                </li>

                    <a href="/qcpl/Backend/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <form action="/qcpl/Backend/locator.php" method="GET">

                <div class="user">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>INCOMING</h2>
                    </div>
                    <div class="sum_tb">
                        <table aria-describedby="tableDescription">
                            <thead>
                                <tr>
                                    <th><center>Category</center></th>
                                    <th><center>Locator Number</center></th>
                                    <th><center>Received Date</center></th>
                                    <th><center>Received From</center></th>
                                    <th><center>Boss2 Comment</center></th>
                                    <th><center>Type</center></th>
                                    <th><center>File</center></th>
                                    <th><center>Status</center></th>
                                    <th><center>Action</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qcpl";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT category, locator_num, received_date, received_from, type, file_path, boss2_comment, status FROM fileupload WHERE status = 'Processing' AND category = 'Incoming'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["category"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["locator_num"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["received_date"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["received_from"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["boss2_comment"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["type"]) . "</td>";
        echo "<td><a href='/qcpl/Backend/" . htmlspecialchars($row["file_path"]) . "' target='_blank' aria-label='View file for " . htmlspecialchars($row["locator_num"]) . "'>View File</a></td>";
        echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
        echo "<td><a href='bossaccountlocator.php?locator_num=" . htmlspecialchars($row["locator_num"]) . "' target='_self' aria-label='View details for " . htmlspecialchars($row["locator_num"]) . "'>View</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}

$conn->close();
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="main.js"></script>
    <script>
        let list = document.querySelectorAll(".navigation li");

        function activeLink() {
            list.forEach((item) => {
                item.classList.remove("hovered");
            });
            this.classList.add("hovered");
        }

        list.forEach((item) => item.addEventListener("mouseover", activeLink));

        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");

        toggle.onclick = function() {
            navigation.classList.toggle("active");
            main.classList.toggle("active");
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>