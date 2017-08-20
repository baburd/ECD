<script src="css/jquery-latest.js"></script>

<script language="javascript">

function updateSubjectDB() {

 
	var expertID = $("#expertID").val();
	var expertName = $("#expertName").val();
	var expertStream = $("#expertStream").val();
	var expertContact = $("#expertContact").val();
	var expertEmail = $("#expertEmail").val();
	var expertArea = $("#expertArea").val();
	var expertRemarks = $("#expertRemarks").val();
	
var sqlSTR = "update projectExperts set expertName='"+expertName+"',expertStream='"+expertStream+"',expertContact='"+expertContact+"',expertEmail='"+expertEmail+"',expertArea='"+expertArea+"',expertRemarks='"+expertRemarks+"' where expertID='"+expertID+"'";
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

function insertSubjectDB() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewUpdateDetails').html(htmlData);
 
	var expertID = $("#expertID").val();
	var expertName = $("#expertName").val();
	var expertStream = $("#expertStream").val();
	var expertContact = $("#expertContact").val();
	var expertEmail = $("#expertEmail").val();
	var expertArea = $("#expertArea").val();
	var expertRemarks = $("#expertRemarks").val();
	var sqlSTR = "insert into projectExperts values('"+expertID+"','"+expertName+"','"+expertStream+"','"+expertContact+"','"+expertEmail+"','"+expertArea+"','"+expertRemarks+"')";
	yesno=confirm('Are you sure you want to Insert this Record?');
	
	if(yesno)
	{
	$.post("updateRecord.php", { sqlSTR: sqlSTR, }, function(data) {
	 $('#viewUpdateDetails').html(data);
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
  $sql="select * from projectExperts where expertID= '".$commentBy."'";
  //echo $sql;
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch();
	//require_once('runQuery.php');
		$expertID = $row{'expertID'};
		$expertName = $row{'expertName'};
		$expertStream = $row{'expertStream'};
		$expertContact = $row{'expertContact'};
		$expertEmail = $row{'expertEmail'};
		$expertArea = $row{'expertArea'};
		$expertRemarks = $row{'expertRemarks'};
	}		
	$conn = null;
	?>
<table width="75%" align="center" cellspacing="2"  cellpadding="0">
<tr><td align="right">Expert ID:</td> <td><input type="text" name="expertID" id="expertID" value="<?php echo $expertID ?>" /></td></tr>
<tr><td align="right">Expert Name:</td> <td><input type="text" ize="50" name="expertName" id="expertName" value="<?php echo $expertName ?>" /></td></tr>
<tr><td align="right">Stream:</td> <td><input type="text" name="expertStream" id="expertStream" value="<?php echo $expertStream ?>" /></td></tr>
<tr><td align="right">Mobile:</td> <td><input type="text" name="expertContact" id="expertContact" value="<?php echo $expertContact?>" /></td></tr>
<tr><td align="right">E-Mail:</td> <td><input type="text" name="expertEmail" id="expertEmail" value="<?php echo $expertEmail?>" /></td></tr>
<tr><td align="right">Areas:</td> <td><input type="text" name="expertArea" id="expertArea" value="<?php echo $expertArea?>" /></td></tr>
<tr><td align="right">Remarks:</td> <td><input type="text" name="expertRemarks" id="expertRemarks" value="<?php echo $expertRemarks?>" /></td></tr>
<tr><td align="center" colspan="2">
<input type="button"  id="btnPostEdit" onclick="updateSubjectDB()" value="Submit/Update"/>
<input type="button"  id="btnPostInsert" onclick="insertSubjectDB()" value="Insert New"/>
</td>
</table>


  <br/>
   <div id="viewUpdateDetails">
   <!-- All data will display here  -->
  </div>
