
<table width="98%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#CCCCCC">
  	<th width="18%">Name </td>
    <th width="10%">Post Title </td>
    <th width="20%">Org./Department </th>
    <th width="10%">Mobuile No </th>
    <th width="10%">E-Mail</th>
    <th width="12%">Duration </th>
    <th width="18%">Description</th>
	<th width="18%">Remarks</th>
    </tr>
  
  <p><?php
include("dbconfig.php");

$commentBy=$_POST['postname'];

 	if(strlen($commentBy)>1)
	{
  $sql="select * from postHolders where postTitle like ?";
  $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute($params);
	//require_once('runQuery.php');
	echo '<form name="postForm" id="postForm" method="post">';
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

		//$postData = array($cName, $postTitle, $campusDept, $mobileNo, $email, $dateFromTo, $remarks);
		 
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td Align="left">'.$cName.'<td Align="left">'.$postTitle.'</td><td Align="left">'. $campusDept .'</td><td Align="Center" >'.$mobileNo.':<A HREF="javascript:sendSMS(\''.$mobileNo.'\')">SMS</A></td><td Align="Center">'.$email.'</td><td Align="left">'.$dateFromTo.'</td><td Align="left">'.$remarks.'</td> <td Align="Center"><A HREF="javascript:submitPostEdit(\''.$cName.'\')">Edit</A>  </td></tr>';
	
	$i++;
	}
	echo  '</form>';
	}
	else
	{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
echo '</table>';

$conn = null;
?>
</p>  </th>

