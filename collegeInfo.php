<script language="javascript">

function submitCollegeEdit(sCode)
{
//alert(sCode)
var editWindow=window.open("editCollege.php?code="+sCode+"",'_blank','scrollbars=no,resizable=no,top=300,left=500,height=350,width=400');
editWindow.focus();
}
</script>

<?php
if(!$_SESSION["user_name"])
header("Location:login.php");
?>

<table width="100%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#CCCCCC">
  <th width="4%">&nbsp SNo &nbsp</td>
  	<th width="4%">&nbsp Code &nbsp</td>
    <th width="15%">&nbsp College Name&nbsp</td>
    <th width="11%">&nbsp Chief Name &nbsp</th>
    <th width="8%">&nbsp Chief Contact &nbsp</th>
    <th width="10%">&nbsp Chief E-Mail &nbsp</th>
    <th width="10%">&nbsp Exam Chief Name &nbsp</th>
    <th width="8%">&nbsp Exam Contact &nbsp</th>
	<th width="10%">&nbsp Exam E-Mail &nbsp</th>
	<th width="4%">&nbsp Capacity &nbsp</th>
	<th width="18%">&nbsp Address &nbsp</th>
	<th width="4%">Remarks</th>
	</tr>
  
  <p><?php
include("dbconfig.php");

  $sql="select * from collegeInfo where 1";
  //$params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute();
	//require_once('runQuery.php');
	
	$i=1;
	while ($row = $stmt->fetch()) 
	{
		$collegeCode = $row{'collegeCode'};
		$collegeName = $row{'collegeName'};
		$chiefName = $row{'chiefName'};
		$chiefContact = $row{'chiefContact'};
		$chiefEmail = $row{'chiefEmail'};
		$examName = $row{'examHeadName'};
		$examContact = $row{'examHeadContact'};
		$examEmail = $row{'examHeadEmail'};
		$centerCapacity = $row{'centerCapacity'};
		$collegeAddr = $row{'collegeAddr'};
		
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td Align="Center">'.$i.'<td Align="left">'.$collegeCode.'<td Align="left">'.$collegeName.'</td><td Align="left">'. $chiefName .'</td><td Align="Center" >'.$chiefContact.':<A HREF="javascript:sendSMS(\''.$chiefContact.'\')">SMS</A></td><td Align="Center">'.$chiefEmail.'</td><td Align="left">'.$examName.'</td><td Align="left">'.$examContact.':<A HREF="javascript:sendSMS(\''.$examContact.'\')">SMS</A></td><td Align="left">'.$examEmail.'</td><td Align="center">'.$centerCapacity.'</td><td Align="left">'.$collegeAddr.'<td Align="Center"><A HREF="javascript:submitCollegeEdit(\''.$collegeCode.'\')">Edit</A></td></tr>';
	
	$i++;
	}
echo '</table>';
   
$conn = null;
?>
</p>  </th>
