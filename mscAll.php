<script src="http://code.jquery.com/jquery-latest.js"></script>
<script language="javascript">
function mscFacultyName() {

 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewMscDetails').html(htmlData);
 
    var name = $("#mscName").val();
    $.post("mscFacultyName.php", { name: name}, function(data) {
	 $('#viewMscDetails').html(data);
	 $('#mscForm')[0].reset();
    });
}

function mscFacultySubject() {
   
    var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewMscDetails').html(htmlData);
 
    var name = $("#mscName").val();
    $.post("mscFacultySubject.php", { name: name}, function(data) {
	 $('#viewMscDetails').html(data);
	 $('#mscForm')[0].reset();
    });
}

function mscSubjList() {
    
	 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewMscDetails').html(htmlData);
 
	var name = $("#mscName").val();
    $.post("mscSubjList.php", { name: name}, function(data) {
	 $('#viewMscDetails').html(data);
	 $('#mscForm')[0].reset();
    });
}
</script> 
 
 <table align="center" width=47% cellpadding="2" cellspacing="4" bgcolor="#FFEEAA" hspace="4" vspace="4">
    <form id="mscForm" method="post">
	 <tr>
	  
       <td align="center"><span class="style2">SEARCH for M.Sc. Details </span></td>
     </tr> 
	   <tr><td align="center" width="509" height="6" valign="bottom">  <input name="mscName" type="text" id="mscName" size="50"/></td>
   </tr>
   <tr ><td ><div align="center">
     <input type="button" id="mscByName" onClick="mscFacultyName()" value="Search  By Name"/>
     <input type="button" id="mscBySubject" onClick="mscFacultySubject()" value="Search by Subject"/>
     <input type="button" id="mscSubjList" onClick="mscSubjList()" value="Subject By Stream"/>
   </div></td>
    </form>
   </tr>
   <tr> <td align="center"><span class="style5">( eg. Name: Ram,   Stream: MSCSKE-I/II,  Subject: Design of Steel) </span></td> 
   </tr>
   </table>
   
      <br/>
   <div id="viewMscDetails">
   <!-- All data will display here  -->
   </div>