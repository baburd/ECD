<?php
if(!$_SESSION["user_name"])
header("Location:login.php");
?>

<script language="javascript">

function SubmitByProject() {
 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewProjectDetails').html(htmlData);
	//alert(streamName);
	var e = document.getElementById("projectName");
	var  streamName = e.options[e.selectedIndex].text;
	$.post("searchExpertProject.php", { streamName: streamName}, function(data) {
	 $('#viewProjectDetails').html(data);
	 $('#exprForm')[0].reset();
    });
}


//for previous project search details
function SubmitPrjTitle() {
 
 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewProjectDetails').html(htmlData);
 
    var prjname = $("#prjname").val();
    $.post("searchPrjTitle.php", { prjname: prjname}, function(data) {
	 $('#viewProjectDetails').html(data);
	 $('#myProjForm')[0].reset();
    });
}

function SubmitPrjStream() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewProjectDetails').html(htmlData);
 
    var prjname = $("#prjname").val();
    $.post("searchPrjStream.php", { prjname: prjname}, function(data) {
	 $('#viewProjectDetails').html(data);
	 $('#myProjForm')[0].reset();
    });
}

function SubmitPrjYear() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewProjectDetails').html(htmlData);
 
    var prjname = $("#prjname").val();
    $.post("searchPrjYear.php", { prjname: prjname}, function(data) {
	 $('#viewProjectDetails').html(data);
	 $('#myProjForm')[0].reset();
    });
}


function submitExprProjEdit(sCode)
{
//alert(sCode)
var editWindow=window.open("editExpertProject.php?code="+sCode+"",'_blank','scrollbars=no,resizable=no,top=200,left=500,height=350,width=400');
editWindow.focus();
}

</script>

<div>
  
   <table width=47% border="2" align="center" cellpadding="2" cellspacing="4" bgcolor="#FFEEAA" hspace="4" vspace="4">
     <tr class="tableheader">
       <td align="center"><span class="style10">Experts Roaster for Major/Minor Projects </span></td>
     </tr> <form id="exprForm" method="post">
	   <tr>
	   <td align="center" width="509" height="6" valign="bottom">  
	   <select name="projectName" id="projectName">
	   <option value="begin"> Select the expert by Program here </option>
	   <option value="Agriculture"> Agriculture</option>
	   <option value="Architecture">Architecture</option>
	   <option value="Automobile">Automobile</option>
	   <option value="Civil">Civil</option>
	   <option value="Computer">Computer</option>
	   <option value="Electronics">Electronics</option>
	   <option value="Electrical">Electrical</option>
	   <option value="Geomatics">Geomatics</option>
	   <option value="Mechanical">Mechanical</option>
	   <option value="Surveying">Surveying</option> 
	   </select></td>
   </tr>
   <tr><td ><div align="center">
     <input type="button" id="submitByProject" onClick="SubmitByProject()" value="Click to Search Experts by Stream"/>
    </div></td>
   </tr>
   <tr class="tableheader"> <td align="center"><span class="style5">( eg. Stream: Computer) </span></td> 
   </tr></form>
   
   <tr><td><hr /></td></tr>
     
   <form name="myProjForm" method="post">
   <tr class="tableheader"> <td align="center"><span class="style2">SEARCH Previous Projects </span></td></tr> 
	   <tr><td align="center" width="509" height="6" valign="bottom">  <input name="prjname" type="text" id="prjname" size="60"/></td>
   </tr>
   <tr ><td><div align="center">
     <input type="button" id="submitPrjTitle" onClick="SubmitPrjTitle()" value="By Project Title"/>
     <input type="button" id="submitPrjStream" onClick="SubmitPrjStream()" value="By Project Stream"/>
	 <input type="button" id="submitPrjYear" onClick="SubmitPrjYear()" value="By Project Year"/>
     </div></td></tr>
	<tr class="tableheader"> <td align="center"><span class="style5">Eg: Title= Building, Stream=BCT/BCE/.., year=2073  </span></td></tr> 
    </form>
   </table>
 </div>

   <br/>
   <div id="viewProjectDetails">
   <!-- All data will display here  -->
   </div>
</html>