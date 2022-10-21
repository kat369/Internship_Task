<?php



if (empty($_POST['fullname'])){
    die("Name is Required");
}

if (empty($_POST['dateofbirth'])){
    die("DOB is Required");
}

if (empty($_POST['mobilenumber'])){
    die("Mobile Number is Required");
}

if (strlen($_POST["mobilenumber"]) < 10) { 
    die("Enter a 10 digit number");
}

if (empty($_POST['address'])){
    die("Address is Required");
}

if (empty($_POST['pincode'])){
    die("Pin Code is Required");
}


$fname = $_POST['fullname'];
$dob =$_POST['dateofbirth'];
$mobile = $_POST['mobilenumber'];
$address = $_POST['address'];
$pin = $_POST['pincode'];

require_once __DIR__ . '/vendor/autoload.php';

$con = new MongoDB\Client("mongodb://localhost:27017");


$db = $con-> userprofile_db;

$tbl = $db->profiledata;

$tbl-> insertOne(["Name" => "$fname", "Date of Birth" => "$dob", "Mobile" => "$mobile", "Address" => "$address", "Pincode" => "$pin"]);

?>