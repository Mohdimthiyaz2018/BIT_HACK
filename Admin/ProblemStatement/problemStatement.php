<?php
session_start();

if(!isset($_SESSION['admin_login_id'])){
    header('Location: ../../admin_login.php');
    exit;
}


require '../../config.php';
$str = null;

if(isset($_POST['domain']))
{
  $str = $_POST['domain'];
  $_SESSION['domain'] = $str;
}
else {
  $str = $_SESSION['domain'];
}


$domain =  str_replace(" ","_",$str);
$domain =  str_replace("/","_",$domain);
$domain = strtolower($domain);

$sql = " SELECT * FROM $domain ";
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
    <link rel="stylesheet" href="problemStatements.css" />
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
            <a href="../Domain/domain.php" >PROBLEM-STATEMENTS</a>
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
                    <a href="../Domain/domain.php" class="active" >PROBLEM-STATEMENTS</a>
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
      <div class="title">PROBLEM STATEMENTS</div>
      <div class="tabel"> 
          <div class="grid-container-body tabelHead">
            <div class="grid-item-head">PROBLEM CODE</div>
              <div class="grid-item-head">TOPIC</div>
              <!-- <div class="grid-item-head">DESCRIPTION</div> -->
              <div class="grid-item-head">REGISTERED</div>
              <div class="grid-item-head"></div>
            </div>
          <div >
          <?php while($row = $sqll->fetch_assoc()) { 
            $count = $count + 1; ?>
            <form <?php if($count % 2 == 0) { ?> style="background-color: #F0F0F0" <?php } ?> class="grid-container-body tabelBody" method="GET" 
            <?php if(isset($_SESSION['dean'])) { ?> action="../ViewProblem/viewProblem.php" <?php } else { ?> action="../ViewStudent/viewStudent.php" <?php } ?> >

              <?php
                $code = $row['PROBLEM_CODE'];
                $title = $row['TITLE'];
                $desc = $row['DESCRIPTION'];
                $desc =  str_replace(" ","_",$desc);
                $intern = $row['INTERN'];
                $intern_id = $row['INTERN_MAIL_ID'];
                $intern =  str_replace(" ","_",$intern);
                $count1 = $row['COUNTT'];
                ?>
              <div class="grid-item sNo"><?php echo $code ?></div>
              <div class="grid-item topic" > <?php echo $title; $title =  str_replace(" ","_",$title); ?> </div>
              <!-- <div class="grid-item description" >description description description description description description description description description description </div> -->
              <div class="grid-item "><?php echo $count1 ?></div>
              <div class="grid-item">
                <center>
                <input type="hidden" name="domain" value = <?php echo $domain ?> >
                  <input type="hidden" name="code" value = <?php echo $code ?> >
                  <input type="hidden" name="title" value = <?php echo $title ?> >
                  <input type="hidden" name="desc" value = <?php echo $desc ?> >
                  <input type="hidden" name="intern" value = <?php echo $intern;  ?> >
                  <input type="hidden" name="intern_id" value = <?php echo $intern_id ?> >
                  <input <?php if($count1 <= 0 && (!isset($_SESSION['dean']))) { ?> style="pointer-events: none; background-color: grey;" <?php } ?> class="button" type="submit" value="VIEW"></input>
                </center>
              </div>
              
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
                    <li><a href="../Domain/domain.php">PROBLEM STATEMENT</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <span class="copyRight">Copyright Â© 2023 &nbsp - &nbsp </span><a class="copyRight" target="_blank" href="https://www.linkedin.com/in/mohamed-imthiyaz-1600qaqw?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">MOHAMED IMTHIYAZ A</a><span class="copyRight"> &nbsp & &nbsp </span><a class="copyRight" href="">SHRITHIK A </a> 
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

    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>
</html>

<?php } ?>
