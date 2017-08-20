
<html>
<head>
<?php // common.php
 if ($_POST['newid']=='' or $_POST['newname']==''
or $_POST['newemail']=='') {
error('One or more required fields were left blank.\n'.
'Please fill them in and try again.');
}

// Check for existing user with the new id
$sql = "SELECT COUNT(*) FROM user WHERE userid = '$_POST[newid]'";
try{
$stmt=conn->prepare($sql);
$stmt->execute();
}catch(PDOException $e)
{
echo $e->getMessage();
}
if (!$stmt) {
error('A database error occurred in processing your '.
'submission.\nIf this error persists, please '.
'contact you@example.com.');
}
if (@mysql_result($result,0,0)>0)
error('A user already exists with your chosen userid.\n'.
'Please try another.');


$sql = "INSERT INTO user SET
userid = '$_POST[newid]',
password = PASSWORD('$newpass'),
fullname = '$_POST[newname]',
email = '$_POST[newemail]',
notes = '$_POST[newnotes]'";
if (!$stmt->query($sql))
error('A database error occurred in processing your '.
'submission.\nIf this error persists, please '.
'contact you@example.com.');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Registration Complete </title>
<meta http-equiv="Content-Type"
content="text/html; charset=iso-8859-1" />
</head>
<body>
<p><strong>User registration successful!</strong></p>
<p>Your userid and password have been emailed to
<strong><?=$_POST[newemail]?></strong>, the email address
you just provided in your registration form. To log in,
click <a href="index.php">here</a> to return to the login
page, and enter your new personal userid and password.</p>
</body>
</html>
}

function error($msg) {
?>
  <script language="JavaScript">
  <!--
  alert("<?=$msg?>");
  history.back();
  //-->
  </script>
<?php
exit;
}
?>
</head>

</html>
