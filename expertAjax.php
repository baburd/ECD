
<table width="100%" align="center" cellspacing="2"  cellpadding="1">
  <tr bgcolor="#CCCCCC">
  	<th width="10%">Expert ID </td>
    <th width="20%">Expert Name </td>
    <th width="5%">Expr. </th>
    <th width="10%">Mobile No  </th>
    <th width="10%">E-Mail  </th>
	<th width="5%">Aff.  </th>
	<th width="10%">Upper Degree  </th>
	<th width="5%">Aff.Type  </th>
	<th width="5%">Status  </th>
	<th width="20%">Remarks  </th>
	</tr>
  
  <p><?php
include("dbconfig.php");
//include("clgCode.php");
$commentBy=$_POST['exprname'];

 	if(strlen($commentBy)<2)
		{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
	else
	{
  $sql="select distinct * from expertList where expertName like ?";
  $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute($params);
	//require_once('runQuery.php');
	
	$i=0;
	while ($row = $stmt->fetch()) 
	{
		$expertID = $row{'expertID'};
		$expertName = $row{'expertName'};
		$expertExp = $row{'expertExp'};
		//$expertContact1 = $row{'expertContact1'};
		$expertContact2 = $row{'expertContact2'};
		$expertEmail = $row{'expertEmail'};
		$expertAff = $row{'expertAff'};
		$expertDegree = $row{'expertDegree'};
		$expertType = $row{'expertType'};
		$isActive = $row{'isActive'}==1?"Active":"Non-Active";
			
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td>'.$expertID.'<td>'.$expertName.'</td><td>'. $expertExp .'</td><td Align="Center">'.$expertContact2.':<A HREF="javascript:sendSMS(\''.$expertContact2.'\')">SMS</A></td><td Align="left">'.$expertEmail.'</td><td>'.$expertAff.'</td><td>'.$expertDegree.'</td><td>'.$expertType.'</td><td>'.$isActive.'</td><td Align="Center" width="20%"><A HREF="javascript:submitExprEdit(\''.$expertID.'\')">Modify</A> / <A HREF="javascript:submitExprSubjEdit(\'S-Code\',\''.$expertID.'\')">Add Subject</A>/<A HREF="javascript:submitAssignPacket(\''.$expertID.'\')"><font color="GREEN">Assign PKT</font></A></td></tr>';
	
	$i++;
	}
	echo '</table>'; 
	}
	
 
$conn = null;
?>
</p>  </th>
