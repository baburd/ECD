
<table width="100%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#CCCCCC">
    <th width="6%">Code </td>
    <th width="15%">Subject Name</th>
    <th width="7%">Stream-Semester</th>
    <th width="72%">Teacher Details(<i>Name,Effective Expr.,Contact,Affiliation,Upper Most Degree,Currently Teaching or Not</i>)</th>
   </tr>
  
  <p><?php
include('dbconfig.php');
$commentBy=$_POST['name'];

 	if(strlen($commentBy)>1)
	{
  $sql="select distinct subjCode, subjName, subjStream, subjYrSem from `subjectList` where subjName like ?" ;
	//$result = mysql_query($sql) or die(mysql_error());
  $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute($params);	
  
  $i=1;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
	{
		$subCode = $row{'subjCode'};
		$subName = $row{'subjName'};
		$subStream = $row{'subjStream'};
		$subSem = $row{'subjYrSem'};
		
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		
		echo '<td Align="left">'.$subCode.'</td><td Align="left">'. $subName .'</td><td Align="left" >'.$subStream.'-'.$subSem.'</td><td Align="Left"><i>'.teacherDetails($subCode,$conn).'</i></td></tr>';
		$i++;
		}
	}
	else
	{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
echo '</table>';
   

function expertSubject($expertID,$conn)
{
$sql = "select subjectList.subjName as subName, subjectList.subjStream as subStream, subjectList.subjSem as subSem from `subjectList` where subjectList.subjCode in (select expertSubj.subjCode from `expertSubj` where expertSubj.expertID = '". $expertID."')";
//$rslt = mysql_query($sql) or die( mysql_error());
require_once('runQuery.php');

$strAll='';
while ($row1 = $stmt->fetch(PDO::FETCH_ASSOC)) 
	{
	$strAll=$strAll.'('.$row1{'subName'}.', '. $row1{'subStream'}.', '.$row1{'subSem'}.'),<br/>';
	}
	
	return $strAll;
}

function teacherDetails($subCode,$conn)
{
$sql = "select a.subjCode, a.expertID, a.effectiveYear, b.expertName, b.expertContact1, b.expertContact2,b.expertEmail, b.expertAff, b.expertType, b.expertDegree,a.isActive from expertsubj as a,expertlist as b where a.subjCode='". $subCode."' and (b.expertID=a.expertID) order by a.effectiveYear desc";

//echo $sql.'<br/>';

include('runQuery.php');

$strAll='';
while ($row1 = $stmt->fetch(PDO::FETCH_ASSOC)) 
	{
	$actvStatus=$row1{'isActive'}?"Active":"inActive";
	$strAll=$strAll.'<b>'.$row1{'expertName'}.'</b>, '. $row1{'effectiveYear'}.' years, '.$row1{'expertContact1'}. ',<b> '.$row1{'expertContact2'}.'</b>, '.$row1{'expertEmail'}.', '.$row1{'expertAff'}.'-'.$row1{'expertType'}.','.$row1{'expertDegree'}.', '.$actvStatus.'<br/>';
	}
	
	return $strAll;
}


$conn=null
?>
  </p>  </th>
