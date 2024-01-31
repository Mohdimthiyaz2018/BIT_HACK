<?php
session_start();
include '../../config.php';


if(!isset($_SESSION['login_id'])){
  header('Location: ../../index.php');
  exit;
}

$email = $_SESSION['email'];
$name = $_SESSION['name'];

$sql = " SELECT COUNT(*) FROM student_details WHERE email = '$email' ";
$sqll = mysqli_query($link,$sql);
  $count = 0;
  if($sqll){
    $row = mysqli_fetch_array($sqll);
    $count = $row[0];
  }

  $a = " SELECT * FROM student_details WHERE email = '$email' ";
  $aa = mysqli_query($link,$a);

  if($aa->num_rows > 0){
    while($row = $aa->fetch_assoc()){
      $name = $row['namee'];
      $roll_no = $row['roll_no'];
      $lab_name = $row['lab_name'];
      $lab_id = $row['lab_id'];
      $ph_no = $row['phone_number'];
    }
  }
    $code = 1;
    $r = " SELECT * FROM register WHERE email = '$email'; ";
    $rr = mysqli_query($link,$r);

    if($rr->num_rows > 0){
       
        $row = $rr->fetch_assoc();
        $code = $row['problem'];
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <meta name="author" content="Shrithik" />
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="../../footer.css">
    <link rel="icon" type="image/x-icon" href="../.././Asserts/Images/logo.png" >
    <title>BIT HACK</title>
  </head>
  <body>
    <div class="header">
      <div>
        <img
          class="Logo"
          src="../../Asserts/Images/bitFullLogo.webp"
          alt="BIT Full Logo"
        />
      </div>
      <div class="navBar">
        <a href="../Home/home.php">HOME</a>
        <a href="#">ABOUT</a>
        <a href="../Category/category.php">PROBLEM-STATEMENTS</a>
        <a href="../Profile/profile.php" class="active">PROFILE</a>
        <a href="../../logout.php" class="login">LOG OUT</a>
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
                    <a href="#about" >ABOUT</a>
                </div>
                <div>
                    <a href="../Category/category.php" >PROBLEM-STATEMENTS</a>
                </div>
                <div>
                    <a href="../Profile/profile.php" class="active">PROFILE</a>
                </div>
                <div>
                    <a href="../../logout.php" class="login">LOG OUT</a>
                </div>
            </div>
        </div>
    </div>

    <div class="body">
      
      <div class="title">PROFILE</div>

      <?php if($count == 0) { ?>
    <div class="box">
      <form action="profileProcess.php" method="POST" id="profileForm">
        <div class="proDitl" id="eProfile">
            <div class="subHead">Name</div>
            <div class="subHead">:</div>
            <div class="subBody" style="pointer-events:none;">
              <input name="name" type="text" id="name" value="<?php echo $name ?>" required/>
            </div>
            <div class="subHead">RollNumber</div>
            <div class="subHead">:</div>
            <div class="subBody">
              <input name="roll_no" type="text" maxlength="12" onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')" id="rNo" required />
            </div>
            <div class="subHead">Lab Name</div>
            <div class="subHead">:</div>
            <div class="subBody">
            <select id="lab_name" name="lab_name" required>
              <option value="">None</option>
                                <option value="ART AND DESIGN LABORATORY">ART AND DESIGN LABORATORY</option>
                                <option value="ARTIFICIAL INTELLIGENCE - PRODUCT DEVELOPMENT">ARTIFICIAL INTELLIGENCE - PRODUCT DEVELOPMENT</option>
                                <option value="BIO PROSPECTING LAB">BIO PROSPECTING LAB</option>
                                <option value="BIOPROCESS AND BIOPRODUCTS LAB">BIOPROCESS AND BIOPRODUCTS LAB</option>
                                <option value="BLOCKCHAIN TECHNOLOGY">BLOCKCHAIN TECHNOLOGY</option>
                                <option value="CLOUD COMPUTING - INFRASTRUCTURE SERVICES">CLOUD COMPUTING - INFRASTRUCTURE SERVICES</option>
                                <option value="COMMUNICATION PROTOCOL">COMMUNICATION PROTOCOL</option>
                                <option value="CYBER SECURITY">CYBER SECURITY</option>
                                <option value="DATA SCIENCE - INDUSTRIAL APPLICATIONS">DATA SCIENCE - INDUSTRIAL APPLICATIONS</option>
                                <option value="ELECTRICAL PRODUCT DEV LAB">ELECTRICAL PRODUCT DEV LAB</option>
                                <option value="ELECTRONIC PRODUCT DEV LAB">ELECTRONIC PRODUCT DEV LAB</option>
                                <option value="EMBEDDED TECHNOLOGY">EMBEDDED TECHNOLOGY</option>
                                <option value="ENERGY AND THERMAL PRODUCT DESIGN & DEVELOPMENT LAB">ENERGY AND THERMAL PRODUCT DESIGN & DEVELOPMENT LAB</option>
                                <option value="FUNCTIONAL FOOD & NUTRACEUTICALS">FUNCTIONAL FOOD & NUTRACEUTICALS</option>
                                <option value="HACKATHON LAB">HACKATHON LAB</option>
                                <option value="AI BASED INDUSTRIAL AUTOMATION">AI BASED INDUSTRIAL AUTOMATION</option>
                                <option value="IOT">IOT</option>
                                <option value="MANUFACTURING & FABRICATION">MANUFACTURING & FABRICATION</option>
                                <option value="DIGITAL MANUFACTURING & ROBOTIC AVIATION INTELLIGENCE LAB">DIGITAL MANUFACTURING & ROBOTIC AVIATION INTELLIGENCE LAB</option>
                                <option value="MOBILE AND WEB APP FOR SOFTWARE APPLICATIONS">MOBILE AND WEB APP FOR SOFTWARE APPLICATIONS</option>

                                <option value="INTELLIGENT COMMUNICATION AND EMBEDDED SYSTEMS LAB">INTELLIGENT COMMUNICATION AND EMBEDDED SYSTEMS LAB</option>
                                <option value="PRINTED CIRCUIT BOARD (PCB) LAB">PRINTED CIRCUIT BOARD (PCB) LAB</option>
                                <option value="RENEWABLE ENERGY AND HVAC PRODUCTS">RENEWABLE ENERGY AND HVAC PRODUCTS</option>
                                <option value="ROBOTICS & AUTOMATION LAB">ROBOTICS & AUTOMATION LAB</option>
                                <option value="SMART AGRICULTURE">SMART AGRICULTURE</option>
                                <option value="SUSTAINABLE CIVIL ENGINEERING MATERIALS LAB">SUSTAINABLE CIVIL ENGINEERING MATERIALS LAB</option>
                                <option value="TECHNICAL TEXTILE">TECHNICAL TEXTILE</option>
                                <option value="UNMANNED AERIAL VEHICLE">UNMANNED AERIAL VEHICLE</option>
                                <option value="UNMANNED UNDERWATER VEHICLE">UNMANNED UNDERWATER VEHICLE</option>
                                <option value="EMBEDDED DESIGN AND LABVIEW INTEGRATION LAB">EMBEDDED DESIGN AND LABVIEW INTEGRATION LAB</option>
                                <option value="VIRTUAL REALITY / AUGMENTED REALITY">VIRTUAL REALITY / AUGMENTED REALITY</option>
                                <option value="DATA SCIENCE - DATA SECURITY">DATA SCIENCE - DATA SECURITY</option>
                                <option value="AI AND SMART SENSORS LAB">AI AND SMART SENSORS LAB</option>
                                <option value="BIOMEDICAL SYSTEMS">BIOMEDICAL SYSTEMS</option>
                                <option value="ELECTRICAL INTEGRATED DRIVES">ELECTRICAL INTEGRATED DRIVES</option>
                                <option value="ARTIFICIAL INTELLIGENCE - TECHNOLOGIES">ARTIFICIAL INTELLIGENCE - TECHNOLOGIES</option>
                                <option value="ARTIFICIAL INTELLIGENCE - INDUSTRIAL APPLICATIONS">ARTIFICIAL INTELLIGENCE - INDUSTRIAL APPLICATIONS</option>
                                <option value="ARTIFICIAL INTELLIGENCE - SOFTWARE SOLUTIONS">ARTIFICIAL INTELLIGENCE - SOFTWARE SOLUTIONS</option>
                                <option value="DATA SCIENCE - COMPUTATIONAL INTELLIGENCE">DATA SCIENCE - COMPUTATIONAL INTELLIGENCE</option>
                                <option value="DATA SCIENCE - BIG DATA ANALYTICS">DATA SCIENCE - BIG DATA ANALYTICS</option>
                                <option value="DATA SCIENCE - EXPERT SYSTEMS">DATA SCIENCE - EXPERT SYSTEMS</option>
                                <option value="INDUSTRIAL WEB AND MOBILE APP DEVELOPMENT">INDUSTRIAL WEB AND MOBILE APP DEVELOPMENT</option>
                                <option value="WEB DESIGN AND DEVELOPMENT">WEB DESIGN AND DEVELOPMENT</option>
                                <option value="SILK FASHION LAB">SILK FASHION LAB</option>
                                <option value="INTEGRATED SMART BUILDINGS LAB">INTEGRATED SMART BUILDINGS LAB</option>
                                <option value="COMPUTATIONAL BIOLOGY LAB">COMPUTATIONAL BIOLOGY LAB</option>
                                <option value="BIOMATERIALS AND TISSUE REGENERATION LAB">BIOMATERIALS AND TISSUE REGENERATION LAB</option>
                                <option value="NEXT GENERATION FOOD LAB">NEXT GENERATION FOOD LAB</option>
                                <option value="ARTIFICIAL INTELLIGENCE - CYBER SECURITY">ARTIFICIAL INTELLIGENCE - CYBER SECURITY</option>
                                <option value="CLOUD COMPUTING - SOFTWARE SERVICES">CLOUD COMPUTING - SOFTWARE SERVICES</option>
                            </select>
            </div>
            <div class="subHead">Lab ID</div>
            <div class="subHead">:</div>
            <div class="subBody">
            <select id="lab_id" name="lab_id" required>
            <option value="">None</option>
                                <option value="SLB002">SLB002</option>
                                <option value="SLB003">SLB003</option>
                                <option value="SLB004">SLB004</option>
                                <option value="SLB006">SLB006</option>
                                <option value="SLB007">SLB007</option>
                                <option value="SLB008">SLB008</option>
                                <option value="SLB009">SLB009</option>
                                <option value="SLB010">SLB010</option>
                                <option value="SLB011">SLB011</option>
                                <option value="SLB014">SLB014</option>
                                <option value="SLB015">SLB015</option>
                                <option value="SLB018">SLB018</option>
                                <option value="SLB019">SLB019</option>
                                <option value="SLB021">SLB021</option>
                                <option value="SLB023">SLB023</option>
                                <option value="SLB024">SLB024</option>
                                <option value="SLB027">SLB027</option>
                                <option value="SLB029">SLB029</option>
                                <option value="SLB030">SLB030</option>
                                <option value="SLB031">SLB031</option>
                                <option value="SLB038">SLB038</option>
                                <option value="SLB041">SLB041</option>
                                <option value="SLB043">SLB043</option>
                                <option value="SLB045">SLB045</option>
                                <option value="SLB048">SLB048</option>
                                <option value="SLB051">SLB051</option>
                                <option value="SLB052">SLB052</option>
                                <option value="SLB053">SLB053</option>
                                <option value="SLB054">SLB054</option>
                                <option value="SLB055">SLB055</option>
                                <option value="SLB056">SLB056</option>
                                <option value="SLB059">SLB059</option>
                                <option value="SLB062">SLB062</option>
                                <option value="SLB063">SLB063</option>
                                <option value="SLB064">SLB064</option>
                                <option value="SLB065">SLB065</option>
                                <option value="SLB066">SLB066</option>
                                <option value="SLB067">SLB067</option>
                                <option value="SLB068">SLB068</option>
                                <option value="SLB069">SLB069</option>
                                <option value="SLB070">SLB070</option>
                                <option value="SLB071">SLB071</option>
                                <option value="SLB072">SLB072</option>
                                <option value="SLB073">SLB073</option>
                                <option value="SLB075">SLB075</option>
                                <option value="SLB077">SLB077</option>
                                <option value="SLB079">SLB079</option>
                                <option value="SLB080">SLB080</option>
                                <option value="SLB081">SLB081</option>
                                <option value="SLB082">SLB082</option>
                            </select>
            </div>
            <div class="subHead">PhoneNO</div>
            <div class="subHead">:</div>
            <div class="subBody">
              <input name="phone_no" type="text" maxlength="13" onkeyup="this.value = this.value.replace(/[^+0-9]/g, '')" id="pNo"required />
            </div>
            <div></div>
            <div>
              <center>
                <button type="submit" form="profileForm" class="edit">SAVE</button>
              </center>
            </div>
        </div>
      </div>  
      </form>
    </div>
<?php }else { ?>

        <div class="box" id="profileDiv">
            <div class="profile">
                <div>
                    <img src="<?php echo $_SESSION['user_image']; ?>" alt="<?php echo $_SESSION['name']; ?>" alt="Profile Picture" class="proPicM" width="150px" height="150px">
                </div>

            <div class="proDitl" id="vProfile">
                <div class="subHead">Name</div>
                <div class="subHead">:</div>
                <div class="subBody"> <?php echo $name ?> </div>
                <div class="subHead">RollNumber</div>
                <div class="subHead">:</div>
                <div class="subBody"><?php echo $roll_no ?></div>
                <div class="subHead">Lab Name</div>
                <div class="subHead">:</div>
                <div class="subBody"> <?php echo $lab_name ?> </div>
                <div class="subHead">Lab Id</div>
                <div class="subHead">:</div>
                <div class="subBody"> <?php echo $lab_id ?> </div>
                <div class="subHead">PhoneNO</div>
                <div class="subHead">:</div>
                <div class="subBody"> <?php echo $ph_no ?> </div>
                <div></div>
                  
            </div>
            
        </div>
        <div>
          <center>
            <button type="submit" onclick="updateProfile()" id="update" class="edit">UPDATE</button>
          </center>
        </div>
    </div>

    <div class="box" id="updateDiv">
      <form action="profileUpdateProcess.php" method="POST" id="profileForm">
        <div class="proDitl" id="eProfile">
            <div class="subHead">Name</div>
            <div class="subHead">:</div>
            <div class="subBody" >
              <input name="name" type="text" id="name" value="<?php echo $name ?>" required/>
            </div>
            <div class="subHead">RollNumber</div>
            <div class="subHead">:</div>
            <div class="subBody">
              <input name="roll_no" type="text" maxlength="12" onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')" id="rNo" required />
            </div>
            <div class="subHead">Lab Name</div>
            <div class="subHead">:</div>
            <div class="subBody">
            <select id="lab_name" name="lab_name" required>
              <option value="">None</option>
                                <option value="ART AND DESIGN LABORATORY">ART AND DESIGN LABORATORY</option>
                                <option value="ARTIFICIAL INTELLIGENCE - PRODUCT DEVELOPMENT">ARTIFICIAL INTELLIGENCE - PRODUCT DEVELOPMENT</option>
                                <option value="BIO PROSPECTING LAB">BIO PROSPECTING LAB</option>
                                <option value="BIOPROCESS AND BIOPRODUCTS LAB">BIOPROCESS AND BIOPRODUCTS LAB</option>
                                <option value="BLOCKCHAIN TECHNOLOGY">BLOCKCHAIN TECHNOLOGY</option>
                                <option value="CLOUD COMPUTING - INFRASTRUCTURE SERVICES">CLOUD COMPUTING - INFRASTRUCTURE SERVICES</option>
                                <option value="COMMUNICATION PROTOCOL">COMMUNICATION PROTOCOL</option>
                                <option value="CYBER SECURITY">CYBER SECURITY</option>
                                <option value="DATA SCIENCE - INDUSTRIAL APPLICATIONS">DATA SCIENCE - INDUSTRIAL APPLICATIONS</option>
                                <option value="ELECTRICAL PRODUCT DEV LAB">ELECTRICAL PRODUCT DEV LAB</option>
                                <option value="ELECTRONIC PRODUCT DEV LAB">ELECTRONIC PRODUCT DEV LAB</option>
                                <option value="EMBEDDED TECHNOLOGY">EMBEDDED TECHNOLOGY</option>
                                <option value="ENERGY AND THERMAL PRODUCT DESIGN & DEVELOPMENT LAB">ENERGY AND THERMAL PRODUCT DESIGN & DEVELOPMENT LAB</option>
                                <option value="FUNCTIONAL FOOD & NUTRACEUTICALS">FUNCTIONAL FOOD & NUTRACEUTICALS</option>
                                <option value="HACKATHON LAB">HACKATHON LAB</option>
                                <option value="AI BASED INDUSTRIAL AUTOMATION">AI BASED INDUSTRIAL AUTOMATION</option>
                                <option value="IOT">IOT</option>
                                <option value="MANUFACTURING & FABRICATION">MANUFACTURING & FABRICATION</option>
                                <option value="DIGITAL MANUFACTURING & ROBOTIC AVIATION INTELLIGENCE LAB">DIGITAL MANUFACTURING & ROBOTIC AVIATION INTELLIGENCE LAB</option>
                                <option value="MOBILE AND WEB APP FOR SOFTWARE APPLICATIONS">MOBILE AND WEB APP FOR SOFTWARE APPLICATIONS</option>

                                <option value="INTELLIGENT COMMUNICATION AND EMBEDDED SYSTEMS LAB">INTELLIGENT COMMUNICATION AND EMBEDDED SYSTEMS LAB</option>
                                <option value="PRINTED CIRCUIT BOARD (PCB) LAB">PRINTED CIRCUIT BOARD (PCB) LAB</option>
                                <option value="RENEWABLE ENERGY AND HVAC PRODUCTS">RENEWABLE ENERGY AND HVAC PRODUCTS</option>
                                <option value="ROBOTICS & AUTOMATION LAB">ROBOTICS & AUTOMATION LAB</option>
                                <option value="SMART AGRICULTURE">SMART AGRICULTURE</option>
                                <option value="SUSTAINABLE CIVIL ENGINEERING MATERIALS LAB">SUSTAINABLE CIVIL ENGINEERING MATERIALS LAB</option>
                                <option value="TECHNICAL TEXTILE">TECHNICAL TEXTILE</option>
                                <option value="UNMANNED AERIAL VEHICLE">UNMANNED AERIAL VEHICLE</option>
                                <option value="UNMANNED UNDERWATER VEHICLE">UNMANNED UNDERWATER VEHICLE</option>
                                <option value="EMBEDDED DESIGN AND LABVIEW INTEGRATION LAB">EMBEDDED DESIGN AND LABVIEW INTEGRATION LAB</option>
                                <option value="VIRTUAL REALITY / AUGMENTED REALITY">VIRTUAL REALITY / AUGMENTED REALITY</option>
                                <option value="DATA SCIENCE - DATA SECURITY">DATA SCIENCE - DATA SECURITY</option>
                                <option value="AI AND SMART SENSORS LAB">AI AND SMART SENSORS LAB</option>
                                <option value="BIOMEDICAL SYSTEMS">BIOMEDICAL SYSTEMS</option>
                                <option value="ELECTRICAL INTEGRATED DRIVES">ELECTRICAL INTEGRATED DRIVES</option>
                                <option value="ARTIFICIAL INTELLIGENCE - TECHNOLOGIES">ARTIFICIAL INTELLIGENCE - TECHNOLOGIES</option>
                                <option value="ARTIFICIAL INTELLIGENCE - INDUSTRIAL APPLICATIONS">ARTIFICIAL INTELLIGENCE - INDUSTRIAL APPLICATIONS</option>
                                <option value="ARTIFICIAL INTELLIGENCE - SOFTWARE SOLUTIONS">ARTIFICIAL INTELLIGENCE - SOFTWARE SOLUTIONS</option>
                                <option value="DATA SCIENCE - COMPUTATIONAL INTELLIGENCE">DATA SCIENCE - COMPUTATIONAL INTELLIGENCE</option>
                                <option value="DATA SCIENCE - BIG DATA ANALYTICS">DATA SCIENCE - BIG DATA ANALYTICS</option>
                                <option value="DATA SCIENCE - EXPERT SYSTEMS">DATA SCIENCE - EXPERT SYSTEMS</option>
                                <option value="INDUSTRIAL WEB AND MOBILE APP DEVELOPMENT">INDUSTRIAL WEB AND MOBILE APP DEVELOPMENT</option>
                                <option value="WEB DESIGN AND DEVELOPMENT">WEB DESIGN AND DEVELOPMENT</option>
                                <option value="SILK FASHION LAB">SILK FASHION LAB</option>
                                <option value="INTEGRATED SMART BUILDINGS LAB">INTEGRATED SMART BUILDINGS LAB</option>
                                <option value="COMPUTATIONAL BIOLOGY LAB">COMPUTATIONAL BIOLOGY LAB</option>
                                <option value="BIOMATERIALS AND TISSUE REGENERATION LAB">BIOMATERIALS AND TISSUE REGENERATION LAB</option>
                                <option value="NEXT GENERATION FOOD LAB">NEXT GENERATION FOOD LAB</option>
                                <option value="ARTIFICIAL INTELLIGENCE - CYBER SECURITY">ARTIFICIAL INTELLIGENCE - CYBER SECURITY</option>
                                <option value="CLOUD COMPUTING - SOFTWARE SERVICES">CLOUD COMPUTING - SOFTWARE SERVICES</option>
                            </select>
            </div>
            <div class="subHead">Lab ID</div>
            <div class="subHead">:</div>
            <div class="subBody">
            <select id="lab_id" name="lab_id" required>
            <option value="">None</option>
                                <option value="SLB002">SLB002</option>
                                <option value="SLB003">SLB003</option>
                                <option value="SLB004">SLB004</option>
                                <option value="SLB006">SLB006</option>
                                <option value="SLB007">SLB007</option>
                                <option value="SLB008">SLB008</option>
                                <option value="SLB009">SLB009</option>
                                <option value="SLB010">SLB010</option>
                                <option value="SLB011">SLB011</option>
                                <option value="SLB014">SLB014</option>
                                <option value="SLB015">SLB015</option>
                                <option value="SLB018">SLB018</option>
                                <option value="SLB019">SLB019</option>
                                <option value="SLB021">SLB021</option>
                                <option value="SLB023">SLB023</option>
                                <option value="SLB024">SLB024</option>
                                <option value="SLB027">SLB027</option>
                                <option value="SLB029">SLB029</option>
                                <option value="SLB030">SLB030</option>
                                <option value="SLB031">SLB031</option>
                                <option value="SLB038">SLB038</option>
                                <option value="SLB041">SLB041</option>
                                <option value="SLB043">SLB043</option>
                                <option value="SLB045">SLB045</option>
                                <option value="SLB048">SLB048</option>
                                <option value="SLB051">SLB051</option>
                                <option value="SLB052">SLB052</option>
                                <option value="SLB053">SLB053</option>
                                <option value="SLB054">SLB054</option>
                                <option value="SLB055">SLB055</option>
                                <option value="SLB056">SLB056</option>
                                <option value="SLB059">SLB059</option>
                                <option value="SLB062">SLB062</option>
                                <option value="SLB063">SLB063</option>
                                <option value="SLB064">SLB064</option>
                                <option value="SLB065">SLB065</option>
                                <option value="SLB066">SLB066</option>
                                <option value="SLB067">SLB067</option>
                                <option value="SLB068">SLB068</option>
                                <option value="SLB069">SLB069</option>
                                <option value="SLB070">SLB070</option>
                                <option value="SLB071">SLB071</option>
                                <option value="SLB072">SLB072</option>
                                <option value="SLB073">SLB073</option>
                                <option value="SLB075">SLB075</option>
                                <option value="SLB077">SLB077</option>
                                <option value="SLB079">SLB079</option>
                                <option value="SLB080">SLB080</option>
                                <option value="SLB081">SLB081</option>
                                <option value="SLB082">SLB082</option>
                            </select>
            </div>
            <div class="subHead">PhoneNO</div>
            <div class="subHead">:</div>
            <div class="subBody">
              <input name="phone_no" type="text" maxlength="13" onkeyup="this.value = this.value.replace(/[^+0-9]/g, '')" id="pNo"required />
            </div>
            <div>
              <center>
                <a href="" class="cancel">CANCEL</a>
              </center>
            </div>
            <div></div>
            <div>
              <center>
                <button type="submit" form="profileForm" class="edit">UPDATE</button>
              </center>
            </div>
        </div>
      </div>  
      </form>
    </div>


<div class="title">TEAM</div>

<?php

$team_checker = " SELECT * FROM team WHERE email = '$email' ";
$team_checker1 = mysqli_query($link,$team_checker);

if(!($team_checker1->num_rows > 0)) {

?>

<div class="box">
      <form action=".././Team/teamProcess.php" method="POST" id="teamForm">
        <div class="proDitl" id="eProfile">
            <div class="subHead">Team Name</div>
            <div class="subHead">:</div>
            <div class="subBody">
              <input name="team_name" onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9-_ ]/g, '')" type="text" id="tname"  required/>
            </div>
            <div class="subHead">Team Leader Email: </div>
            <div class="subHead">:</div>
            <div class="subBody" style="pointer-events:none;">
              <input name="leader" type="text" id="Lemail" value="<?php echo $email ?>"  required/>
            </div>
            <div class="subHead">1st Team member Email: </div>
            <div class="subHead">:</div>
            <div class="subBody">
              <input name="member1" type="text" id="email1"  required/>
            </div><div class="subHead">2nd Team member Email: </div>
            <div class="subHead">:</div>
            <div class="subBody">
              <input name="member2" type="text" id="email2"  required/>
            </div>
            <div></div>
            <div>
              <center>
                <button type="submit" form="teamForm" class="edit">SAVE</button>
              </center>
            </div>
        </div>
      </div>  
    </form>
  </div>

<?php } else {
    $row = $team_checker1->fetch_assoc();
    $teamName = $row['team_name'];

    $sql = " SELECT * FROM team WHERE team_name = '$teamName' ";
    $sqll = mysqli_query($link,$sql);
    $emailArr = array();
    $i = 0;
    while($row = $sqll->fetch_assoc())
    {
      $email = $row['email'];
      array_push($emailArr,$email);
    }
    
?>

    <div class="box">
        <div class="proDitl" id="eProfile">
            <div class="subHead">Team Name</div>
            <div class="subHead">:</div>
            <div class="subBody"><?php echo $teamName ?></div>
            <div class="subHead">Leader Email: </div>
            <div class="subHead">:</div>
            <div class="subBody"><?php echo $emailArr[0] ?></div>
            <div class="subHead">Member1 Email: </div>
            <div class="subHead">:</div>
            <div class="subBody"><?php echo $emailArr[1] ?></div>
            <div class="subHead">Member2 Email: </div>
            <div class="subHead">:</div>
            <div class="subBody"><?php echo $emailArr[2] ?></div>
            <div class="subHead">Problem Statement: </div>
            <div class="subHead">:</div>
            <?php if($code !== 1) { ?> <div class="subBody"> <span style=" font-weight: bold; font-size:20px; color: green;"><?php echo $code ?></span> - Registered </div>
            <?php } else { ?> 
            <div class="subBody" id="regsiteration" style="color: red; font-weight:700;">Not registered yet!</div>
            <?php } ?>
        </div>
    </div>

    <?php } } ?>
