<script src="css/jquery-latest.js"></script>

<script language="javascript">

function updatePostDB() {
	var cName = $("#cName").val();
	var postTitle = $("#postTitle").val();
	var campusDept = $("#campusDept").val();
	var mobileNo= $("#mobileNo").val();
	var email = $("#email").val();
	var dateFromTo = $("#dateFromTo").val();
	var remarks = $("#remarks").val();
	var sqlSTR = "update postHolders set postTitle='"+postTitle+"',campusDept='"+campusDept+"',mobileNo='"+mobileNo+"',email='"+email+"',dateFromTo='"+dateFromTo+"',remarks='"+remarks+"' where cName='"+cName+"'";
	//alert(sqlSTR);
	yesno=confirm('Are you sure you want to Update this Record?');
	
	 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewPostDetails').html(htmlData);

	if(yesno)
	{
	$.post("updateRecord.php", { sqlSTR: sqlSTR, }, function(data) {
	 $('#viewPostDetails').html(data);
	 //$('#myExprForm')[0].reset();
    });	
	}
}

function insertPostDB() {
    var cName = $("#cName").val();
	var postTitle = $("#postTitle").val();
	var campusDept = $("#campusDept").val();
	var mobileNo= $("#mobileNo").val();
	var email = $("#email").val();
	var dateFromTo = $("#dateFromTo").val();
	var remarks = $("#remarks").val();
	
	var sqlSTR = "insert into postHolders values('"+cName+"','"+postTitle+"','"+campusDept+"','"+mobileNo+"','"+email+"','"+dateFromTo+"','"+remarks+"')";
	//alert(sqlSTR);
	
	yesno=confirm('Are you sure you want to Insert this Record?');
	
	 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewPostDetails').html(htmlData);

	if(yesno)
	{
	$.post("updateRecord.php", { sqlSTR: sqlSTR, }, function(data) {
	 $('#viewPostDetails').html(data);
	 //$('#myExprForm')[0].reset();
    });	
	}
	
}
</script>

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
  $sql="select * from postHolders where cName= '".$commentBy."'";
  //echo $sql;
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch();
	//require_once('runQuery.php');
		$cName = $row{'cName'};
		$postTitle = $row{'postTitle'};
		$campusDept = $row{'campusDept'};
		$mobileNo = $row{'mobileNo'};
		$email = $row{'email'};
		$dateFromTo = $row{'dateFromTo'};
		$remarks = $row{'remarks'};
	}		
	$conn = null;
	?>
<table width="75%" align="center" cellspacing="2"  cellpadding="0">
<tr><td align="right">Subject Code:</td> <td><input type="text" name="cName" id="cName" value="<?php echo $cName ?>" /></td></tr>
<tr><td align="right">Subject Name:</td> <td><input type="text" ize="50" name="postTitle" id="postTitle" value="<?php echo $postTitle ?>" /></td></tr>
<tr><td align="right">Stream:</td> <td><input type="text" name="campusDept" id="campusDept" value="<?php echo $campusDept ?>" /></td></tr>
<tr><td align="right">Mobile No:</td> <td><input type="text" name="mobileNo" id="mobileNo" value="<?php echo $mobileNo ?>" /></td></tr>
<tr><td align="right">E-Mail:</td> <td><input type="text" name="email" id="email" value="<?php echo $email?>" /></td></tr>
<tr><td align="right">Appoint Period:</td> <td><input type="text" name="dateFromTo" id="dateFromTo" value="<?php echo $dateFromTo?>" /></td></tr>
<tr><td align="right">remarks:</td> <td><input type="text" name="remarks" id="remarks" value="<?php echo $remarks?>" /></td></tr>
<tr><td align="center" colspan="2">
<input type="button"  id="btnPostEdit" onclick="updatePostDB()" value="Submit/Update"/>
<input type="button"  id="btnPostInsert" onclick="insertPostDB()" value="Insert New"/>
</td>
</table>

<div id="viewPostDetails">
<!-- update details -->
</div>
