<?php
session_start();

include '../../config.php';

$email = $_SESSION['email'];
$name =  trim($_POST['name']);
$roll_no = trim($_POST['roll_no']);
$lab_name = trim($_POST['lab_name']);
$lab_id = trim($_POST['lab_id']);
$phone_no = trim($_POST['phone_no']);


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
$p = " SELECT * FROM student_details WHERE email <> '$email' AND phone_number = '$phone_no'; ";
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
$p = " SELECT * FROM student_details WHERE email <> '$email' AND roll_no = '$roll_no'; ";
$pp = mysqli_query($link,$p);

if($pp->num_rows > 0){
    echo "<script> alert('Roll number already registerred. Please contact developers!');
    window.location.href = 'profile.php#footerBottom';
    </script>";
    exit();
}

//updating profile

$sql = " UPDATE student_details SET namee = '$name', roll_no = '$roll_no', lab_name = '$lab_name', lab_id = '$lab_id', phone_number = '$phone_no'
         WHERE email = '$email'; ";

$sqll = mysqli_query($link,$sql);

if($sqll)
{
    echo "<script> alert('Profile updated successfully!'); 
    window.location.href = '.././Profile/profile.php';
    </script>";
    exit();
}

if(!$sqll)
{
    echo "<script> alert('Profile update failed!'); 
    window.location.href = '.././Profile/profile.php';
    </script>";
    exit();
}

