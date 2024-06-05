<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>

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
                            <img src="imgs/logo.png" >
                        </span>
                        <span class="title">Quezon City Public Library</span>
                    </a>
                </li>
                
                <li>
                    <a href="boss1account.php">
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
                 
        <?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qcpl";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$locatorNum = isset($_GET['locator_num']) ? $_GET['locator_num'] : 'Not provided';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Locator Number</title>
</head>
<body>

<?php
echo "<h1>Locator Number: $locatorNum</h1>";
?>

<form action="/qcpl/Backend/boss1backend.php" method="POST">
    <input type="hidden" name="locator_num" value="<?php echo htmlspecialchars($locatorNum); ?>">
    <select name="division" id="division" required onchange="updateSubdivision()">
        <option value="">Select Division</option>
        <option value="Readers Service Division">Readers Services Division</option>
        <option value="Technical Division">Technical Division</option>
        <option value="Library Extension Division">Library Extension Division</option>
        <option value="Publication Division">Publication Division</option>
        <option value="Administrative Services">Administrative Services</option>
        <option value="District Libraries Division">District Libraries Division</option>
    </select>
    <br>

    <div id="subdivisionOptions" style="display: none;">
        <label>Section: </label>
        <select name="section" id="subdivision" required>
        </select>
    </div>

    <script>
        function updateSubdivision() {
            var division = document.getElementById("division").value;
            var subdivisionOptions = document.getElementById("subdivisionOptions");

            if (division === "") {
                subdivisionOptions.style.display = "none";
                return;
            }

            subdivisionOptions.style.display = "block";

            var subdivisionSelect = document.getElementById("subdivision");

            subdivisionSelect.innerHTML = "";

            switch (division) {
                case "Readers Service Division":
                    subdivisionSelect.add(new Option("Reference Section"));
                    subdivisionSelect.add(new Option("Filipiniana, Local History and Archives Section"));
                    subdivisionSelect.add(new Option("Law Research Section"));
                    subdivisionSelect.add(new Option("Periodical Section"));
                    subdivisionSelect.add(new Option("Childrens Section"));
                    subdivisionSelect.add(new Option("Management Information System Section"));
                    break;
                case "Technical Division":
                    subdivisionSelect.add(new Option("Collection Development"));
                    subdivisionSelect.add(new Option("Cataloging Section"));
                    subdivisionSelect.add(new Option("Binding and Preservation Section"));
                    break;
                case "Library Extension Division":
                    subdivisionSelect.add(new Option("Recreational"));
                    subdivisionSelect.add(new Option("Outreach"));
                    subdivisionSelect.add(new Option("Puppeteers"));
                    break;
                case "Publication Division":
                    subdivisionSelect.add(new Option("Publishing Section"));
                    subdivisionSelect.add(new Option("Marketing Section"));
                    break;
                case "Administrative Services":
                    subdivisionSelect.add(new Option("No Section"));
                    break;
                case "District Libraries Division":
                    subdivisionSelect.add(new Option("Branch Libraries"));
                    break;
                default:
                    break;
            }
        }
    </script>
    <br>

    <textarea id="comment" name="comment" rows="4" cols="50" required> </textarea>
    <br><br>
    
    <label>Status: </label>
    <input type="radio" id="pending" name="status" value="pending" required>
    <label for="pending">Pending</label>
    <input type="radio" id="processing" name="status" value="processing">
    <label for="processing">Processing</label>
    <input type="radio" id="completed" name="status" value="completed">
    <label for="completed">Completed</label><br>

    <button type="submit" name="submit" id="button">
    <ion-icon name="send-sharp"></ion-icon></button>
    

    
</form>

</div>             
    <!-- =========== Scripts =========  -->
    <script src="main.js"></script>

    <script>// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.focus("hovered")

  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

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