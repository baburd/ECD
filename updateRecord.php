<?php
include('dbconfig.php');
$sql=$_POST['sqlSTR'];

 	if(strlen($sql)<20)
	{echo 'Partial SQL string....Please supply correct values';die();}
	//echo '<center>'.$sql;
  
  $stmt=$conn->prepare($sql);
  $stmt->execute();	
 
  echo '<center><b>Record Updated/Inserted/Deleted Successfully...</b></center>';
  $conn=null;
?>

