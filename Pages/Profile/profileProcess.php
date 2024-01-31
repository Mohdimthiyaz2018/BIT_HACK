<?php
session_start();

include '../../config.php';

$email = $_SESSION['email'];
$name =  trim($_POST['name']);
$roll_no = trim($_POST['roll_no']);
$lab_name = trim($_POST['lab_name']);
$lab_id = trim($_POST['lab_id']);
$phone_no = trim($_POST['phone_no']);


//checking either he/she is a finalist

$f = " SELECT * FROM finalist WHERE Finalist_Email = '$email' ";
$ff = mysqli_query($link,$f);

if($ff->num_rows > 0){
    echo "<script> alert('Finalist of BIT HACK 23 & SIH are not eligible to register !'); 
    window.location.href = '.././Profile/profile.php';
    </script>";
    exit();
}

//checking either he/she is an first or final year
$block = " SELECT * FROM block_list WHERE email = '$email'; ";
$block1 = mysqli_query($link,$block);

if($block1->num_rows > 0)
{
    echo "<script> alert(' I & IV year students are not allowed to register! '); 
    window.location.href = '.././Profile/profile.php';
    </script>";
    exit();
}

//checking either no empty spaces
if(empty($roll_no)){
    echo "<script> alert('Roll number cannot be empty!');
    window.location.href = 'profile.php#footerBottom';
    </script>";
    exit();
}

if(empty($name)){
    echo "<script> alert('Name cannot be empty!');
    window.location.href = 'profile.php#footerBottom';
    </script>";
    exit();
}

if(empty($phone_no)){
    echo "<script> alert('Phone number cannot be empty!');
    window.location.href = 'profile.php#footerBottom';
    </script>";
    exit();
}

//checking either mobile number is unique!
$p = " SELECT * FROM student_details WHERE phone_number = '$phone_no'; ";
$pp = mysqli_query($link,$p);

if($pp->num_rows > 0){
    echo "<script> alert('Mobile number already registerred. Please contact developers!');
    window.location.href = 'profile.php#footerBottom';
    </script>";
    exit();
}

//checking either phone_number is valid
$len = strlen($phone_no);
$passer = 2;
if(strlen($phone_no) === 13)
{
    if($phone_no[0] == '+' && $phone_no[1] == 9 && $phone_no[2] == 1)
    {
        $passer = "pass";
    }
    else 
    {
        echo "<script> alert('Mobile number should be valid! - $len'); 
        window.location.href = '.././Profile/profile.php';
        </script>";
        exit();
    }
}

if($passer !== "pass")
{
    if($phone_no[0] == '+')
    {
        echo "<script> alert('Mobile number should be valid!'); 
        window.location.href = '.././Profile/profile.php';
        </script>";
        exit();
    }
    if(strlen($phone_no) !== 10)
    {
        echo "<script> alert('Mobile number should be valid!'); 
        window.location.href = '.././Profile/profile.php';
        </script>";
        exit();
    }
}

//checking either roll_no already registered
$p = " SELECT * FROM student_details WHERE roll_no = '$roll_no'; ";
$pp = mysqli_query($link,$p);

if($pp->num_rows > 0){
    echo "<script> alert('Roll number already registerred. Please contact developers!');
    window.location.href = 'profile.php#footerBottom';
    </script>";
    exit();
}


//Creating profile!
$sql = " INSERT INTO student_details (email,namee,roll_no,lab_name,lab_id,phone_number) VALUES ('$email','$name','$roll_no','$lab_name','$lab_id','$phone_no'); ";
$sqll = mysqli_query($link,$sql);

if($sqll) {
    header("refresh:0;url=profile.php");
}
else {
    echo "<script> alert('Failed. Please contact developers!');
    window.location.href = 'profile.php#footerBottom';
    </script>";
}
?>