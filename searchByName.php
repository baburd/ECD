<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>

<table width="100%" align="center" cellspacing="2"  cellpadding="0">
 <tr><td align="right" colspan="10"><A HREF="javascript:submitSubjExprInsert()"><span class="style1">Click to Insert Subject Specific Experiences</span></A> </td>
 </tr>
  <tr bgcolor="#CCCCCC">
  	<th width="8%">ID </td>
    <th width="12%">Name </td>
    <th width="5%">Expr.</th>
    <th width="5%">Home PH </th>
    <th width="10%">Mobile </th>
    <th width="10%">Email. </th>
    <th width="15%">Upper Degree </th>
    <th width="5%">Org. Aff. </th>
	<th width="5%">Aff. Type </th>
    <th width="27%">Subj./Stream/Sem.</th>
  </tr>
  
  <p><?php
include("dbconfig.php");

$commentBy=$_POST['name'];

 	if(strlen($commentBy)>1)
	{
  $sql="select distinct * from expertList where expertName like ?";
  $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute($params);
	//require_once('runQuery.php');
	
	$i=0;
	while ($row = $stmt->fetch()) 
	{
		$exprID = $row{'expertID'};
		$exprName = $row{'expertName'};
		$exprExp = $row{'expertExp'};
		$exprHomePh = $row{'expertContact1'};
		$exprMobile = $row{'expertContact2'};
		$exprEmail = $row{'expertEmail'};
		$exprUpprDegree = $row{'expertDegree'};
		$exprAff = college($row{'expertAff'});
		$exprType = $row{'expertType'};
		//$exprStatus = $row{'isActive'}==1? "Teaching": "Not Teaching";
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td Align="Center">'.$exprID.'<td Align="Center">'.$exprName.'</td><td Align="Center">'. $exprExp .'</td><td Align="Center" >'.$exprHomePh.'</td><td Align="Center">'.$exprMobile.'</td><td Align="Center">'.$exprEmail.'</td><td Align="Center">'.$exprUpprDegree.'</td><td Align="Center">'.$exprAff.'</td><td Align="Center">'.$exprType.'</td><td Align="Center"><i>'.expertSubject($exprID,$conn).'</i></td></tr>';
	
	$i++;
	}
	
	}
	else
	{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
echo '</table>';
   
function college($str)
{
switch($str)
{
case "PUL": $str="Pulchowk Campus";break;
case "KEC": $str = "Kathmandu Engg."; break;
}
return $str;
}

function expertSubject($expertID,$conn)
{
$sql = "select distinct subjName, subjStream, subjYrSem from subjectList where subjCode in (select subjCode from expertSubj where expertID = '".$expertID."')";
//echo $sql;
include('runQuery.php');
//$rslt = mysql_query($sql) or die( mysql_error());
$strAll='';
while ($row1 = $stmt->fetch(PDO::FETCH_ASSOC)) 
	{
	$strAll=$strAll.$row1{'subjName'}.', '. $row1{'subjStream'}.', '.$row1{'subjYrSem'}.'<br/>';
	}
	return $strAll;
}

$conn = null;
?>
</p>  </th>
