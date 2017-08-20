<html>
<body>
<?php
include('dbconfig.php');
$sql = "select * from expertList limit 10" ;
//expertID, expertName, expertExp, expertContact1, expertContact2, expertEmail, expertDegree, expertAff, expertType
$stmt = $conn->prepare($sql);
$stmt->execute();

echo '<table><tr bgcolor="#FF23A"><td>ID</td><td>Expert Name</td><td>Total Experience</td><td>Home Phone</td><td>Mobile Phone</td><td>Email</td><td>Upper Degree</td><td>Affiliation</td><td>Aff. Type</td><td>Status</td> <td>Action</td>';
$i=0;
	while ($row = $stmt->fetch()) 
	{
		$exprID = $row{'expertID'};
		$exprName = $row{'expertName'};
		$exprExp = $row{'expertExp'};
		$exprHomePh = $row{'expertContact1'};
		$exprMobile = $row{'expertContact2'};
		$exprEmail = $row{'expertEmail'};
		$exprUpprDegree = $row{'expertDegree'};
		$exprAff = $row{'expertAff'};
		$exprType = $row{'expertType'};
		$exprStatus = $row{'isActive'}==1? "Teaching": "Not Teaching";
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td Align="Center">'.$exprID.'</td>'.'<td Align="Center">'.$exprName.'</td><td Align="Center">'. $exprExp .'</td><td Align="Center" >'.$exprHomePh.'</td><td Align="Center">'.$exprMobile.'</td><td Align="Center">'.$exprEmail.'</td><td Align="Center">'.$exprUpprDegree.'</td><td Align="Center">'.$exprAff.'</td><td Align="Center">'.$exprType.'</td><td Align="Center">'.$exprStatus.'</td><td align="center"><a href=editExpert.php?expertID="'.$row['expertID'].'"><img src="./images/edit.jpg" /></a> / <a href=expertDelete.php?expertID="'.$row['expertID'].'"><img src="./images/delimg.JPEG" /></a></td></tr>';
	
	$i++;
	}
	echo '</table>';
$conn =null;
?>
</ol>
</table>
</body>
</html>