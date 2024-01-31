<?php
session_start();
require '../../config.php';

if(!isset($_SESSION['admin_login_id'])){
    header('Location: ../../admin_login.php');
    exit;
}

$email = $_SESSION['email'];

$date = null;
$year = null;

if(isset($_GET['year']))
{
    $year = $_GET['year'];
}


if(isset($_GET['date']))
{
    $date = $_GET['date'];
    $sql = " SELECT * FROM students WHERE mentor = '$email' AND yearr = '$year'; ";
    $sqll = mysqli_query($link,$sql);
}



$count = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Shrithik">
    <link rel="stylesheet" href="attendances.css">
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
            <a href="../Home/home.php" >HOME</a>
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
                    <a href="../Home/home.php" class="active">HOME</a>
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
  
    <!-- HEAD END -->
    <div class="body">
        <div class="title">ATTENDANCE</div>
        <div class="cen">
            <form method="GET" action="selectProcess.php" class="cen" id="Search">
                <div class="div1">
                    <select name="date" required>
                        <?php if(isset($date)) { ?><option value="<?php echo $date ?>"><?php echo $date ?></option> <?php }?>
                        <option value="">None</option>
                        <option value="Day1">DAY 1</option>
                        <option value="Day2">DAY 2</option>
                        <option value="Day3">DAY 3</option>
                        <option value="Day4">DAY 4</option>
                    </select>
                </div>
                <div class="div1">
                    <select name="year" required>
                        <?php if(isset($year)) { ?> <option value="<?php echo $year ?>"><?php echo $year ?></option> <?php }?>
                        <option value="">None</option>
                        <option value="2027">I YEAR</option>
                        <option value="2026">II YEAR</option>
                        <option value="2025">III YEAR</option>
                        <option value="2024">IV YEAR</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="select">
            <button type="submit" form="Search" class="search">Search</button>
        </div>

        <?php if(isset($date) && isset($year) ) { ?> 
            <div class="tabel"> 
            <div class="grid-container-body tabelHead">
                <div class="grid-item-head hide">S.NO</div>
                <div class="grid-item-head hide">NAME</div>
                <div class="grid-item-head">ROLL_NO</div>
                <div class="grid-item-head">PRESENT</div>
                <div class="grid-item-head">ABSENT</div>
                <div class="grid-item-head">MARKS</div>
                <div class="grid-item-head"></div>
            </div>
            
            <div >
                <?php while($row = $sqll->fetch_assoc()) { 
                    $count = $count + 1; ?>
                    <form class="grid-container-body tabelBody" method="GET" 
                    action="attendanceProcess.php" <?php if($count % 2 == 0) { ?> style="background-color: #F0F0F0" <?php } ?>>
                        <?php
                            $email = $row['email_id'];
                            $roll_no = $row['roll_no'];
                            $yearr = $row['yearr'];
                            $name = $row['name'];
                            $marks = null;
                            $attend = null;

                            //checking either already put attendance
                            $a = " SELECT * FROM attendance WHERE student_email  = '$email' AND datee = '$date'; ";
                            $aa = mysqli_query($link,$a);

                            if($aa->num_rows > 0)
                            {
                                $row1 = $aa->fetch_assoc();
                                $marks = $row1['marks'];
                                $attend = $row1['attendance'];
                            }
                        ?>
                        <input type="hidden" name="email" value="<?php echo $email ?>" >
                        <input type="hidden" name="roll_no" value="<?php echo $roll_no ?>" >
                        <input type="hidden" name="date" value="<?php echo $date ?>" >
                        <input type="hidden" name="year" value="<?php echo $yearr ?>" >
                        <input type="hidden" name="id" value="<?php echo $count ?>" >
                        <div class="grid-item sNo hide"><?php echo $count ?></div>
                        <div class="grid-item hide"><?php echo $name ?></div>
                        <div class="grid-item " id="<?php echo $count ?>"><?php echo $roll_no ?></div>
                        <?php if(isset($attend) && $attend == 'present') { ?> 
                        <div class="grid-item "><img src="../../Asserts/Images/green_tick.png" height="30px" width="34px"></div> 
                        <div class="grid-item "></div>
                        <?php } ?>
                        <?php if(isset($attend) && $attend == 'absent') { ?> 
                        <div class="grid-item "></div>
                        <div class="grid-item "><img src="../../Asserts/Images/red_tick.png" height="30px" width="34px"></div> <?php } ?>
                        <?php if(!isset($attend)) { ?>
                        <div class="grid-item "><input required="true" type="radio" name="attend" value="present"></input></div>
                        <div class="grid-item "><input required type="radio" onchange="this.form.submit()" name="attend"  value="absent"></input></div>
                        <?php } ?>
                        <?php if(isset($marks)) { ?>
                        <div class="grid-item "><p><?php echo $marks ?></p></div> <?php } else { ?>
                        <div class="grid-item "><input onkeyup="this.value = this.value.replace(/[^0-9]/g, '')" class="marks" type="text" name="marks"></input></div><?php } ?>
                        <?php if(isset($attend)) { ?> 
                        <div class="grid-item ">
                            <center>
                                <input  class="button" type="submit" value="UPDATE"></input>
                            </center>
                        </div>
                        <?php } ?>
                    </form>
                <?php } ?>
            </div>
                
            </div>
        <?php } ?>

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
                    <li><a href="../Attendance/attendance.php" >ATTENDANCE</a></li>
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
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    <?php if (isset($_GET['val'])) { ?>
        // redirect to the appropriate hash from parameter
        document.location.hash = "<?php echo $_GET['val'] ?>";
    <?php } ?>
</script>
</html>