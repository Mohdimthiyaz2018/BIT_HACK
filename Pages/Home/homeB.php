<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Shrithik">
    <link rel="stylesheet" href="homeB.css">
    <title>SkillsBIT</title>
</head>
<body>
    <div class="header">
        <div>
            <img class="Logo" src="../../Asserts/Images/bitFullLogo.webp" alt="BIT Full Logo">
        </div>
        <div class="navBar">
                <a href="../Home/homeB.php" class="active">HOME</a>
                <a href="#" >ABOUT</a>
                <a href="../Login/login.php" class="login">LOGIN / REGISTER</a>
        </div>
        <div class="navMenu">
            <img src="../../Asserts/Images/menuIcon.png" alt="Menu" width="30px" onclick="dispMenu()">
            <div class="navList" id="navList">
                <div>
                    <img src="../../Asserts/Images/closeIcon.png" alt="Close" width="30px" onclick="closeMenu()">
                </div>
                <div>
                    <a href="../Home/homeA.php" class="active">HOME</a>
                </div>
                <div>
                    <a href="#" >ABOUT</a>
                </div>
                <div>
                <a href="../Login/login.php" class="login">LOGIN / REGISTER</a>
                </div>
            </div>
        </div>
    </div>
    <!-- HEAD END -->
    <div class="body">
      <span id="S">S</span>
      <span id="K">K</span>
      <span id="I">I</span>
      <span id="L">L</span>
      <span id="L">L</span>
      &nbsp;&nbsp;
      <span id="B">B</span>
      <span id="I">I</span>
      <span id="T">T</span>
    </div>
</body>
<script>
    function dispMenu(){
        document.getElementById("navList").style.display="grid";
    }
    function closeMenu(){
        document.getElementById("navList").style.display="none";
    }
</script>
</html>