<?php
session_start();
require './config.php';

if(isset($_SESSION['login_id'])){
    header('Location: ./Pages/Home/home.php');
    exit;
}

require './google-api/vendor/autoload.php';

$client = new Google_Client();

$client->setClientId('655964990720-7tq5o7rv4aodqks8ki49u2vbmjn17mdm.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/SkillsBIT/index.php');

$client->addScope("email");
$client->addScope("profile");


if(isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $client->setAccessToken($token['access_token']);

        $obj=new Google_Service_Oauth2($client);
        $data=$obj->userinfo->get();
        
        if(!empty($data->email)&&!empty($data->name)){
        
        //if you want to register user details, place mysql insert query here
        $_SESSION["email"]=$data->email;
        $_SESSION['user_image'] = $data->picture;
        $_SESSION["name"]=$data->name;
        $_SESSION["login_id"] = null;
        if($_SESSION['email'] == 'mohamedimthiyaz.it19@bitsathy.ac.in' || $_SESSION['email'] == 'mohdimthiyaz2018@gmail.com') {
            $_SESSION["login_id"] = true;
        } 
        header("location:./Pages/Home/home.php");
        }

    }
    else{
        header('Location: ./index.php');
        exit;
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Shrithik">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="icon" type="image/x-icon" href="./Asserts/Images/logo.png" >
    <title>BIT HACK</title>
</head>
<body>
    <div class="header">
        <div>
            <img class="Logo" src="./Asserts/Images/bitFullLogo.webp" alt="BIT Full Logo">
        </div>
        <div class="navBar">
                <a href="#home" class="active">HOME</a>
                <a href="#about" >ABOUT</a>
                <a href="<?php echo $client->createAuthUrl(); ?>" class="login">LOGIN / REGISTER</a>
        </div>
        <div class="navMenu">
            <img src="./Asserts/Images/menuIcon.png" alt="Menu" width="30px" onclick="dispMenu()">
            <div class="navList" id="navList">
                <div>
                    <img src="./Asserts/Images/closeIcon.png" alt="Close" width="30px" onclick="closeMenu()">
                </div>
                <div>
                    <a href="#home" class="active">HOME</a>
                </div>
                <div>
                    <a href="#about" >ABOUT</a>
                </div>
                <div>
                <a href="<?php echo $client->createAuthUrl(); ?>" class="login">LOGIN / REGISTER</a>
                </div>
            </div>
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

    <footer>
       <div class="footerContainer">
            <div class="footerTitle">
                <h1>BIT HACK</h1>
            </div>
            <div class="footerNav">
                <ul>
                   
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <span class="copyRight">Copyright  © 2023   &nbsp&nbsp&nbsp -  &nbsp&nbsp&nbsp </span><a class="copyRight" target="_blank" href="https://www.instagram.com/mohamedimthiyaz_/">MOHAMED IMTHIYAZ A</a><span class="copyRight"> &nbsp & &nbsp </span><a class="copyRight" href="">SHRITHIK A</a>
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

