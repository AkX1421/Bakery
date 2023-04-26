<?php
$fullname = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phonenumber'];
$gender= $_POST['gender'];
$zipcode= $_POST['zipcode'];

$conn = new mysqli('localhost:3306','root','','db_register');

if($conn->connect_error)
{
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}

$sql = "Select * from `user_details` where username='$email'";
$result = mysqli_query($conn, $sql);

if (!$result) 
{
    $conn = mysqli_connect("localhost", "root", "", "db_register");
    $sql = mysqli_query($conn,"INSERT INTO `user_details` VALUES ('0','$fullname','$email','$password','$phone','$gender','$zipcode')");

    header("Location:login.html");
 
}
else 
{ 
    echo "Passwords do not match"; 
}     
$exists="Username not available"
?>