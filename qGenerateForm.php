<script language="javascript">
function viewSetterDetails() {
	//alert(streamName);
	
	var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
	 $('#viewQDetails').html(htmlData);
 
	var  yearName = $("#yearName").val();
	var  semType = $("#semType").val();
	var lbl=$("#lbl").val();
	//alert(lbl+" "+semType);
	var refStart=$("#startRef").val();
	var refEnd=$("#endRef").val();
	//var signBy=$("#signBy").val();
	//alert(yearName+" "+semType+" "+refStart+" "+ refEnd +" "+signBy);
	
	$.post("searchQDetails.php", { yearName: yearName, semType: semType, refStart: refStart, refEnd: refEnd, lbl: lbl}, function(data) {
	 $('#viewQDetails').html(data);
	// $('#qForm')[0].reset();
    });
}

function SubmitQAppointmentPDF() {
	
	document.getElementById('qForm').target = "_blank";
	document.getElementById('qForm').action = "generateQuestion.php";
	document.getElementById('qForm').submit();
	
}

//fro search purpose

function SubmitQName() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewQDetails').html(htmlData);
 
    var lbl=$("#qyrsem").val();
    var qname = $("#qname").val();
	
    $.post("searchQName.php", { qname: qname, lbl: lbl}, function(data) {
	 $('#viewQDetails').html(data);
	 $('#myQForm')[0].reset();
    });
}

function SubmitQSubj() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewQDetails').html(htmlData);
 
    var lbl=$("#qyrsem").val();
    var qname = $("#qname").val();
    $.post("searchQSubj.php", { qname: qname, lbl: lbl}, function(data) {
	 $('#viewQDetails').html(data);
	 $('#myQForm')[0].reset();
    });
}

function SubmitQYrPart() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewQDetails').html(htmlData);
 
   var lbl=$("#qyrsem").val();
	
    var qname = $("#qname").val();
    $.post("searchQYrPart.php", { qname: qname,lbl: lbl}, function(data) {
	 $('#viewQDetails').html(data);
	 $('#myQForm')[0].reset();
    });
}

function UpdateQReceipt(refNo) {
 	var sqlSTR = "update appointQExpert set status=1 where refNo="+refNo;
	yesno=confirm('Confirm Receipt?');
	
	if(yesno)
	{
	$.post("updateRecord.php", { sqlSTR: sqlSTR, }, function(data) {
	 $('#qReceipt').html(data); });	
	}
}
</script>

<?php
if(!$_SESSION["user_name"])
header("Location:login.php");
?>
<div>
 
   <table width=60% border="2" align="center" cellpadding="2" cellspacing="4" bgcolor="#FFEEAA" hspace="4" vspace="4">
     <tr class="tableheader">
       <td align="center" colspan="2"><span class="style2">Appointment for Question Setting </span></td>
     </tr> 
	   <tr>
	    <form id="qForm" method="post">
	   <td width="50%" align="center">  
	   
          <div align="center">
	         <select name="yearName" id="yearName">
	           <option value="#"> Select Issue Year </option>
	           <option value="2073">2073</option>
	           <option value="2074">2074</option>
	           <option value="2075">2075</option>
	         </select>
         </div></td>
	     <td width="50%" align="center">  
	   
           <div align="center">
	           <select name="semType" id="semType">
	             <option value="#"> Select Semester </option>
	             <option value="bhadra">BHADRA</option>
	             <option value="chaitra">CHAITRA</option>
             </select> &nbsp Label: 
			     <select name="lbl" id="lbl">
				  <option value="#"> Select Level </option>
	             <option value="BE/BArch">BE/BArch</option>
	             <option value="ME">ME</option>
             </select>
		 
         </div></td>
	  <tr ><td> <div align="center"><span class="style9">Start Ref. No:</span> 
	    <input type="text" name="startRef" id="startRef" size="5">
	    </div></td> <td><div align="center"><span class="style9"> End Ref. No: 
	      <input type="text" name="endRef" id="endRef" size="5">
	      </span></div></td> 
	  </tr>
	  <tr ><td colspan="2"> <div align="right"><span class="style9"> Signature By: </span> 
            <input type="text" name="signBy" id="signBy" size="40">
	    </div></td></tr>
   <tr ><td><div align="center">
     <input type="button" id="viewSetter" onClick="viewSetterDetails()" value="View Details"/>
    </div></td> <td><div align="center">
     <input type="button" id="generateQPDF" onClick="SubmitQAppointmentPDF()" value="Issue Appointment"/>
    </div></td>
   </tr>
   </form>
   <tr><td colspan="2"><hr /></td></tr>
     
   <form name="myQForm" method="post">
   <tr class="tableheader">
       <td align="center" colspan="2"><span class="style2">SEARCH Previous Question Setting Details </span></td>
     </tr> 
	   <tr><td align="center" width="509" height="6" valign="bottom" colspan="2">  <input name="qname" type="text" id="qname" size="50"/> Yr-Sem: <input name="qyrsem" type="text" id="qyrsem" size="20"/></td>
   </tr>
   <tr ><td colspan="2"><div align="center">
     <input type="button" id="submitQName" onClick="SubmitQName()" value="By Expert Name"/>
     <input type="button" id="submitQSubj" onClick="SubmitQSubj()" value="By Subject"/>
	 <input type="button" id="submitQyrPart" onClick="SubmitQYrPart()" value="By Year-Part"/>
     </div></td></tr>
    </form>
	</table>
 </div><br/>
 <div align="right" id="qReceipt"></div>
     <div id="viewQDetails">
   <!-- All data will display here  -->
   </div>
</html>