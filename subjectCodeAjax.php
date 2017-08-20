
<table width="90%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#CCCCCC">
  	<th width="8%">Code </td>
    <th width="30%"> Subject Name </td>
    <th width="8%"> Stream </th>
    <th width="8%"> Yr./Sem.  </th>
	<th width="10%"> Int. Marks  </th>
	<th width="10%"> Fin. Marks  </th>
	<th width="10%"> Pr. Marks  </th>
	<th width="8%"> Remarks  </th>
  <p><?php
include("dbconfig.php");
//include("clgCode.php");
$commentBy=$_POST['subjname'];

 	if(strlen($commentBy)<2)
		{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
	else
	{
  $sql="select distinct * from subjectList where subjCode like ? ";
  $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute($params);
	//require_once('runQuery.php');
echo '<form name="editSubj" id="editSubj" method="Post">';	
	$i=0;
	while ($row = $stmt->fetch()) 
	{
		$subjCode = $row{'subjCode'};
		$subjName = $row{'subjName'};
		$subjStream = $row{'subjStream'};
		$subjYrSem = $row{'subjYrSem'};
		$intMarks = $row{'intMarks'};
		$extMarks = $row{'extMarks'};
		$pMarks = $row{'pMarks'};
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td>'.$subjCode.'</td><td>'. $subjName .'</td><td align="center">'.$subjStream.'</td><td Align="Center">'.$subjYrSem.'</td><td Align="Center"> '.$intMarks.' </td><td Align="Center"> '.$extMarks.' </td><td Align="Center">'.$pMarks.'</td>
		<td Align="left"><A HREF="javascript:submitSubjEdit(\''.$subjCode.'\')">Edit</A> / <A HREF="./BESyllabus/'.$subjCode.'.pdf" target="_blank"">View </A>  </td></tr>';
	//<input type="button" id="'.$subjCode.'" onClick="submitSubjEdit()" value="Edit"/>
	$i++;
	}
	echo '</form></table>'; 
	}
	
 
$conn = null;
?>
</p>  </th>
