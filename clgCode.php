<?php
function clgCode($clgName)
{
switch ($clgName)
{
case "PUL": $clgName ="Pulchowk Campus "; break;
case "THA": $clgName ="Thapathali Campus "; break;
case "PAS": $clgName ="Paschimanchal Campus ";break;
case "PUR": $clgName ="Purwanchal Campus ";break;
case "KTH": $clgName ="Kathmandu Engg. College ";break;
case "KAN": $clgName ="Kantipur Engg. College ";break;
case "ACE": $clgName="Advance College of Engg. & MGMT. ";break;
case "SEC": $clgName ="Sagarmatha Engg. College ";break;
case "NCE": $clgName ="National College of Engg. ";break;
case "HCE": $clgName ="Himalaya College of Engg. ";break;
case "KIC": $clgName ="Kathford Int'l College of Engg. ";break;
case "KCE": $clgName ="Khwopa College of Engg. ";break;
case "LEC": $clgName ="Lalitpur Engg. College";break;
case "JEC": $clgName ="Janakpur Engg. College";break;
default:
		$clgName="No College Record Found...";
}
return $clgName;
}

?>