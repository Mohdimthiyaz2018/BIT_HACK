<?php
require '../../config.php';

if(!isset($_SESSION['login_id'])){
    header('Location: ../Login/login.php');
    exit;
}

$id = $_SESSION['login_id'];

$get_user = mysqli_query($db_connection, "SELECT * FROM `users` WHERE `google_id`='$id'");

if(mysqli_num_rows($get_user) > 0){
    $user = mysqli_fetch_assoc($get_user);
}
else{
    header('Location: ../../logout.php');
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
    <link rel="stylesheet" href="domain.css">
    <title>SkillsBIT</title>
</head>
<body>
    <div class="header">
        <div>
            <img class="Logo" src="../../Asserts/Images/bitFullLogo.webp" alt="BIT Full Logo">
        </div>
        <div class="navBar">
                <a href="../Home/home.php" >HOME</a>
                <a href="#about" >ABOUT</a>
                <a href="../Domain/domain.php" class="active">PROBLEM-STATEMENTS</a>
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
                    <a href="../Home/home.php">HOME</a>
                </div>
                <div>
                    <a href="#about" >ABOUT</a>
                </div>
                <div>
                    <a href="../Domain/domain.php" class="active">PROBLEM-STATEMENTS</a>
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
            <img src="<?php echo $user['profile_image']; ?>" alt="<?php echo $user['name']; ?>" class="proPic">
        </div>
        <div class="name">
            <?php echo $user['name']; ?>
        </div>
    </div>
    <!-- HEAD END -->
    <div class="body">
      <div class="title">CHOOSE DOMAIN</div>
      <div class="cards" id="cards">
        <a href="../ProblemStatement/problemStatement.php">
          <div class="card">
            <div class="cardHead">FULL STACK</div>
          </div>
        </a>
        <a href="../ProblemStatement/problemStatement.php">
          <div class="card">
            <div class="cardHead">CLOUD</div>
          </div>
        </a>
        <a href="../ProblemStatement/problemStatement.php">
          <div class="card">
            <div class="cardHead">WEB DEVELOPMENT</div>
          </div>
        </a>
        <a href="../ProblemStatement/problemStatement.php">
          <div class="card">
            <div class="cardHead">BLOCKCHAIN</div>
          </div>
        </a>
        <a href="../ProblemStatement/problemStatement.php">
          <div class="card">
            <div class="cardHead">NLP</div>
          </div>
        </a>
        <a href="../ProblemStatement/problemStatement.php">
          <div class="card">
            <div class="cardHead">QT</div>
          </div>
        </a>
        <a href="../ProblemStatement/problemStatement.php">
          <div class="card">
            <div class="cardHead">ML/DL</div>
          </div>
        </a>
        <a href="../ProblemStatement/problemStatement.php">
          <div class="card">
            <div class="cardHead">AR/VR</div>
          </div>
        </a>
        <a href="../ProblemStatement/problemStatement.php">
          <div class="card">
            <div class="cardHead">CYBER SECURITY</div>
          </div>
        </a>
      </div>
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