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
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="sidePanels.css">
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
            <?php if(isset($_SESSION['mteam'])) { ?> <a href="../Interns/interns.php" >INTERNS</a> <?php } else {  ?>
            <a href="../Attendance/attendance.php" >ATTENDANCE</a><?php } ?>
            <a href="../Logout/logout.php" style="color: white;" class="login">LOG OUT</a>
        </div>
        <div class="navMenu">
            <img src="../../Asserts/Images/menuIcon.png" alt="Menu" width="30px" onclick="dispMenu()">
            <div class="navList" id="navList">
                <div>
                    <img src="../../Asserts/Images/closeIcon.png" alt="Close" width="30px" onclick="closeMenu()">
                </div>
                <div>
                    <a href="#home" class="active">HOME</a>
                </div>
                <div>
                    <a href="../Category/category.php" >PROBLEM-STATEMENTS</a>
                </div>
                <?php if(isset($_SESSION['mteam'])) { ?>
                <div>
                    <a href="../Interns/interns.php" >INTERNS</a>
                </div>
                <?php } else {  ?>
                <div>
                    <a href="../Attendance/attendance.php" >ATTENDANCE</a>
                </div>
                <?php } ?>
                <div>
                    <a href="../Logout/logout.php" style="color: white;" class="login">LOG OUT</a>
                </div>
            </div>
        </div>
    </div>
    <div class="proBar" id="proBar">
        <div class="name">
            <?php echo $_SESSION['name']; ?>
        </div>
    </div>
    <div class="wrapper ">
        <div class="side-panel">
            <a href="../AlterIntern/alterIntern.php"><p>ALTER</p></a>
            <a href="requestPage.php"><p>REQUEST</p></a>              
            <a href="requestDisplay.php"><p>ATTENDANCE</p></a>               
            <a href="status.php"><p>STATUS</p></a>
            
        </div>
        
        <button class="side-panel-toggle" type="button">
            <span class="material-icons sp-icon-open hr" style="color:white;">ALTER</span>
            <span class="material-icons sp-icon-close hr" style="color:white;">CLOSE</span>
        </button>
    
    </div>
    <!-- HEAD END -->
    <div class="body">
    <span id="S">B</span>
      <span id="K">I</span>
      <span id="I">T</span>
      &nbsp;&nbsp;
      <span id="L">H</span>
      <span id="L">A</span>
      <span id="B">C</span>
      <span id="I">K</span>
    </div>
    <div class="mbody">
        <div class="title">BIT HACK</div>
    </div>
    <div class="about" id="about">

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
    document.querySelector(".side-panel-toggle").addEventListener("click", () => {
    document.querySelector(".wrapper").classList.toggle("side-panel-open");
    });

</script>
</html>