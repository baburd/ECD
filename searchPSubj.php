
<?php
$commentBy=$_POST['pname'];
$lbl=$_POST['lbl'];
echo '<table width="95%" align="center" cellspacing="2"  cellpadding="0">   <tr bgcolor="#CCCCCC"> <th>Expert Name </th> <th>CodeNo </th> <th>SubCode </th>  <th>Subject </th> <th>CopyNo </th> <th>Exam Name</th> <th>Issue Date </th> <th>Expert Contact </th> <th>Return Status </th> 	</tr>';

include("dbconfig.php");
   if(strlen($commentBy)<2 || strlen($lbl)<10 )
	{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
	
  $sql="select * from assignPacket where examName='".$lbl."' and subjName like '%".$commentBy."%'";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
 	$j=0;
	while ($row = $stmt->fetch()) 
	{
		$expertName = $row{'expertName'};
		$codeNo = $row{'codeNo'};
		$subCode = $row{'subCode'};
		$subjName = $row{'subjName'};
		$ansNo = $row{'ansNo'};
		$examName = $row{'examName'};
		$issueDate = date('Y-m-d',strtotime($row{'issueDate'}));
		$expertContact = $row{'expertContact'};
		$returnDate = $row{'returnDate'};
		$pReceipt='<font color="GREEN">Receipt On:'.date('Y-m-d',strtotime($returnDate)).'</font>';
	
		$dateTime = date('Y-m-d');
		$delays = $dateTime-$issueDate;
		$npReceipt='<a href="javascript:UpdatePReceipt(\''.$codeNo.'\',\''.$subCode.'\',\''.$dateTime.'\')"><font color="RED">Confirm Receipt(-'.$delays.')</font></a>';

		$pStatus = $returnDate==NULL?$npReceipt:$pReceipt;
	
		if($j%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td Align="Center">'.$expertName.'<td Align="Center">'.$codeNo.'</td><td Align="Center">'. $subCode .'</td><td Align="Center">'.$subjName.'</td><td Align="Center">'.$ansNo.'</td><td Align="Center">'.$examName.'</td><td Align="Center">'.$issueDate.'</td><td Align="Center">'.$expertContact.'</td><td Align="Center">'.$pStatus.'</td></tr>';
	
	$j++;
	}
		
$conn = null;

echo '</table>';
?>