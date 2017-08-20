<script src="css/jquery-latest.js"></script>
<script language="javascript">

function updateExpertDB() {

	var expertID = $("#expertID").val();
	var expertName = $("#expertName").val();
	var expertExp = $("#expertExp").val();
	var expertContact1 = $("#expertContact1").val();
	var expertContact2 = $("#expertContact2").val();
	var expertEmail = $("#expertEmail").val();
	var expertAff = $("#expertAff").val();
	var expertDegree = $("#expertDegree").val();
	var expertType = $("#expertType").val();
	var isActive = $("#isActive").val();
		
	
var sqlSTR = "update expertList set expertName='"+expertName+"',expertExp='"+expertExp+"',expertContact1='"+expertContact1+"',expertContact2='"+expertContact2+"',expertEmail='"+expertEmail+"',expertAff='"+expertAff+"',expertDegree='"+expertDegree+"',expertType='"+expertType+"',isActive='"+isActive+"' where expertID='"+expertID+"'";
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

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewUpdateDetails').html(htmlData);
 
 	var expertID = $("#expertID").val();
	var expertName = $("#expertName").val();
	var expertExp = $("#expertExp").val();
	var expertContact1 = $("#expertContact1").val();
	var expertContact2 = $("#expertContact2").val();
	var expertEmail = $("#expertEmail").val();
	var expertAff = $("#expertAff").val();
	var expertDegree = $("#expertDegree").val();
	var expertType = $("#expertType").val();
	var isActive = $("#isActive").val();
	var sqlSTR = "insert into expertList values('"+expertID+"','"+expertName+"','"+expertExp+"','"+expertContact1+"','"+expertContact2+"','"+expertEmail+"','"+expertAff+"','"+expertDegree+"','"+expertType+"','"+isActive+"')";
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
  $sql="select * from expertList where expertID= '".$commentBy."'";
  //echo $sql;
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch();
	//require_once('runQuery.php');
		$expertID = $row{'expertID'};
		$expertName = $row{'expertName'};
		$expertExp = $row{'expertExp'};
		$expertContact1 = $row{'expertContact1'};
		$expertContact2 = $row{'expertContact2'};
		$expertEmail = $row{'expertEmail'};
		$expertAff = $row{'expertAff'};
		$expertDegree = $row{'expertDegree'};
		$expertType = $row{'expertType'};
		$isActive = $row{'isActive'};
	}		
	$conn = null;
	?>
<table width="75%" align="center" cellspacing="2"  cellpadding="0">
<tr><td align="right">Expert ID:</td> <td><input type="text" name="expertID" id="expertID" value="<?php echo $expertID ?>" /></td></tr>
<tr><td align="right">Expert Name:</td> <td><input type="text" ize="50" name="expertName" id="expertName" value="<?php echo $expertName ?>" /></td></tr>
<tr><td align="right">Total Expr.:</td> <td><input type="text" name="expertExp" id="expertExp" value="<?php echo $expertExp ?>" /></td></tr>
<tr><td align="right">Mobile:</td> <td><input type="text" name="expertContact1" id="expertContact1" value="<?php echo $expertContact1?>" /></td></tr>
<tr><td align="right">Home PH:</td> <td><input type="text" name="expertContact2" id="expertContact2" value="<?php echo $expertContact2?>" /></td></tr>
<tr><td align="right">Email:</td> <td><input type="text" name="expertEmail" id="expertEmail" value="<?php echo $expertEmail?>" /></td></tr>
<tr><td align="right">Affiliation:</td> <td><input type="text" name="expertAff" id="expertAff" value="<?php echo $expertAff?>" /></td></tr>
<tr><td align="right">Degree:</td> <td><input type="text" name="expertDegree" id="expertDegree" value="<?php echo $expertDegree?>" /></td></tr>
<tr><td align="right">Aff. Type:</td> <td><input type="text" name="expertType" id="expertType" value="<?php echo $expertType?>" /></td></tr>
<tr><td align="right">Active:</td> <td><input type="text" name="isActive" id="isActive" value="<?php echo $isActive?>" /></td></tr>
<tr><td align="center" colspan="2">
<input type="button"  id="btnExpertEdit" onclick="updateExpertDB()" value="Submit/Update"/>
<input type="button"  id="btnExpertInsert" onclick="insertExpertDB()" value="Insert New"/>
</td>
</table>


  <br/>
   <div id="viewUpdateDetails">
   <!-- All data will display here  -->
  </div>

