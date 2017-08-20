
<table width="95%" align="center" cellspacing="2"  cellpadding="1">
  <tr bgcolor="#CCCCCC">
  	<th width="10%">Subj. Code </td>
    <th width="20%">Subj. Name </td>
    <th width="5%">Subj. Yr/Sem </th>
    <th width="10%">Expert ID  </th>
    <th width="20%">Expert Name  </th>
	<th width="5%">Entry Year  </th>
    <th width="10%">Eff. Exp.  </th>
	<th width="10%"> Total Exp. </th>
	<th width="5%">Remarks  </th>
	</tr>
  
  <p><?php
include("dbconfig.php");
//include("clgCode.php");
$commentBy=$_POST['exprname'];

 	if(strlen($commentBy)<2)
		{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
	else
	{
  $sql="select a.subjCode,b.subjName,b.subjYrSem,a.expertID,c.expertName,a.isActive,a.effectiveYear,a.yearFor,c.expertExp from expertSubj as a, subjectList as b, expertList as c where (a.subjCode like ?) and 
(a.subjCode=b.subjCode and a.expertID=c.expertID)";
  $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute($params);
	//require_once('runQuery.php');
	
	$i=0;
	while ($row = $stmt->fetch()) 
	{
		$subjCode = $row{'subjCode'};
		$subjName = $row{'subjName'};
		$subjYrSem = $row{'subjYrSem'};
		$expertID = $row{'expertID'};
		$expertName = $row{'expertName'};
		$isActive = $row{'isActive'}==1?'<font color="BLUE">Active</font>':'<font color="RED">Disabled</font>';
		$effectiveYear = $row{'effectiveYear'};
		$yearFor = $row{'yearFor'};
		$expertExp = $row{'expertExp'};
			
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td>'.$subjCode.'<td>'.$subjName.'</td><td>'.$subjYrSem.'</td><td Align="Center">'.$expertID.'</td><td align="left">'.$expertName.':'.$isActive.'</td><td>'.$yearFor.'</td><td align="center">'.$effectiveYear.'</td><td>'.$expertExp.'</td><td Align="Center"><A HREF="javascript:submitExprSubjEdit(\''.$subjCode.'\',\''.$expertID.'\')">Edit</A></td></tr>';
	
	$i++;
	}
	echo '</table>'; 
	}
	
 
$conn = null;
?>
</p>  </th>
