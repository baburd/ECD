<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ECD Intranet Access</title>
</head>
<?php
$ipAddr = $_SERVER['REMOTE_ADDR'];
echo '<center>You are Accessing this resources from <h2>'.$ipAddr.'</h2>';
if(substr($ipAddr,0,10)=="192.168.12")
header('Location:http://ecd-center:81/ECD/');
else
echo 'You are not allowed to access ECD intranet resource from public places!!<br/>It is Geographically limited with ACCESS PRIVILEGES!';
?>
</body>
</html>