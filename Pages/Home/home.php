<?php
session_start();
require '../../config.php';

if(!isset($_SESSION['login_id'])){
    header('Location: ../../index.php');
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
    <link rel="stylesheet" href="../../footer.css">
    <link rel="icon" type="image/x-icon" href="../.././Asserts/Images/logo.png" >
    <title>BIT HACK</title>
</head>
<body>
    <div class="header">
        <div>
            <img class="Logo" src="../../Asserts/Images/bitFullLogo.webp" alt="BIT Full Logo">
        </div>
        <div class="navBar">
            <a href="" class="active">HOME</a>
            <a href="#about" >ABOUT</a>
            <a href="../Category/category.php" >PROBLEM-STATEMENTS</a>
            <a href="../Profile/profile.php" >PROFILE</a>
            <a href="../../logout.php" class="login">LOG OUT</a>
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
                    <a href="#about" >ABOUT</a>
                </div>
                <div>
                    <a href="../Category/category.php" >PROBLEM-STATEMENTS</a>
                </div>
                <div>
                    <a href="../Profile/profile.php" >PROFILE</a>
                </div>
                <div>
                    <a href="../../logout.php" class="login">LOG OUT</a>
                </div>
            </div>
        </div>
    </div>
    
       
        <div class="proBar" id="proBar">
            <div>
                <img src="<?php echo $_SESSION['user_image']; ?>" class="proPic">
            </div>
            <div class="name">
                <?php echo $_SESSION['name']; ?>
            </div>
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
    
    <div class="about1" id="about">
        <div class="sabout1">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/66839671-aed8-4dde-8c41-672f3bce64ee/nujus5L8rV.json" background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
        </div>
        <div class="sabout2">
        </div>
        <div class="sabout3">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/c718eaee-740e-4ad0-be54-6e8cbd7e0bfe/Mt2S9vX90h.json" background="##FFFFFF" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>        </div>
    </div>

    </div>

    <footer>
       <div class="footerContainer">
            <div class="footerTitle">
                <h1>BIT HACK</h1>
            </div>
            <div class="footerNav" id="footerNav">
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="../Category/category.php">PROBLEM STATEMENT</a></li>
                    <li><a href="">ABOUT</a></li>
                    <li><a href="../Profile/profile.php">PROFILE</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <span class="copyRight">Copyright © 2023 &nbsp - &nbsp </span><a class="copyRight" target="_blank" href="https://www.linkedin.com/in/mohamed-imthiyaz-1600qaqw?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">MOHAMED IMTHIYAZ A</a><span class="copyRight"> &nbsp & &nbsp </span><a class="copyRight" href="">SHRITHIK A </a> 
        </div>
    </footer>
    
</body>
<script>
    function dispMenu(){
        document.getElementById("navList").style.display="grid";
        document.getElementById("proBar").style.display="none";
        document.getElementById("footerNav").style.display="none";
    }
    function closeMenu(){
        document.getElementById("navList").style.display="none";
        document.getElementById("proBar").style.display="flex";
        document.getElementById("footerNav").style.display="initial";
    }
</script>
</html>