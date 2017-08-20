
<?php
session_start();
?>

<html>
<head>
<title></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="./css/indexDefault.css" />
<script src="CSS/jquery-latest.js"></script>

<script language="javascript">
function SubmitByName() {
 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#results').html(htmlData);
    var name = $("#name").val();
    $.post("searchByName.php", { name: name}, function(data) {
	 $('#results').html(data);
	 //$('#myForm')[0].reset();
    });
}

function SubmitByStream() {
 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#results').html(htmlData);
    var name = $("#name").val();
    $.post("searchByStream.php", { name: name}, function(data) {
	 $('#results').html(data);
	 //$('#myForm')[0].reset();
    });
}

function SubmitBySubj() {
 var htmlData='<div align="center"><img src="./images/ajax-loader.gif" align="absmiddle"><br/>Loading</img></div>';
 $('#results').html(htmlData);
    var name = $("#name").val();
    $.post("searchBySubj.php", { name: name}, function(data) {
	 $('#results').html(data);
	 //$('#myForm')[0].reset();
    });
}

<!-- hover button action !>
function openMsg(url)
{
window.open(url)//, '_blank', 'toolbar=0,location=0,menubar=0');
}

//to send SMS to individual to his/her mobile No\

function sendSMS(sCode)
{
//alert(sCode)
var editWindow=window.open("sendSMS.php?code="+sCode+"",'_blank','scrollbars=no,resizable=no,top=300,left=500,height=300,width=400');
editWindow.focus();
}

function submitSubjExprInsert()
{
//alert(sCode)
var editWindow=window.open("insertSubjExpr.php",'_blank','scrollbars=no,resizable=no,top=300,left=500,height=200,width=400');
editWindow.focus();
}

function openCodeImage(filePath)
{
var imgWindow=window.open("./"+filePath,'_blank','resizable=no,top=100,left=400,height=550,width=750');
imgWindow.focus();
}

</script>

</head>
<body>
<table border="0" cellpadding="1" cellspacing="1" width="40%" align="right">
<tr class="tablerow">
<td align="center">
<?php
if($_SESSION["user_name"]) {
?>
Welcome <b><?php echo $_SESSION["user_name"]; ?>!</b> <a href="logout.php" tite="Logout">Click here to LOGOUT</a>
<?php
}
else
header("Location:login.php");
?>
</td>
</tr>
<tr><th><?php require_once('navigate.php'); ?></th></tr>
</table> <br/><br/>
<form id="dashForm">
<table width="85%" align="center" bgcolor="#6633FF">
<tr ><th colspan="4" bgcolor="#330099"> <p class="style7"><img src="images/exam-Head-Figure.bmp" width="100%" height="180"></p> 
</th>
</tr>
</table>
</form>


<?php
include('tab.php');
?>
<br/>

<hr/>
<div align="right"><i>Copyright ©ECD-2016&nbsp;&nbsp;&nbsp;&nbsp;<br/> Developed by: <b> Babu Ram Dawadi</b></i>&nbsp;&nbsp;&nbsp;&nbsp;</div>
</html>