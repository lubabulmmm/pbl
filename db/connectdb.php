<?php 


  $conn = mysqli_connect("localhost","root","","pbl_project");
  if (mysqli_connect_errno()) {
    printf("Connenctio info: ", mysqli_connect_error());
  }

?>