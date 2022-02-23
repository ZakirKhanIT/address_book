<?php 
// read the sql file
$f = fopen($sqlFileToExecute,"r+");
if( ! $f){
	echo 'notfound';
	exit;
}
$sqlFile = fread($f, filesize($sqlFileToExecute));
$sqlArray = explode(';',$sqlFile);
foreach ($sqlArray as $stmt) {
  if (strlen($stmt)>3 && substr(ltrim($stmt),0,2)!='/*') {
    $result = $this->connection->query($stmt);
    if (!$result) {
      break;
    }
  }
}

?>