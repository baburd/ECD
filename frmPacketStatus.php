
<script language="javascript">
//fro search purpose

function SubmitPName() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewQDetails').html(htmlData);
    var lbl=$("#pyrsem").val();
    var pname = $("#pname").val();
	//alert (lbl+" "+pname);
    $.post("searchPName.php", { pname: pname, lbl: lbl}, function(data) {
	 $('#viewPDetails').html(data);
    });
}

function SubmitPSubj() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewQDetails').html(htmlData);
    var lbl=$("#pyrsem").val();
    var pname = $("#pname").val();
	//alert('hello');
    $.post("searchPSubj.php", { pname: pname,lbl: lbl}, function(data) {
	 $('#viewPDetails').html(data);
	 });
}

function SubmitAllNull() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewPDetails').html(htmlData);
   var lbl=$("#pyrsem").val();
    var pname = $("#pname").val();
	//alert('hello');
    $.post("searchAllNull.php", { pname: pname,lbl: lbl}, function(data) {
	 $('#viewPDetails').html(data);
	 });
}

function UpdatePReceipt(codeNo,subCode,dtm) {
	
	//alert(codeNo+" "+subCode+" "+dtm);
	
 	var sqlSTR = "update assignPacket set returnDate='"+dtm+"' where codeNo='"+codeNo+"' and subCode='"+subCode+"'";
	yesno=confirm('Confirm Receipt?');
	//alert (sqlSTR)
	if(yesno)
	{
	$.post("updateRecord.php", { sqlSTR: sqlSTR, }, function(data) {
	 $('#pReceiptStatus').html(data); });	
	}
}

function NewPacketAssignment()
{
//alert(sCode)
var editWindow=window.open("newPacketAssign.php",'_blank','scrollbars=no,resizable=no,top=200,left=500,height=350,width=400');
editWindow.focus();
}
</script>

<?php
if(!$_SESSION["user_name"])
header("Location:login.php");
?>
<div>
 
   <table width=60% border="2" align="center" cellpadding="2" cellspacing="4" bgcolor="#FFEEAA" hspace="4" vspace="4">  
   <form name="packetForm" method="post">
   <tr><td align="right"> <a href="javascript:NewPacketAssignment()"> Assign New Packet</a> </td></tr>
   <tr class="tableheader">
       <td align="center" colspan="2"><span class="style2">Packet Dispatch Details </span></td>
     </tr> 
	   <tr><td align="center" width="509" height="6" valign="bottom" colspan="2">  <input name="pname" type="text" id="pname" size="50"/> Exam Name: <input name="pyrsem" type="text" id="pyrsem" size="20"/></td>
   </tr>
   <tr ><td colspan="2"><div align="center">
     <input type="button" id="submitPName" onClick="SubmitPName()" value="By Expert Name"/>
     <input type="button" id="submitPSubj" onClick="SubmitPSubj()" value="By Subject"/>
	 <input type="button" id="submitAllNull" onClick="SubmitAllNull()" value="All Un-Receipt"/>
     </div></td></tr>
    </form>
	</table>
 </div><br/>
 <div id="pReceiptStatus"></div>
     <div id="viewPDetails">
   <!-- All data will display here  -->
   </div>
</html>