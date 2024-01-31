<?php
session_start();
require '../../config.php';

if(!isset($_SESSION['admin_login_id'])){
    header('Location: ../../admin_login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Shrithik">
    <link rel="stylesheet" href="scholars.css">
    <link rel="stylesheet" href="../../footer.css">
    <link rel="icon" type="image/x-icon" href="../.././Asserts./Images/logo.png" >
    <title>BIT HACK | ADMIN</title>
</head>
<body>
    <div class="header">
        <div>
            <img class="Logo" src="../../Asserts/Images/bitFullLogo.webp" alt="BIT Full Logo">
        </div>
        <div class="navBar">
            <a href="" class="active">HOME</a>
            <a href="../Category/category.php" >PROBLEM-STATEMENTS</a>
            <a href="../Scholar/scholar.php" >ATTENDANCE</a>
            <a href="../Logout/logout.php" style="color: white;" class="login">LOG OUT</a>
        </div>
        <div class="navMenu">
            <img src="../../Asserts/Images/menuIcon.png" alt="Menu" width="30px" onclick="dispMenu()">
            <div class="navList" id="navList">
                <div>
                    <img src="../../Asserts/Images/closeIcon.png" alt="Close" width="30px" onclick="closeMenu()">
                </div>
                <div>
                    <a href="#home" >HOME</a>
                </div>
                <div>
                    <a href="../Category/category.php" >PROBLEM-STATEMENTS</a>
                </div>
                <div>
                    <a href="../Scholar/scholar.php" >ATTENDANCE</a>
                </div>
                <div>
                    <a href="../Logout/logout.php" style="color: white;" class="login">LOG OUT</a>
                </div>
            </div>
        </div>
    </div>

    <!-- HEAD END -->
    <div class="body">
      <div class="title">CHOOSE SCHOLAR</div>
      <div class="cards" id="cards">
         <div class="card">
            <form class="cardForm" method="POST" action=".././Attendance/attendance.php">
                <div class="cardHead"><input name="scholar" class="insub" type="submit" value="HOSTELLER"></div>
            </form>
          </div>
              
          <div class="card">          
            <form class="cardForm" method="POST" action=".././Attendance/attendance.php">
                <div class="cardHead"><input name="scholar" class="insub" type="submit" value="DAYSCHOLAR"></div>
            </form>
          </div>
      </div>
    </div>
</div>
      <footer>
       <div class="footerContainer">
            <div class="footerTitle">
                <h1>BIT HACK</h1>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="../Home/home.php">HOME</a></li>
                    <li><a href="../Category/category.php">PROBLEM STATEMENT</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <span class="copyRight">Copyright © 2023 &nbsp - &nbsp </span><a class="copyRight" target="_blank" href="https://www.instagram.com/mohamedimthiyaz_/">MOHAMED IMTHIYAZ A</a><span class="copyRight"> &nbsp & &nbsp </span><a class="copyRight" href="">SHRITHIK A </a> 
        </div>
    </footer>
    
</body>
<script>
    function dispMenu(){
        document.getElementById("navList").style.display="grid";
        document.getElementById("proBar").style.display="none";
    }
    function closeMenu(){
        document.getElementById("navList").style.display="none";
        document.getElementById("proBar").style.display="flex";
    }
</script>
</html>