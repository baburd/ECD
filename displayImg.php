
<?php
session_start();

if(!$_SESSION["user_name"])
{header("Location:login.php");die();}

$img=$_GET['img'];

 	if(strlen($img)<2)
		{echo '<script type="text/javascript">alert("Error.....'; die('');}
?>
<img src="<?php echo './images/'.$img ?>" align="absmiddle" />



