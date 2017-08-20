
<?php
session_start();
if(!$_SESSION["user_name"])
header("Location:login.php");
?>
<table width="50%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#FFF9F9">
  <td colspan="2"><h2> ECD Chief/Deputy-Chief</h2></td></tr>
<?php
include("dbconfig.php");

  $sql="select distinct * from ecdTeam where postTitle like '% Chief'";
 // $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute();
	//require_once('runQuery.php');
	
	$i=1;
	while ($row = $stmt->fetch()) 
	{
		$ecdID = $row{'ecdID'};
		$cName = $row{'cName'};
		$postTitle = $row{'postTitle'};
		$email = $row{'email'};
		$mobilePhone = $row{'mobilePhone'};
		$ecdPhone = $row{'ecdPhone'};
		$officeCabin = $row{'officeCabin'};
		$remarks = $row{'remarks'};
		$imgPath = $row{'imgPath'};
		//$exprStatus = $row{'isActive'}==1? "Teaching": "Not Teaching";
		if($i%2==0)
		echo '<tr bgcolor="#FFC9A9" hspace="4" vspace="4">';
		else 
		echo '<tr bgcolor="#FFF8D9" hspace="4" vspace="4">';
		 
		echo '<td Align="center" width="20%"><img src="'.$imgPath.'" height="140" width="120" /></td><td Align="left"> Name: <b>'.$cName.'</b><br/>Post at ECD: '. $postTitle .'<br/>e-Mail: '.$email.'<br/>Mobile Phone: '.$mobilePhone.'<br/>Internal Phone: '.$ecdPhone.'<br/>Office Cabin: '.$officeCabin.'<br/>Remarks: '.$remarks.'</td></tr>';
		 echo '<tr><td colspan="2"> &nbsp;</td></tr>';
	$i++;
	}
	/*
	echo '<tr><td colspan="2"> <br/><h3>Core Research and Development Team</h3></td></tr>';
	
  $sql="select distinct * from lictTeam where lictType ='Core' order by lictID asc";
 // $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  while ($row = $stmt->fetch()) 
	{
		$lictID = $row{'lictID'};
		$lictTitle = $row{'lictTitle'};
		$lictName = $row{'lictName'};
		$ioePost = $row{'ioePost'};
		$contactEmail = $row{'contactEmail'};
		$contactPhone = $row{'contactPhone'};
		$personalURL = $row{'personalURL'};
		$pubLink = $row{'pubLink'};
		$imgPathName = $row{'imgPathName'};
		$lictRemarks = $row{'lictRemarks'};
		//$exprStatus = $row{'isActive'}==1? "Teaching": "Not Teaching";
		if($i%2==0)
		echo '<tr bgcolor="#FFF9F9">';
		else 
		echo '<tr bgcolor="#FFF8D9">';
		 
		echo '<td Align="center"><img src="./images/'.$imgPathName.'" height="140" width="120"/></td><td Align="left"> Name: <b>'.$lictName.'</b><br/>LICT Title:<b> '. $lictTitle .'</b><br/>Post at IOE: '. $ioePost .'<br/>e-Mail: '.$contactEmail.'<br/>Phone: '.$contactPhone.'<br/>URL: <a href="'.$personalURL.'" target="_blank"> Visit Profile</a><br/><a href="'.$pubLink.'" target="_blank"> View Publications</a><br/>Remarks: '.$lictRemarks.'</td></tr>';
	 echo '<tr><td colspan="2"> &nbsp;</td></tr>';
	$i++;
	}
*/
echo '</table>';
   
$conn = null;
?>
</p>  </th>
