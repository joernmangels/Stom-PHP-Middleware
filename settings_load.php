<?php
 header('Content-Type: application/json');
 include("functions/connect_db.php");
 
 $key = $_POST['NAMESET'];

 $connection = conn_db("STROM");

 //$key = "mc_tag";

 $abfrage = sprintf("SELECT * FROM STROM_EINSTELLUNGEN WHERE NAMESET = '%s'",
            mysql_real_escape_string($key));

 $ergebnis = mysql_query($abfrage);
 $num = mysql_num_rows($ergebnis);

////////////////////////////////////////////////////////////////////////////////////////////////////////  
// Daten zu JSON zusammenführen           
// $row = mysql_result($ergebnis);
// $baris = array('SettingsSet' => $ergebnis);
// echo json_encode($baris);
// while($rows = mysql_fetch_object($ergebnis)) 
// {
//    "nameset"            = "$rows->nameset";
//    "pv1_scale"          = "$rows->pv1_scale";
// }

//  for ($i = 0 ; $i < $num; $i++)
//  {
//	$rows[$i] = [
//	"nameset"     => mysql_result($ergebnis, $i , 'nameset'),
//	"pv1_scale"   => mysql_result($ergebnis, $i , 'pv1_scale'),
//	];
//  }
	$i="0";
	$row = [
	"nameset"		=> mysql_result($ergebnis, $i , 'nameset'),
	"pv1_scale"   		=> mysql_result($ergebnis, $i , 'pv1_scale'),
	"pv1_targetvalue"	=> mysql_result($ergebnis, $i , 'pv1_targetvalue'),
	"pv1_targetvaluep"	=> mysql_result($ergebnis, $i , 'pv1_targetvaluep'),
	"pv1_colorthreshold"	=> mysql_result($ergebnis, $i , 'pv1_colorthreshold'),
	"pv1_threshold1"	=> mysql_result($ergebnis, $i , 'pv1_threshold1'),
	"pv1_threshold1_color"	=> mysql_result($ergebnis, $i , 'pv1_threshold1_color'),
	"pv1_threshold2"	=> mysql_result($ergebnis, $i , 'pv1_threshold2'),
	"pv1_threshold2_color"	=> mysql_result($ergebnis, $i , 'pv1_threshold2_color'),
	"pv1_threshold3"	=> mysql_result($ergebnis, $i , 'pv1_threshold3'),
	"pv1_threshold3_color"	=> mysql_result($ergebnis, $i , 'pv1_threshold3_color'),
	"pv1_threshold4"	=> mysql_result($ergebnis, $i , 'pv1_threshold4'),
	"pv1_threshold4_color"	=> mysql_result($ergebnis, $i , 'pv1_threshold4_color'),
	"vb1_scale"		=> mysql_result($ergebnis, $i , 'vb1_scale'),
	"vb1_targetvalue"	=> mysql_result($ergebnis, $i , 'vb1_targetvalue'),
	"vb1_targetvaluep"	=> mysql_result($ergebnis, $i , 'vb1_targetvaluep'),
	"vb1_colorthreshold"	=> mysql_result($ergebnis, $i , 'vb1_colorthreshold'),
	"vb1_threshold1"	=> mysql_result($ergebnis, $i , 'vb1_threshold1'),
	"vb1_threshold1_color"	=> mysql_result($ergebnis, $i , 'vb1_threshold1_color'),
	"vb1_threshold2"	=> mysql_result($ergebnis, $i , 'vb1_threshold2'),
	"vb1_threshold2_color"	=> mysql_result($ergebnis, $i , 'vb1_threshold2_color'),
	"vb1_threshold3"	=> mysql_result($ergebnis, $i , 'vb1_threshold3'),
	"vb1_threshold3_color"	=> mysql_result($ergebnis, $i , 'vb1_threshold3_color'),
	"vb1_threshold4"	=> mysql_result($ergebnis, $i , 'vb1_threshold4'),
	"vb1_threshold4_color"	=> mysql_result($ergebnis, $i , 'vb1_threshold4_color'),
	];
  


 mysql_close($connection);
 $baris = array('SettingsSet' => $row);
 print json_encode($baris);

?>





