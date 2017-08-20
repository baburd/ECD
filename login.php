<?php
session_start();
$message="";
if(count($_POST)>0) {
include('dbconfig.php');
$sql = "SELECT * FROM users WHERE username='" . $_POST["username"] . "' and password = '". md5($_POST["password"])."'";
require_once('runQuery.php');

if($row  = $stmt->fetch(PDO::FETCH_ASSOC))
{//if(is_array($row)) {
$_SESSION["user_id"] = $row{'id'};
$_SESSION["user_name"] = $row{'username'};
} 
else {
$message = 'Invalid Username or Password!<br/>';
}
}
if(isset($_SESSION["user_id"])) {
header("Location:index.php");
}
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/indexDefault.css" />

<title>User Login</title>
</head>
<body>
<div class="message">
<!-- sdfsf -->
<?php if($message!="") { echo $message; } ?>
</div>
<form id = "myForm" method="post" action="">
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2"><img src="images/exam-Head-Figure.bmp"/></td>
</tr>
<tr class="tablerow">
<td align="right">Username</td>
<td><input type="text" name="username" id="username"></td>
</tr>
<tr class="tablerow">
<td align="right">Password</td>
<td><input type="password" name="password" id="password"></td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
</body></html>