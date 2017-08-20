
<table width="98%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#CCCCCC">
  	<th width="18%">Name </td>
    <th width="10%">Post Title </td>
    <th width="20%">Org./Department </th>
    <th width="10%">Mobile No </th>
    <th width="10%">E-Mail</th>
    <th width="12%">Duration </th>
    <th width="18%">Remarks</th>
    </tr>
  
  <p><?php
include("dbconfig.php");

$commentBy=$_POST['postname'];

 	if(strlen($commentBy)>1)
	{
  $sql="select * from postHolders where cName like ?";
  $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute($params);
	//require_once('runQuery.php');
	
	$i=0;
	while ($row = $stmt->fetch()) 
	{
		$cName = $row{'cName'};
		$postTitle = $row{'postTitle'};
		$campusDept = $row{'campusDept'};
		$mobileNo = $row{'mobileNo'};
		$email = $row{'email'};
		$dateFromTo = $row{'dateFromTo'};
		$remarks = $row{'remarks'};
		
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td Align="Center">'.$cName.'<td Align="Center">'.$postTitle.'</td><td Align="Center">'. $campusDept .'</td><td Align="Center" >'.$mobileNo.':<br/><A HREF="javascript:sendSMS(\''.$mobileNo.'\')">SMS</A></td><td Align="Center">'.$email.'</td><td Align="Center">'.$dateFromTo.'</td><td Align="Center">'.$remarks.'</td></tr>';
	
	$i++;
	}
	
	}
	else
	{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
echo '</table>';
   
$conn = null;
?>
</p>  </th>
