<script src="css/jquery-latest.js"></script>
<script language="javascript">

function AssignPacket() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewUpdateDetails').html(htmlData);
 
 	var expertID = $("#expertID").val();
	var expertName = $("#expertName").val();
	var expertContact1 = $("#expertContact1").val();
	var codeNo = $("#codeNo").val();
	var subjName = $("#subjName").val();
	var subCode = $("#subCode").val();
	var ansNo = $("#ansNo").val();
	var pktNo = $("#pktNo").val();
	var examName = $("#examName").val();
	var issueDate = $("#issueDate").val();
	
	var sqlSTR = "insert into assignPacket (expertID,expertName, expertContact, codeNo, subjName,subCode,ansNo,pktNo,examName) values('"+expertID+"','"+expertName+"','"+expertContact1+"','"+codeNo+"','"+subjName+"','"+subCode+"',"+ansNo+","+pktNo+",'"+examName+"','"+issueDate+"')";
	yesno=confirm('Are you sure you want to Insert this Record?');
	
	if(yesno)
	{
	$.post("updateRecord.php", { sqlSTR: sqlSTR, }, function(data) {
	 $('#viewPacketDetails').html(data);
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
<tr><td align="right">Expert ID:</td> <td><input type="text" name="expertID" id="expertID" value="-" /></td></tr>
<tr><td align="right">Expert Name:</td> <td><input type="text" ize="50" name="expertName" id="expertName" value="-" /></td></tr>
<tr><td align="right">Mobile:</td> <td><input type="text" name="expertContact1" id="expertContact1" value="-" /></td></tr>
<tr><td align="right">Code No:</td> <td><input type="text" name="codeNo" id="codeNo" value="-" /></td></tr>
<tr><td align="right">Subject Name:</td> <td><input type="text" name="subjName" id="subjName" value="-" /></td></tr>
<tr><td align="right">Sub Code No:</td> <td><input type="text" name="subCode" id="subCode" value="-" /></td></tr>
<tr><td align="right">Ans Sheet No:</td> <td><input type="text" name="ansNo" id="ansNo" value="-" /></td></tr>
<tr><td align="right">No of PKT:</td> <td><input type="text" name="pktNo" id="pktNo" value="1" /></td></tr>
<tr><td align="right">Exam Name (eg: 2073-Chaitra):</td> <td><input type="text" name="examName" id="examName" value="-" /></td></tr>
<tr><td align="right">Issue Date (Y-M-D):</td> <td><input type="text" name="issueDate" id="issueDate" value="<?php echo date('Y-m-d');?>" /></td></tr>
<tr><td align="center" colspan="2">
<input type="button"  id="btnAssignPKT" onclick="AssignPacket()" value="Submit/Insert"/>
<input type="button"  id="btnUpdatePKT" onclick="UpdatePackateInfo()" value="Update"/>
</td>
</table>


  <br/>
   <div id="viewPacketDetails">
   <!-- All data will display here  -->
  </div>

