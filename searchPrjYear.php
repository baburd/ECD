
<table width="95%" align="center" cellspacing="2"  cellpadding="0">
  <tr bgcolor="#CCCCCC">
  	<th width="30%">Project Title </td>
    <th width="20%">Supervisor Name </td>
    <th width="20%">College Name </th>
    <th width="10%">Prj Stream  </th>
    <th width="10%">Prj. Type  </th>
    <th width="10%">Prj. Year  </th>
    </tr>
  
  <p><?php
include("dbconfig.php");
include("clgCode.php");
$commentBy=$_POST['prjname'];

 	if(strlen($commentBy)<2)
		{echo '<script type="text/javascript">alert("Please Specify all field values")</script>'; die('');}
	else
	{
  $sql="select distinct * from projectList where prjYear like ? order by prjStream asc";
  $params = array("%$commentBy%");
  $stmt=$conn->prepare($sql);
  $stmt->execute($params);
	//require_once('runQuery.php');
	
	$i=0;
	while ($row = $stmt->fetch()) 
	{
		$prjTitle = $row{'prjTitle'};
		$suprName = $row{'suprName'};
		$clgName = clgCode($row{'clgName'});
		$prjStream = $row{'prjStream'};
		$prjType = $row{'prjType'};
		$prjYear = $row{'prjYear'};
			
		if($i%2==0)
		echo '<tr bgcolor="#FFEEEE">';
		else 
		echo '<tr bgcolor="#FFEEAA">';
		 
		echo '<td>'.$prjTitle.'<td>'.$suprName.'</td><td>'. $clgName .'</td><td Align="Center" >'.$prjStream.'</td><td Align="Center">'.$prjType.'</td><td Align="Center">'.$prjYear.'</td></tr>';
	
	$i++;
	}
	
	}
	
echo '</table>';
   
$conn = null;
?>
</p>  </th>
