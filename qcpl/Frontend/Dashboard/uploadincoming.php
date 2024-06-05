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
                    <a href="#" class="dropdown-toggle">
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
                        <form action="/qcpl/Backend/fileupload.php" method="POST" enctype="multipart/form-data">

                            <label id = "lb_loc">Locator Number: </label>
                            <input id = "in_loc" type="number" name="locator_num" required><br>

                            <label id = "lb_rec">Received Date: </label>
                            <input id = "in_rec" type="datetime-local" name="received_date" required><br>
                        
                            <label id = "lb_from" for="">Received From: </label>
                            <input id = "in_from" type="text" name="received_from" required><br>

                            <label id = "lb_sub" for="">Subject: </label>
                            <input id = "in_sub" type="text" name="subject" required><br>

                            <label id = "lb_dec" for="">Description: </label>
                            <input id = "in_dec" type="text" name="description" required><br>

                            <label id="lb_filetype">File Type:</label>
                            <select name="type" id="in_sel" required>
                                <option value="" disabled selected>Select Document Format</option>
                                <option value="DOCS">Document</option>
                                <option value="PDF">Portable Document Format</option>
                                <option value="IMG">Image</option>
                            </select>
                            <br>    

                            <input id = "in_file" type="file" name="fileName"><br>
                            <input id = "in_submit" type="submit" name="incomingupload" value="Submit">
                        </form>
                    
            
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
       