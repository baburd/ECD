<?php
try{
$stmt=$conn->prepare($sql);
$stmt->execute();
}
catch(PDOException $e)
{
echo "Error:".$e->getMessage();
}
?>