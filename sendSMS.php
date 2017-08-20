
<?php
session_start();

if(!$_SESSION["user_name"])
{header("Location:login.php");die();}


include("dbconfig.php");
//include("clgCode.php");
$commentBy=$_GET['code'];

 	if(strlen($commentBy)<2)
		{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
?>
<form id="smsForm" method="post">
   <table width=80% border="2" align="center" cellpadding="2" cellspacing="4" bgcolor="#FFEEAA" hspace="4" vspace="4">
     <tr class="tableheader">
       <td align="center"><span class="style2">Send You Text</span></td>
     </tr> 
	 <tr><td align="center">Mobile No: <b><?php echo $commentBy ?></b></td></tr>
	   <tr ><td align="center" valign="bottom">  
	 <textarea name="smsBox" id="smsBox" style="width:300px; height:100px;"></textarea>
	  </tr>
   <tr ><td ><div align="center">
     <input type="button" id="submitSMS" onClick="submitSMS()" value="Send SMS"/>
    </div></td>
   </tr>
   </table>
  </form>



