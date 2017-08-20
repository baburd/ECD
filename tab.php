<?php
	include('dbconfig.php');
?>
<div class="container">
 <!-- <h2>Dynamic Tabs</h2>  -->
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Basic Search</a></li>
    <li><a data-toggle="tab" href="#menu1">Expert Details</a></li>
    <li><a data-toggle="tab" href="#menu2">BE Subjects</a></li>
    <li><a data-toggle="tab" href="#menu3">Project/Survey Roaster</a></li>
    <li><a data-toggle="tab" href="#menu4">Ques.Appointment</a></li>
	 <li><a data-toggle="tab" href="#menu5">Post Holders</a></li>
	<li><a data-toggle="tab" href="#menu6">PKT Follow UP</a></li>
	<li><a data-toggle="tab" href="#menu7">Campus/Colleges</a></li>
	<li><a data-toggle="tab" href="#menu8">M.Sc.</a></li>
  </ul>
<br/><br/>
  <div class="tab-content">
   
    <div id="home" class="tab-pane fade in active">
      
   <table align="center" width=47% cellpadding="2" cellspacing="4" bgcolor="#FFEEAA" hspace="4" vspace="4">
    <form id="myForm" method="post">
	 <tr class="tableheader">
	  
       <td align="center"><span class="style2">SEARCH with Different Options </span></td>
     </tr> 
	   <tr><td align="center" width="509" height="6" valign="bottom">  <input name="name" type="text" id="name" size="50"/></td>
   </tr>
   <tr ><td ><div align="center">
     <input type="button" id="submitByName" onClick="SubmitByName()" value="By Expert Name"/>
     <input type="button" id="submitByStream" onClick="SubmitByStream()" value="By Stream-Sem"/>
     <input type="button" id="submitBySubj" onClick="SubmitBySubj()" value="By Subject"/>
   </div></td>
    </form>
   </tr>
   <tr class="tableheader"> <td align="center"><span class="style5">( eg. Name: Ram,   Stream: BCT-VIII,  Subject: Design of Steel) </span></td> 
   </tr>
   </table>
 	<br/>
   	<div id="results">
   	<!-- All data will display here  -->
   	</div>
  
    </div>
	
    <div id="menu1" class="tab-pane fade">
	
      <?php 
	 require_once("expertAjaxDisplay.php");
 	  ?> 
    </div>
	
	
    <div id="menu2" class="tab-pane fade">
       <?php 
		require_once("subjectAjaxDisplay.php");
       ?>

    </div>
    <div id="menu3" class="tab-pane fade">
     
 <?php 
  require_once("projectExpertView.php");
  ?>
    </div>
	
	
    <div id="menu4" class="tab-pane fade">
    <?php 
 	require_once("qGenerateForm.php");
 	 ?>  
    </div>
	
  <div id="menu5" class="tab-pane fade">
	<?php 
	 require_once("postHolders.php");
 	  ?>
    </div>
  
	  <div id="menu6" class="tab-pane fade">
	     <?php 
	 require_once("frmPacketStatus.php");
 	  ?>
    </div>
  
  <div id="menu7" class="tab-pane fade">
	   <?php 
	 require_once("collegeInfo.php");
 	  ?>
    </div>
	
  <div id="menu8" class="tab-pane fade">
	   <?php 
	 require_once("mscAll.php");
 	  ?>
    </div> 
  </div>
</div>
