<?php
require_once("../common.php");

 $username=$_POST['username'];
if($username)
{
 $checkdata=" SELECT username FROM merchantuser WHERE username='$username'";

 $query=mysqli_query($mysqli,$checkdata);

 if(mysqli_num_rows($query)>0)
 {
  echo "Email Id Already Exit!";
 }
 else
 {
  echo " Email Id Available!";
 }
 exit();
}
?>
?>