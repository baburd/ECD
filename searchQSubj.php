
<table width="95%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#CCCCCC">
  	<th>IssueNo </td>
    <th>Expr. ID </td>
    <th>Expr. Name </th>
    <th>Pr. Code </th>
    <th>Pr. Name </th>
    <th>Yr./Part </th>
    <th><center>Subject Name </center></th>
    <th>Affiliation </th>
	<th>T. Set(s) </th>
    <th>Issue year </th>
	<th>Level </th>
	<th>Status </th>
    </tr>
  
  <p><?php
include("dbconfig.php");

$commentBy=$_POST['qname'];
$lbl = $_POST['lbl'];

 	if(strlen($commentBy)<2)
	{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
	else
	{
  $sql="select * from appointQExpert where effYearSem='".$lbl."' and subjName like ?";
  //echo $sql;
  $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute($params);
	//require_once('runQuery.php');
	
	$i=0;
	while ($row = $stmt->fetch()) 
	{
		$refNo = $row{'refNo'};
		$expertID = $row{'expertID'};
		$expertName = $row{'expertName'};
		$pCode = $row{'pCode'};
		$pName = $row{'pName'};
		$pYrSem = $row{'pYrSem'};
		$subjName = $row{'subjName'};
		$label = $row{'label'};
		$collegeName = $row{'collegeName'};
		$qTotal = $row{'qTotal'};
		$effYearSem = $row{'effYearSem'};
		
		$receipt="<font color='GREEN'>Receipt</font>";
		$nReceipt='<a href="javascript:UpdateQReceipt('.$refNo.')"><font color="RED">Confirm Receipt</font></a>';
		$status = $row{'status'}==1?$receipt:$nReceipt;

		
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td Align="Center">'.$refNo.'<td Align="Center">'.$expertID.'</td><td Align="Center">'. $expertName .'</td><td Align="Center" >'.$pCode.'</td><td Align="Center">'.$pName.'</td><td Align="Center">'.$pYrSem.'</td><td Align="Center">'.$subjName.'</td><td Align="Center">'.$collegeName.'</td><td Align="Center">'.$qTotal.'</td><td Align="Center">'.$effYearSem.'</td><td Align="Center">'.$label.'</td><td Align="Center">'.$status.'</td></tr>';
	
	$i++;
	}
	
	}
		
echo '</table>';
   
$conn = null;
?>
</p>  </th>
