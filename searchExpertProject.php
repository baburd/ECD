
<table width="100%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#CCCCCC">
  	<th>Expert ID </td>
    <th>Expert Name  </td>
	<th>Expert Stream  </td>
    <th>Mobile </th>
    <th>Email Addr. </th>
    <th>Area of Expertise </th>
    <th>Remarks</th>
  </tr>
  
  <p><?php
include("dbconfig.php");
$commentBy=$_POST['streamName'];
  $sql="select distinct * from projectExperts where expertStream like ?";
  $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute($params);
	//require_once('runQuery.php');
	
	$i=0;
	while ($row = $stmt->fetch()) 
	{
		$exprID = $row{'expertID'};
		$exprName = $row{'expertName'};
		$exprStream = $row{'expertStream'};
		$exprContact = $row{'expertContact'};
		$exprEmail = $row{'expertEmail'};
		$exprArea = $row{'expertArea'};
		$exprRemarks = $row{'expertRemarks'};
		
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td Align="Center">'.$exprID.'<td Align="left">'.$exprName.'</td><td Align="left">'. $exprStream .'</td><td Align="center" >'.$exprContact.':<A HREF="javascript:sendSMS(\''.$exprContact.'\')">SMS</A></td><td Align="left">'.$exprEmail.'</td><td Align="left">'.$exprArea.'</td><td Align="left">'.$exprRemarks.'</td><td Align="Center"><A HREF="javascript:submitExprProjEdit(\''.$exprID.'\')">Edit</A></td></tr>';
	
	$i++;
	}
		
echo '</table>';
   
$conn = null;
?>
</p>  </th>
