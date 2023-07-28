<?php  
  

  $host="localhost";
  $user="root";
  $pass="";
  $db="rental";

  $conn=new mysqli($host,$user,$pass,$db);

  if($conn->connect_error)
  {
    
    echo "failed to coonect" . $conn->connect_error;

  }

?>