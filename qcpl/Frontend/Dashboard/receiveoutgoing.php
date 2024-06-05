<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

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
                    <a href="receiving.php" class="dropdown-toggle">
                    <span class="icon">
                    <ion-icon name="apps"></ion-icon>
                    </span>
                    <span class="title">Dashboard<ion-icon id="dash_down_btn" name="caret-down-outline"></ion-icon></span>
                    </a>
                    

                         <li class="sub_dash"><a href="receiveincoming.php">Incoming</a></li>
                         <li class="sub_dash"><a href="receiveoutgoing.php">Outgoing</a></li>
                
                </li>
                <li>
                    <a href="uploadincoming.php" class="dropdown-toggle">
                    <span class="icon">
                    <ion-icon name="add-circle"></ion-icon>
                    </span>
                    <span class="title">Upload Document<ion-icon id="dash_down_btn" name="caret-down-outline"></ion-icon></span>
                    </a>
                    

                         <li class="sub_dash"><a href="uploadincoming.php">Incoming</a></li>
                         <li class="sub_dash"><a href="uploadoutgoing.php">Outgoing</a></li>
                
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
                        <h2>INCOMING</h2>
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

                    $rowsPerPage = 4;
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                    $offset = ($page - 1) * $rowsPerPage;

                    $sql = "SELECT * FROM fileupload WHERE category = 'Outgoing' LIMIT ? OFFSET ?";
                    $stmt = $conn->prepare($sql);
                    if (!$stmt) {
                        die("Error preparing statement: " . $conn->error);
                    }
                    $stmt->bind_param("ii", $rowsPerPage, $offset);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {                    
                        echo "<table>";
                        echo "<tr><th>Division</th><th>Section</th><th>Locator Number</th><th>Received Date</th><th>Received From</th><th>File type</th><th>File</th><th>Status</th></tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . "<center>" . $row["division"] . "</td>";
                            echo "<td>" . "<center>" . $row["section"] . "</td>";
                            echo "<td>" . "<center>" . $row["locator_num"] . "</td>";
                            echo "<td>" . "<center>" . $row["received_date"] . "</td>";
                            echo "<td>" . "<center>" . $row["received_from"] . "</td>";
                            echo "<td>" . "<center>" . $row["type"] . "</td>";
                            echo "<td id ='file'><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_blank'><center>View File</a></td>";
                            echo "<td id ='status'>" . "<center>" . $row["status"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";

                        $prevPage = $page - 1;
                        if ($prevPage > 0) {
                            echo "<a href='?page=$prevPage' id='prev'><ion-icon name='arrow-back-circle'></ion-icon></a>";
                        }
                        $nextPage = $page + 1;
                        echo "<a href='?page=$nextPage' id='next' > <ion-icon name='arrow-forward-circle-sharp'></ion-icon></a>";
                    } else {
                        echo "<script>alert('No documents found in the Outgoing category.'); window.location.href = 'receiving.php';</script>";
                    }

                    $stmt->close();
                    $conn->close();
                    ?>
            <div class ="summary">
            
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
       