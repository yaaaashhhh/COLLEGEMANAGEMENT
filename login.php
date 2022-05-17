<?php
$email=$_POST['email'];
$password=$_POST['password'];
$conn = new mysqli('localhost','root','','test1');
if($conn->connect_error){
  die('Connection Failed : '.$conn->connect_error);
}
else{
  $stmt = $conn->prepare("select * from reg where email = ?");
  $stmt->bind_param("s",$email);
  $stmt->execute();
  $stmt_result =  $stmt->get_result();
  if($stmt_result->num_rows>0){
    $data = $stmt_result->fetch_assoc();
    if($data['password']=== $password){
      header('Location: index.html');
    }else{
      echo "Failed";
    }
  }else{
    echo "<h2>Invalid data</h2>";
  }
}
?>