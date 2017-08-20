<html>
<head><title> Campus/College Short Code</title></head>
<body>
 <?php
include("dbconfig.php");

  $sql="select collegeCode, collegeName from collegeInfo where 1";
  //$params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute();
	//require_once('runQuery.php');
	
	$i=1;
	echo '<table align="center" vspace="4" hspace="4">';
	echo '<tr height="40"><th colspan="2" align="center" bgcolor="#970FE3"><font color="#D7E30F"><h2>Campus/College Code of <br/>IOE Affiliated Campus/Colleges</h2></font></th></tr>';
	while ($row = $stmt->fetch()) 
	{
		$collegeCode = $row{'collegeCode'};
		$collegeName = $row{'collegeName'};
		echo '<tr height="35">';
	 if($i%2==0)
		echo '<th bgcolor="#FFCCCC">'.$i.'</th><th align="left" bgcolor="#FFCCCC">&nbsp;&nbsp;<font color="red">'.$collegeCode.'</font>: '.$collegeName.'&nbsp;';
		else 
		echo '<th bgcolor="#E0E0C2">'.$i.'</th><th align="left" bgcolor="#E0E0C2">&nbsp;&nbsp;<font color="red">'.$collegeCode.'</font>: '.$collegeName.'&nbsp;';
	echo '</th></tr>'; 
	$i++;
	}
echo '</table>';
   
$conn = null;
?>
</body>

