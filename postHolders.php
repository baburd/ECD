<html>
<title></title>
<head>
	<style>
	.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('./images/ajax-loader.gif') 50% 50% no-repeat rgb(249,249,249);
    }
   </style>
<script language="javascript">
//fro search purpose

function SubmitPostName() {
 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewPostDetails').html(htmlData);
    var postname = $("#postname").val();
    $.post("searchPostName.php", { postname: postname}, function(data) {
	 $('#viewPostDetails').html(data);
	 $('#myPostForm').reset();
    });
}

function SubmitPostTitle() {
 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#viewPostDetails').html(htmlData);
    var postname = $("#postname").val();
    $.post("searchPostTitle.php", { postname: postname}, function(data) {
	 $('#viewPostDetails').html(data);
	 $('#myPostForm').reset();
    });
}


function submitPostEdit(sCode)
{
//alert(sCode)
var editWindow=window.open("editPost.php?code="+sCode+"",'_blank','scrollbars=no,resizable=no,top=200,left=500,height=300,width=400');
editWindow.focus();
}

</script>


<?php
if(!$_SESSION["user_name"])
header("Location:login.php");
?>

<div align="center">
 
   <table width=60% border="2" align="center" cellpadding="2" cellspacing="4" bgcolor="#FFEEAA" hspace="4" vspace="4">
   <form name="myPostForm" method="post">
   <tr class="tableheader">
       <td align="center"><span class="style2">IOE Post Holders Details </span></td>
     </tr> 
	   <tr><td align="center" width="509" height="6" valign="bottom">  
	     <input name="postname" type="text" id="postname" size="50"/>
	     </td>
   </tr>
   <tr ><td><div align="center">
     <input type="button" id="submitPostTitle" onClick="SubmitPostTitle()" value="By Post Title"/>
	 <input type="button" id="submitPostName" onClick="SubmitPostName()" value="Post Holder's Name"/>
     </div></td></tr>
	 <tr >
       <td align="center" ><span class="style5"> Title: Dean, Asst-Dean, Chief, Deputy-Chief, HOD-CIVIL, DHOD-CTEX, HOD-ELE, Coordinator-MSCSKE </span></td>
     </tr> 
    </form>
	</table>
 
</div>
   <br/>
   <div id="viewPostDetails">
   <!-- All data will display here  -->
   </div>
</html>