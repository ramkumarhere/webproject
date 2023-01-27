<?php

$fname = $_POST['fname'];
$lname  = $_POST['lname'];
$mail = $_POST['mail'];
$pswd = $_POST['pswd'];
$number = $_POST['number'];

if (!empty($fname) || !empty($lname) || !empty($mail) || !empty($pswd) || !empty($number))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "form";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT mail From register Where mail = ? Limit 1";
  $INSERT = "INSERT Into register (fname,lname,mail,pswd,number)values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $mail);
     $stmt->execute();
     $stmt->bind_result($mail);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking usernamew
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $fname,$lname,$mail,$pswd,$number);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this mail";
     }
     $stmt->close();
     $conn->close();
    }
    header("Location: home.html");
} else {
 echo "All field are required";
 die();
}
?>