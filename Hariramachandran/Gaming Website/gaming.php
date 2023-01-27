<?php

$plyr1 = $_POST['plyr1'];
$plyr2  = $_POST['plyr2'];
$plyr3 = $_POST['plyr3'];
$plyr4 = $_POST['plyr4'];
$whno = $_POST['whno'];

if (!empty($plyr1) || !empty($plyr2) || !empty($plyr3) || !empty($plyr4) || !empty($whno))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "gaming";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT whno From squadregister Where whno = ? Limit 1";
  $INSERT = "INSERT Into squadregister (plyr1,plyr2,plyr3,plyr4,whno)values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $whno);
     $stmt->execute();
     $stmt->bind_result($whno);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking usernamew
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $plyr1,$plyr2,$plyr3,$plyr4,$whno);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this mail";
     }
     $stmt->close();
     $conn->close();
    }
    header("Location: SUBMIT.html");
} else {
 echo "All field are required";
 die();
}
?>