
<table width="95%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#CCCCCC">
  	<th>ID </td>
    <th>Name of Teacher </td>
    <th>Expr.</th>
    <th>Home PH </th>
    <th>Mobile </th>
    <th>Email Addr. </th>
    <th>Upper Degree </th>
    <th>Affiliation </th>
	<th>Aff. Type </th>
    <th>Cur. Status </th>
    <th>Subj./Stream/Sem.</th>
  </tr>
  
  <p><?php
include("dbconfig.php");

$commentBy=$_POST['name'];

 	if(strlen($commentBy)>1)
	{
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
		$exprRemarks = college($row{'expertRemarks'});
		
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td Align="Center">'.$exprID.'<td Align="Center">'.$exprName.'</td><td Align="Center">'. $exprStream .'</td><td Align="Center" >'.$exprContact.'</td><td Align="Center">'.$exprEmail.'</td><td Align="Center">'.$exprArea.'</td><td Align="Center">'.$exprRemarks.'</td></tr>';
	
	$i++;
	}
	
	}
	else
	{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
echo '</table>';
   
$conn = null;
?>
</p>  </th>
