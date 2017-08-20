<script src="css/jquery-latest.js"> </script>

<script language="javascript">

function updateSubjectDB() {

 
	var subjCode = $("#subjCode").val();
	var subjName = $("#subjName").val();
	var subjStream = $("#subjStream").val();
	var subjYrSem = $("#subjYrSem").val();
	var intMarks = $("#intMarks").val();
	var extMarks = $("#extMarks").val();
	var pMarks = $("#pMarks").val();
	
	var sqlSTR = "update subjectList set subjName='"+subjName+"',subjStream='"+subjStream+"',subjYrSem='"+subjYrSem+"',intMarks='"+intMarks+"',extMarks='"+extMarks+"',pMarks='"+pMarks+"' where subjCode='"+subjCode+"'";
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

 
    var subjCode = $("#subjCode").val();
	var subjName = $("#subjName").val();
	var subjStream = $("#subjStream").val();
	var subjYrSem = $("#subjYrSem").val();
	var intMarks = $("#intMarks").val();
	var extMarks = $("#extMarks").val();
	var pMarks = $("#pMarks").val();
	
	var sqlSTR = "insert into subjectList values('"+subjCode+"','"+subjName+"','"+subjStream+"','"+subjYrSem+"','"+intMarks+"','"+extMarks+"','"+pMarks+"')";
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
  $sql="select * from subjectList where subjCode= '".$commentBy."'";
  //echo $sql;
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch();
	//require_once('runQuery.php');
		$subjCode = $row{'subjCode'};
		$subjName = $row{'subjName'};
		$subjStream = $row{'subjStream'};
		$subjYrSem = $row{'subjYrSem'};
		$intMarks = $row{'intMarks'};
		$extMarks = $row{'extMarks'};
		$pMarks = $row{'pMarks'};
	}		
	$conn = null;
	?>

<table width="75%" align="center" cellspacing="2"  cellpadding="0">
<form name="recModify" id="recModify" method="post">
<tr><td align="right">Subject Code:</td> <td><input type="text" name="subjCode" id="subjCode" value="<?php echo $subjCode ?>" /></td></tr>
<tr><td align="right">Subject Name:</td> <td><input type="text" ize="50" name="subjName" id="subjName" value="<?php echo $subjName ?>" /></td></tr>
<tr><td align="right">Stream:</td> <td><input type="text" name="subjStream" id="subjStream" value="<?php echo $subjStream ?>" /></td></tr>
<tr><td align="right">Year/Semester:</td> <td><input type="text" name="subjYrSem" id="subjYrSem" value="<?php echo $subjYrSem?>" /></td></tr>
<tr><td align="right">Internal Marks:</td> <td><input type="text" name="intMarks" id="intMarks" value="<?php echo $intMarks?>" /></td></tr>
<tr><td align="right">Final Marks:</td> <td><input type="text" name="extMarks" id="extMarks" value="<?php echo $extMarks?>" /></td></tr>
<tr><td align="right">Practical Marks:</td> <td><input type="text" name="pMarks" id="pMarks" value="<?php echo $pMarks?>" /></td></tr>
<tr><td align="center" colspan="2">
<input type="button"  id="btnEdit" onclick="updateSubjectDB()" value="Submit/Update"/>
<input type="button"  id="btnInsert" onclick="insertSubjectDB()" value="Insert New"/>
</td></tr>
</form>
</table>

  <br/>
   <div id="viewUpdateDetails">
   <!-- All data will display here  -->
  </div>


