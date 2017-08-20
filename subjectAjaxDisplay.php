

<script language="javascript">


//fro search purpose


function SubjectDetails() {
	 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewSubjDetails').html(htmlData);
    var subjname = $("#subjname").val();
	//alert(exprname);
	$.post("subjectAjax.php", { subjname: subjname}, function(data) {
	 $('#viewSubjDetails').html(data);
	 $('#mySubjForm')[0].reset();
    });
}

function CodeDetails() {
	 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewSubjDetails').html(htmlData);
    var subjname = $("#subjname").val();
	//alert(exprname);
	$.post("subjectCodeAjax.php", { subjname: subjname}, function(data) {
	 $('#viewSubjDetails').html(data);
	 $('#mySubjForm')[0].reset();
    });
}

function submitSubjEdit(sCode)
{
//alert(sCode)
var editWindow=window.open("editSubject.php?code="+sCode+"",'_blank','scrollbars=no,resizable=no,top=300,left=500,height=250,width=400');
editWindow.focus();
}

</script>


<?php
if(!$_SESSION["user_name"])
header("Location:login.php");
?>
<div>
 
   <table width=60% border="2" align="center" cellpadding="2" cellspacing="4" bgcolor="#FFEEAA" hspace="4" vspace="4">
   <form name="mySubjForm" method="post">
   <tr class="tableheader">
       <td align="center" colspan="2"><span class="style2">SEARCH Subject Details by Name </span></td>
     </tr> 
	   <tr><td align="center" width="509" height="6" valign="bottom" colspan="2">  <input name="subjname" type="text" id="subjname" size="60"/></td>
   </tr>
   <tr ><td colspan="2"><div align="center">
     <input type="button" id="subjectDetails" onClick="SubjectDetails()" value="Subject Name"/> &nbsp;<input type="button" id="codeDetails" onClick="CodeDetails()" value="Code Name"/>
     </div></td></tr>
    </form>
	</table>
 
</div>
   <br/>
   <div id="viewSubjDetails">
   <!-- All data will display here  -->
   </div>
</html>