<script src="http://code.jquery.com/jquery-latest.js"></script>

<script language="javascript">

function updateSubjectDB() {

 
	var subjCode = $("#subjCode").val();
	var expertID = $("#expertID").val();
	var effYrExpr = $("#effYrExpr").val();
	var yearFor = $("#yearFor").val();
	var sqlSTR = "insert into expertSubj values('"+subjCode+"','"+expertID+"','"+effYrExpr+"','"+yearFor+"',')";
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
?>
<table width="75%" align="center" cellspacing="2"  cellpadding="0">
<tr><td align="right">Subject Code:</td> <td><input type="text" name="subjCode" id="subjCode" /></td></tr>
<tr><td align="right">Expert ID:</td> <td><input type="text" ize="50" name="expertID" id="expertID" /></td></tr>
<tr><td align="right">Eff. Year of Expr. :</td> <td><input type="text" name="effYrExpr" id="effYrExpr" /></td></tr>
<tr><td align="right">Year For. :</td> <td><input type="text" name="yearFor" id="yearFor" /></td></tr>

<tr><td align="center" colspan="2">
<input type="button"  id="btnInsert" onclick="insertSubjExprDB()" value="Insert New"/>
</td>
</table>


  <br/>
   <div id="viewUpdateDetails">
   <!-- All data will display here  -->
  </div>
