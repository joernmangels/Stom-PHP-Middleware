<?php
header('Content-Type: application/json');
 
$pdo = new PDO('mysql:host=192.168.2.180;dbname=STROM', 'root', 'deeuu001');

$rows = array();

//sprintf("SELECT * FROM STROM_EINSTELLUNGEN WHERE NAMESET = '%s'",
//            mysql_real_escape_string($key));

$sql = "SELECT * FROM STROM_EINSTELLUNGEN WHERE NAMESET = 'microchart'";
foreach ($pdo->query($sql) as $row) {
     $rows[] = $row;
}

$baris = array('SettingsSet' => $rows);
print json_encode($baris);

?>
