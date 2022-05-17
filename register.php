<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$city=$_POST['city'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];

// echo $fname;
// echo $lname;
// echo $email;
// echo $city;
// echo $mobile;
// echo $password;
$conn = new mysqli('localhost','root','','test1');
if($conn->connect_error){
  die('Connection Failed : '.$conn->connect_error);
}
else{
  $stmt=$conn->prepare("insert into reg(fname,lname,email,city,mobile,password) value (?,?,?,?,?,?)");
  $stmt->bind_param("ssssis",$fname,$lname,$email,$city,$mobile,$password);
  $stmt->execute();
  echo "Registeration Successfully ";
  header('Location: login.html');
  $stmt->close();
  $conn->close();
}
?>