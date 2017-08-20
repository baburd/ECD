
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
  
  $i=0;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
	{
		$subCode = $row{'subjCode'};
		$subName = $row{'subjName'};
		$subStream = $row{'subjStream'};
		$subSem = $row{'subjYrSem'};
		/*$exprHomePh = $row{'expertContact1'};
		$exprMobile = $row{'expertContact2'};
		$exprEmail = $row{'expertEmail'};
		$exprUpprDegree = $row{'expertDegree'};
		$exprAff = college($row{'expertAff'},$conn);
		$exprType = $row{'expertType'};
		$exprStatus = $row{'isActive'}==1? "Teaching": "Not Teaching";*/
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
   
function college($str)
{
switch($str)
{
case "PUL": $str="Pulchowk Campus";break;
case "THA": $str = "Thapathali Engg."; break;
case "PAS": $str = "Paschimanchal Engg."; break;
case "PUR": $str = "Purwanchal Engg."; break;
case "KTH": $str = "Kathmandu Engg."; break;
case "KAN": $str = "Kantipur Engg."; break;
case "ACE": $str = "Advance Engg."; break;
case "LEC": $str = "Lalitpur Engg."; break;
case "NCE": $str = "National Engg."; break;
case "HCE": $str = "Himalaya Engg."; break;
case "KCE": $str = "Khowpa Engg."; break;
case "JEC": $str = "Janakpur Engg."; break;
case "KIC": $str = "Kathford Engg."; break;
}
return $str;
}

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
$sql = "select subjCode, expertSubj.expertID, effectiveYear, expertName, expertContact1, expertContact2,expertEmail, expertAff, expertType, expertDegree,isActive from expertsubj,expertlist where expertsubj.subjCode='". $subCode."' and (expertList.expertID=expertSubj.expertID) order by effectiveYear desc";

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
