<?Php
include('dbconfig.php'); // connection details
error_reporting(0);// With this no error reporting will be there

$endrecord=$_GET['endrecord'];// 
if(strlen($endrecord) > 0 AND (!is_numeric($endrecord))){
echo "Data Error";
exit;
} 

$limit=10; // Number of records per page, you can change this value

$total_records = $conn->query("select count(subjCode) from subjectList")->fetchColumn();

if($endrecord < $limit) {$endrecord = 0;}

switch($_GET['direction'])   // Let us know forward or backward button is pressed
{
case "fw":   // Forward button pressed
$start_record = $endrecord ;
break;

case "bk":    // Backword button pressed
$start_record = $endrecord - 2*$limit;
break;

default:
echo "Data Error";
exit;
break;
}
if($start_record < 0){$start_record=0;}
$endrecord =$start_record+$limit;


$sql="SELECT distinct * from expertList where 1 order by expertName asc limit $start_record,$limit"; 
$row=$conn->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$conn=null;
if(($endrecord) < $total_records ){$end="yes";}  // managing forward button
else{$end="no";}

if(($endrecord) > $limit ){$startrecord="yes";}    // managing reverse button
else{$startrecord="no";}

$main = array('data'=>$result,'value'=>array("endrecord"=>"$endrecord","limit"=>"$limit","end"=>"$end","startrecord"=>"$startrecord"));
echo json_encode($main); 
?>