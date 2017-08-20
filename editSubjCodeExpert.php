<html>
<head>
<title></title>
<script src="css/jquery-latest.js"></script>

<script language="javascript">

function updateSubjExpertDB() {

 	var subjCode = $("#subjCode").val();
	var expertID = $("#expertID").val();
	var effectiveYear = $("#effectiveYear").val();
	var yearFor = $("#yearFor").val();
	var isActive = $("#isActive").val();
		
	
var sqlSTR = "update expertSubj set effectiveYear='"+effectiveYear+"',yearFor='"+yearFor+"',isActive="+isActive+" where subjCode='"+subjCode+"' and expertID='"+expertID+"'";
	//alert(sqlSTR);
	yesno=confirm('Are you sure you want to Update this Record?');
	
	 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 	 $('#viewUpdateDetails').html(htmlData);
 
	if(yesno)
	{
	$.post("updateRecord.php", { sqlSTR: sqlSTR, }, function(data) {
	 $('#viewUpdateDetails').html(data);});	
	}
}

function insertSubjExpertDB() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewUpdateDetails').html(htmlData);
 
 	var subjCode = $("#subjCode").val();
	var expertID = $("#expertID").val();
	var effectiveYear = $("#effectiveYear").val();
	var yearFor = $("#yearFor").val();
	var isActive = $("#isActive").val();
	
	var sqlSTR = "insert into expertSubj (subjCode,expertID,effectiveyear,yearFor) values('"+subjCode+"','"+expertID+"','"+effectiveYear+"','"+yearFor+"')";
	yesno=confirm('Are you sure you want to Insert this Record?');
	
	if(yesno)
	{
	$.post("updateRecord.php", { sqlSTR: sqlSTR, }, function(data) {
	 $('#viewUpdateDetails').html(data);    });	
	}
}

function deleteSubjExpertDB() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewUpdateDetails').html(htmlData);
 
 	var subjCode = $("#subjCode").val();
	var expertID = $("#expertID").val();
		
	var sqlSTR = "delete from expertSubj where subjCode='"+subjCode+"' and expertID='"+expertID+"'";
	yesno=confirm('Are you sure you want to Insert this Record?');
	
	if(yesno)
	{
	$.post("updateRecord.php", { sqlSTR: sqlSTR, }, function(data) {
	 $('#viewUpdateDetails').html(data); });	
	}
}
</script>
</head>
<?php

session_start();

if(!$_SESSION["user_name"])
{header("Location:login.php");die();}


include("dbconfig.php");
//include("clgCode.php");
$sCode=$_GET['sCode'];
$exID=$_GET['exID'];

 	if(strlen($sCode)<2)
		{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
	else
	{
  $sql="select * from expertSubj where subjCode= '".$sCode."' and expertID='".$exID."'";
  //echo $sql;
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch();
	//require_once('runQuery.php');
		$subjCode = $row{'subjCode'};
		$expertID = $row{'expertID'};
		$effectiveYear = $row{'effectiveYear'};
		$yearFor = $row{'yearFor'};
		$isActive = $row{'isActive'};
		}		
	$conn = null;
	?>
<body>	
<table width="75%" align="center" cellspacing="2"  cellpadding="0">
<tr><td align="right">Subject Code:</td> <td><input type="text" name="subjCode" id="subjCode" value="<?php echo $subjCode ?>" /></td></tr>
<tr><td align="right">Expert ID:</td> <td><input type="text" ize="50" name="expertID" id="expertID" value="<?php echo $exID ?>" /></td></tr>
<tr><td align="right">Effective Expr.:</td> <td><input type="text" name="effectiveYear" id="effectiveYear" value="<?php echo $effectiveYear ?>" /></td></tr>
<tr><td align="right">Entered Year:</td> <td><input type="text" name="yearFor" id="yearFor" value="<?php echo $yearFor ?>" /></td></tr>
<tr><td align="right">Active/Passive:</td> <td><input type="text" name="isActive" id="isActive" value="<?php echo $isActive ?>" /></td></tr>

<tr><td align="center" colspan="2">
<input type="button"  id="btnExpertSubjEdit" onClick="updateSubjExpertDB()" value="Submit/Update"/>
<input type="button"  id="btnExpertSubjInsert" onClick="insertSubjExpertDB()" value="Insert New"/>
<input type="button"  id="btnSubjCodeDelete" onClick="deleteSubjExpertDB()" value="Delete Record"/>

</td>
</table>


  <br/>
   <div id="viewUpdateDetails">
   <!-- All data will display here  -->
  </div>
</body></html>
