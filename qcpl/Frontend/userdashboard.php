<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- ======= Styles ====== -->
    <link rel="shortcut icon" type="image/x-icon" href="img/Logo.png">
    <link rel="stylesheet" href="userdashboard.css">
</head>
<body>

     <!-- =============== Navigation ================ -->
     <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="img">
                            <img src="img/Logo.png" >
                        </span>
                        <span class="title">Quezon City Public Library</span>
                    </a>
                </li>
                
                <li>
                    <a href="userdashboard.php">
                        <span class="icon">
                            <ion-icon name="documents-outline"></ion-icon>
                        </span>
                        <span class="title">Document</span>
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

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                
            <form action="/qcpl/Backend/locator.php" method="GET">
                <div class="search">
                    <label>
                        <input type="number" name="locator" placeholder="Search here">
                        <input type="submit" id="sub_hide" name="find">
                        <ion-icon name="search-outline" name="locate"></ion-icon>
                    </label>
                </div>
            </form>
               

                <div class="user">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>DOCUMENTS</h2>   
                        </div>
                    <div class="sum_tb">
                        <table aria-describedby="tableDescription">
                            <?php
                            $server = "localhost";
                            $username = "root";
                            $password = "";
                            $db = "qcpl";
                            
                            $conn = new mysqli($server, $username, $password, $db);
                            
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            
                            $sql = "SELECT division, section, category, locator_num, received_date, received_from, file_path, type, status FROM fileupload WHERE status = 'Processing'";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) { 
                                echo "<table>";
                                echo "<tr><th>Division</th><th>Section</th><th>Category</th><th>Locator Number</th><th>Received Date</th><th>Received From</th><th>Type</th><th>File</th><th>Status</th></tr>";
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" ."<center>". $row["division"] . "</td>";
                                    echo "<td>" ."<center>". $row["section"] . "</td>";
                                    echo "<td>" ."<center>". $row["category"] . "</td>";
                                    echo "<td>" ."<center>". $row["locator_num"] . "</td>";
                                    echo "<td>" ."<center>". $row["received_date"] . "</td>";
                                    echo "<td>" ."<center>". $row["received_from"] . "</td>";
                                    echo "<td>" ."<center>". $row["type"] . "</td>";
                                    echo "<td><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_blank'>View File</a></td>";
                                    echo "<td>" . "<center>" . $row["status"] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "<script>alert('No document found!');</script>";
                            }
                            
                            $conn->close();
                            ?>
                    </div> 
                </div>
               
    <!-- =========== Scripts =========  -->
    <script src="main.js"></script>

    <script>
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.focus("hovered")

  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};</script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>