<footer>
       <div class="footerContainer">
            <div class="footerTitle">
                <h1>BIT HACK</h1>
            </div>
            <div id="footerNav" class="footerNav">
                <ul>
                    <li><a href=".././Home/home.php">HOME</a></li>
                    <li><a href="../Category/category.php">PROBLEM STATEMENT</a></li>
                    <li><a href=".././Home/home.php#about">ABOUT</a></li>
                    <li><a href=".././Profile/profile.php">PROFILE</a></li>
                </ul>
            </div>
        </div>
        <div id="footerBottom" class="footerBottom">
            <span class="copyRight">Copyright  © 2023   &nbsp&nbsp&nbsp -  &nbsp&nbsp&nbsp </span><a class="copyRight" target="_blank" href="https://www.linkedin.com/in/mohamed-imthiyaz-1600qaqw?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">MOHAMED IMTHIYAZ A</a><span class="copyRight"> &nbsp & &nbsp </span><a class="copyRight" href="">SHRITHIK A</a>
        </div>
    </footer>

  </body>
  <script>
    function register() {
      document.getElementById("fReg").style.display = "none";
      document.getElementById("rReg").style.display = "block";
      document.getElementById("focus").focus();
    }
    function dispMenu(){
        document.getElementById("navList").style.display="grid";
        document.getElementById("footerNav").style.display="none";
        
    }
    function closeMenu(){
        document.getElementById("navList").style.display="none";
        document.getElementById("footerNav").style.display="initial";
    }

    function updateProfile(){
      document.getElementById("profileDiv").style.display="none";
      document.getElementById("updateDiv").style.display="block";
    }

  </script>
  </script>