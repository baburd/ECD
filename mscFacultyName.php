
<table width="95%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#CCCCCC">
  	<th width="8%">ID </td>
    <th width="15%">Name </td>
    <th width="5%">Home PH </th>
    <th width="8%">Mobile </th>
    <th width="10%">Email. </th>
    <th width="20%">Subjects YR/SEM </th>
    <th width="20%">Expert Area </th>
	<th width="15%">Remarks </th>
    </tr>
  
  <p><?php
include("dbconfig.php");

$commentBy=$_POST['name'];

 	if(strlen($commentBy)>1)
	{
  $sql="select distinct * from mscFaculty where facultyName like ?";
  $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute($params);
	//require_once('runQuery.php');
	
	$i=0;
	while ($row = $stmt->fetch()) 
	{
		$facultyID = $row{'facultyID'};
		$facultyName = $row{'facultyName'};
		$facultyHomeNo = $row{'facultyHomeNo'};
		$facultyMobile = $row{'facultyMobile'};
		$facultyEmail = $row{'facultyEmail'};
		$facultySubjectYear = $row{'facultySubjectYear'};
		$facultyExpertArea = $row{'facultyExpertArea'};
		$facltyRemarks = $row{'facultyRemarks'};
		//$exprStatus = $row{'isActive'}==1? "Teaching": "Not Teaching";
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td Align="Center">'.$facultyID.'<td Align="left">'.$facultyName.'</td><td Align="Center">'. $facultyHomeNo .'</td><td Align="Center" >'.$facultyMobile.'</td><td Align="left">'.$facultyEmail.'</td><td Align="left">'.$facultySubjectYear.'</td><td Align="left">'.$facultyExpertArea.'</td><td Align="left">'.$facltyRemarks.'</td></tr>';
	
	$i++;
	}
	
	}
	else
	{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
echo '</table>';
   
$conn = null;
?>
</p>  </th>
