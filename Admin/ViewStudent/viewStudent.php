<?php
session_start();

if(!isset($_SESSION['admin_login_id'])){
    header('Location: ../../admin_login.php');
    exit;
}


require '../../config.php';
$code = null;

if(isset($_GET['code']))
{
  $code = $_GET['code'];
  $_SESSION['code'] = $code;
}
else {
  $code = $_SESSION['code'];
}


$sql = " SELECT * FROM register WHERE problem = '$code'; ";
$sqll = mysqli_query($link,$sql);
$count = 0;
if($sqll->num_rows > 0)
{

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <meta name="author" content="Shrithik" />
    <link rel="stylesheet" href="viewStudents.css" />
    <link rel="icon" type="image/x-icon" href="../.././Asserts./Images/logo.png" >
    <link rel="stylesheet" href="../../footer.css">
    <title>BIT HACK | ADMIN</title>
  </head>
  <body>
  <div class="header">
        <div>
            <img class="Logo" src="../../Asserts/Images/bitFullLogo.webp" alt="BIT Full Logo">
        </div>
        <div class="navBar">
            <a href="../Home/home.php" class="active">HOME</a>
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
                    <a href="../Home/home.php" >HOME</a>
                </div>
                <div>
                    <a href="../Category/category.php" class="active" >PROBLEM-STATEMENTS</a>
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
    
    <!-- HEAD END -->
    <div class="body">
      <div class="title"><?php echo $code ?></div>
      <div class="tabel"> 
          <div class="grid-container-body tabelHead">
            <div class="grid-item-head snn">S.NO</div>
            <div class="grid-item-head">TEAM</div>
              <div class="grid-item-head">ROLL_NO</div>
              <!-- <div class="grid-item-head">DESCRIPTION</div> -->
              <div class="grid-item-head">EMAIL</div>
              <div class="grid-item-head">PHONE_NO</div>
            </div>
          <div >
          <?php while($row = $sqll->fetch_assoc()) { 
            $count = $count + 1; ?>
            <form <?php if($count % 2 == 0) { ?> style="background-color: #F0F0F0" <?php } ?> class="grid-container-body tabelBody" method="GET" action="../ViewStudent/viewStudent.php">
              <?php
                $code = $row['problem'];
                $name = $row['namee'];
                $email = $row['email'];
                $team_name = $row['team_name'];
                $s = " SELECT * FROM student_details WHERE email = '$email'; ";
                $ss = mysqli_query($link,$s);
                $row = $ss->fetch_assoc();
                $phone_no = $row['phone_number'];
                $roll_no = $row['roll_no'];
                ?>
              <div class="grid-item sNo snn"><?php echo $count ?></div>
              <div class="grid-item topic"><?php echo $team_name ?></div>
              <div class="grid-item topic" > <?php echo $roll_no ?> </div>
              <!-- <div class="grid-item description" >description description description description description description description description description description </div> -->
              <div class="grid-item topic"><?php echo $email ?></div>
              <div class="grid-item topic"><?php echo $phone_no ?></div>
              
            </form>
            <?php } ?>
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
        document.getElementById("footerNav").style.display="none";
    }
    function closeMenu(){
        document.getElementById("navList").style.display="none";
        document.getElementById("proBar").style.display="flex";
    }

    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>
</html>

<?php } ?>
