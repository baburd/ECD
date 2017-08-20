<script language="javascript">

function SubmitSQL() {
	strSQL = $("#sqlBox").val();
	yesno=confirm('Are you sure you want to execute this query?');
	
	if(yesno)
	{
	//alert(strSQL);
	 $.post("executeSQL.php", { strSQL: strSQL}, function(data) {
	 $('#viewQueryResult').html(data);
	 $('#sqlForm')[0].reset();
    });
	}
}
</script>


<?php
if(!$_SESSION["user_name"])
header("Location:login.php");
?>


<div>
  <form id="sqlForm" method="post">
   <table width=47% border="2" align="center" cellpadding="2" cellspacing="4" bgcolor="#FFEEAA" hspace="4" vspace="4">
     <tr class="tableheader">
       <td align="center"><span class="style2">SQL Execution (Use this only if you are the DB Expert) </span></td>
     </tr> 
	   <tr ><td align="center" width="509" height="6" valign="bottom">  
	 <textarea name="sqlBox" id="sqlBox" style="width:400px; height:50px;">SQL Here... </textarea>
	  </tr>
   <tr ><td ><div align="center">
     <input type="button" id="submitSQL" onClick="SubmitSQL()" value="Execute SQL Query"/>
    </div></td>
   </tr>
   <tr class="tableheader"> <td align="center"><span class="style5">(eg. update expertList set expertSubj='Computer Network' where expertID='PUL-39-CT') </span></td> 
   </tr>
	</table>
  </form>
  
</div>
   <br/>
   <div id="viewQueryResult">
   <!-- All data will display here  -->
   </div>
</html>