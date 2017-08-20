
<table width="95%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#CCCCCC">
  	<th>Ref. No </td>
    <th>Expert ID </td>
    <th>Expert Name</th>
    <th>Subject Code</th>
    <th>Program Name</th>
    <th>Year/Semester </th>
    <th>Subject Name </th>
    <th>College Name </th>
	<th>Total Q. </th>
    <th>Effective Year </th>
	<th>Status </th>
    </tr>
  
  <p><?php
include("dbconfig.php");

$yr=$_POST['yearName'];
$semType=$_POST['semType'];
$refStart=$_POST['refStart'];
$refEnd=$_POST['refEnd'];
$lbl=$_POST['lbl'];

if(strlen($refStart)<1 or strlen($refEnd)<1)
	{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
  $commentBy = 	$yr.'-'.$semType;
$sql='select distinct * from appointQExpert where effYearSem =\''.$commentBy.'\' and label =\''.$lbl.'\' and refNo between '.$refStart.' and '.$refEnd;
//echo $sql;
  $stmt=$conn->prepare($sql);
  $stmt->execute();
	//require_once('runQuery.php');
	
	$i=0;
	while ($row = $stmt->fetch()) 
	{
		
		$refNo = $row{'refNo'};
		$exprID = $row{'expertID'};
		$exprName = $row{'expertName'};
		$pCode = $row{'pCode'};
		$pName = $row{'pName'};
		$yrSem = $row{'pYrSem'};
		$subjName = $row{'subjName'};
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
		 
		echo '<td Align="Center">'.$refNo.'<td Align="Center">'.$exprID.'</td><td Align="left">'. $exprName .'</td><td Align="Center" >'.$pCode.'</td><td Align="Center">'.$pName.'</td><td Align="Center">'.$yrSem.'</td><td Align="left">'.$subjName.'</td><td Align="left">'.$collegeName.'</td><td Align="Center">'.$qTotal.'</td><td Align="Center">'.$effYearSem.'</td><td Align="Center">'.$status.'</td></tr>';
	
	$i++;
	}
		
echo '</table>';

$conn = null;
?>
</p>  </th>
