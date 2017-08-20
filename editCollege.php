<html>
<head>

<script src="css/jquery-latest.js"></script>

<script language="javascript">

function updateExpertDB() {
	
	var collegeCode = $("#collegeCode").val();
	var collegeName = $("#collegeName").val();
	var chiefName = $("#chiefName").val();
	var chiefContact = $("#chiefContact").val();
	var chiefEmail = $("#chiefEmail").val();
	var examName = $("#examName").val();
	var examContact = $("#examContact").val();
	var examEmail = $("#examEmail").val();
	var centerCapacity = $("#centerCapacity").val();
	var collegeAddr = $("#collegeAddr").val();

	
var sqlSTR = "update collegeInfo set collegeName='"+collegeName+"',chiefName='"+chiefName+"',chiefContact='"+chiefContact+"',chiefEmail='"+chiefEmail+"',examHeadName='"+examName+"',examHeadContact='"+examContact+"',examHeadEmail='"+examEmail+"',centerCapacity='"+centerCapacity+"',collegeAddr='"+collegeAddr+"' where collegeCode='"+collegeCode+"'";
	//alert(sqlSTR);
	yesno=confirm('Are you sure you want to Update this Record?');
	 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewUpdateDetails').html(htmlData);
	
	if(yesno)
	{
	$.post("updateRecord.php", { sqlSTR: sqlSTR, }, function(data) {
	 $('#viewUpdateDetails').html(data);
	 //$('#myExprForm')[0].reset();
    });	
	}
}

function insertExpertDB() {
	var collegeCode = $("#collegeCode").val();
	var collegeName = $("#collegeName").val();
	var chiefName = $("#chiefName").val();
	var chiefContact = $("#chiefContact").val();
	var chiefEmail = $("#chiefEmail").val();
	var examName = $("#examName").val();
	var examContact = $("#examContact").val();
	var examEmail = $("#examEmail").val();
	var centerCapacity = $("#centerCapacity").val();
	var collegeAddr = $("#collegeAddr").val();
	var sqlSTR = "insert into collegeInfo values('"+collegeCode+"','"+collegeName+"','"+chiefName+"','"+chiefContact+"','"+chiefEmail+"','"+examName+"','"+examContact+"','"+examEmail+"','"+centerCapacity+"','"+collegeAddr+"')";
	//alert(sqlSTR);
	yesno=confirm('Are you sure you want to Insert this Record?');
	 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewUpdateDetails').html(htmlData);

	if(yesno)
	{
	$.post("updateRecord.php", { sqlSTR: sqlSTR, }, function(data) {
	 $('#viewUpdateDetails').html(data);
	 //$('#myExprForm')[0].reset();
    });	
	}
}
</script>
<title></title>
</head>
<body>
<?php

session_start();

if(!$_SESSION["user_name"])
{header("Location:login.php");die();}

include("dbconfig.php");
//include("clgCode.php");
$commentBy=$_GET['code'];

 	if(strlen($commentBy)<2)
		{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
	else
	{
  $sql="select * from collegeInfo where collegeCode= '".$commentBy."'";
  //echo $sql;
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch();
	//require_once('runQuery.php');
		$collegeCode = $row{'collegeCode'};
		$collegeName = $row{'collegeName'};
		$chiefname = $row{'chiefName'};
		$chiefContact = $row{'chiefContact'};
		$chiefEmail = $row{'chiefEmail'};
		$examName = $row{'examHeadName'};
		$examContact = $row{'examHeadContact'};
		$examEmail = $row{'examHeadEmail'};
		$centerCapacity = $row{'centerCapacity'};
		$collegeAddr = $row{'collegeAddr'};
	}		
	$conn = null;
	?>

<table>
<tr><td align="right">College Code:</td> <td><input type="text" name="collegeCode" id="collegeCode" value="<?php echo $collegeCode ?>" /></td></tr>
<tr><td align="right">College Name:</td> <td><input type="text" ize="50" name="collegeName" id="collegeName" value="<?php echo $collegeName ?>" /></td></tr>
<tr><td align="right">Chief Name:</td> <td><input type="text" name="chiefName" id="chiefName" value="<?php echo $chiefname ?>" /></td></tr>
<tr><td align="right">Chief Mobile:</td> <td><input type="text" name="chiefContact" id="chiefContact" value="<?php echo $chiefContact?>" /></td></tr>
<tr><td align="right">Chief Email:</td> <td><input type="text" name="chiefEmail" id="chiefEmail" value="<?php echo $chiefEmail?>" /></td></tr>
<tr><td align="right">Exam Head:</td> <td><input type="text" name="examName" id="examName" value="<?php echo $examName?>" /></td></tr>
<tr><td align="right">Exam Contact:</td> <td><input type="text" name="examContact" id="examContact" value="<?php echo $examContact?>" /></td></tr>
<tr><td align="right">Exam Email:</td> <td><input type="text" name="examEmail" id="examEmail" value="<?php echo $examEmail?>" /></td></tr>
<tr><td align="right">Center Capacity:</td> <td><input type="text" name="centerCapacity" id="centerCapacity" value="<?php echo $centerCapacity?>" /></td></tr>
<tr><td align="right">Address:</td> <td><input type="text" name="collegeAddr" id="collegeAddr" value="<?php echo $collegeAddr?>" /></td></tr>
<tr><td align="center" colspan="2">
<input type="button"  id="btnExpertEdit" onClick="updateExpertDB()" value="Submit/Update"/>
<input type="button"  id="btnExpertInsert" onClick="insertExpertDB()" value="Insert New"/>
</td></tr>
</table>


  <br/>
   <div id="viewUpdateDetails">
   <!-- All data will display here  -->
  </div>

</body>
</html>