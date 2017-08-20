<?php
include('dbconfig.php');
$commentBy=$_POST['name'];
$yourComment= $_POST['comment'];

  $sql="insert into myFeedback (`commentBy`,`yourComment`)values ('".$commentBy."', '".$yourComment."')";

	if(strlen($commentBy)>1 && strlen($yourComment)>1)
	{
	 include('runQuery.php');
	echo 'Thank You! your comment has successfully been submitted.<br/>';
	}
	else
	{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
	
  echo '<i>'.$commentBy ." says:</i> <br />";
  echo $yourComment ."<hr/>";
  
$conn=null;
?>