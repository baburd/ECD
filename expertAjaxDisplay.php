<script language="javascript">

//fro search purpose
function SubjectExpert() {
	
	 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewExprDetails').html(htmlData);
 
    var exprname = $("#exprtname").val();
	//alert(exprname);
	$.post("expertAjax.php", { exprname: exprname}, function(data) {
	 $('#viewExprDetails').html(data);
	 $('#myExprForm')[0].reset();
    });
}

function SubjectCode() {
	
	 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewExprDetails').html(htmlData);
 
    var exprname = $("#exprtname").val();
	//alert(exprname);
	$.post("expertSubjCode.php", { exprname: exprname}, function(data) {
	 $('#viewExprDetails').html(data);
	 $('#myExprForm')[0].reset();
    });
}

function CollegeCode() {
	
	 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewExprDetails').html(htmlData);
 
    var exprname = $("#exprtname").val();
	//alert(exprname);
	$.post("expertColgCode.php", { exprname: exprname}, function(data) {
	 $('#viewExprDetails').html(data);
	 $('#myExprForm')[0].reset();
    });
}

function submitExprEdit(sCode)
{
//alert(sCode)
var editWindow=window.open("editExpert.php?code="+sCode+"",'_blank','scrollbars=no,resizable=no,top=300,left=500,height=350,width=400');
editWindow.focus();
}

function submitAssignPacket(sCode)
{
//alert(sCode)
var editWindow=window.open("assignPacket.php?code="+sCode+"",'_blank','scrollbars=no,resizable=no,top=300,left=500,height=350,width=400');
editWindow.focus();
}


function submitExprSubjEdit(sCode,exID)
{
//alert(sCode)
var editWindow=window.open("editSubjCodeExpert.php?sCode="+sCode+"&exID="+exID,'_blank','scrollbars=no,resizable=no,top=300,left=500,height=350,width=400');
editWindow.focus();
}

</script>
</script>


<?php
if(!$_SESSION["user_name"])
header("Location:login.php");
?>
<div>
 
   <table width=60% border="2" align="center" cellpadding="2" cellspacing="4" bgcolor="#FFEEAA" hspace="4" vspace="4">
   <form name="myExprForm" method="post">
   <tr class="tableheader">
       <td align="center" colspan="2"><span class="style2">SEARCH Expert Details by Name </span></td>
     </tr> 
	   <tr><td align="center" width="509" height="6" valign="bottom" colspan="2">  <input name="exprtname" type="text" id="exprtname" size="60"/></td>
   </tr>
   <tr ><td colspan="2"><div align="center">
     <input type="button" id="subjectExpert" onClick="SubjectExpert()" value="By Expert Name"/>
	 <input type="button" id="subjectCode" onClick="SubjectCode()" value="By Subject Code"/>
	  <input type="button" id="colelgeCode" onClick="CollegeCode()" value="By College Code"/>
     </div></td></tr>
    </form>
	</table>
 
</div>
   <br/>
   <div id="viewExprDetails">
   <!-- All data will display here  -->
   </div>
</html>