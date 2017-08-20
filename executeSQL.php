<?php
include('dbconfig.php');
$sql=$_POST['strSQL'];

 	if(strlen($sql)<20)
	{echo 'partial SQL string....Please input complete SQL';die();}
	echo '<center>'.$sql;
  
  $stmt=$conn->prepare($sql);
  $stmt->execute();	
 
  echo '<br/>Query Executed Successfully...</center>';
  $conn=null;
?>
  </p>  </th>
