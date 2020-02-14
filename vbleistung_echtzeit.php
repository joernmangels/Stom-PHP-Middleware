<?php

  $fp = fopen("http://192.168.2.180/vbleistung_echtzeit.php", "rb");
  $contents = fread ($fp, 4096); 
  echo $contents; 
  
  //$teile = explode(" ", $output[0]);
  //$teile = explode(" ", $fp[0]);
  // $teile = fgetc($fp);
  //$teile = explode(" ", fgetc($fp));
  //print_r ($teile);
 
//  $datum = $teile[0];
//  $zeit  = $teile[1];
//  $znr   = $teile[2];
//  $stand = (float)$teile[3];
//  $watt  = (float)$teile[4];
  
// Übergabe Array
// $rows = [
//    "datum"              => $datum,
//    "zeit"               => $zeit,
//    "zaehlernr"          => $znr,
//    "stand"              => $stand,
//    "watt"               => $watt,
// ];
 
// $baris = array('AktuellSet' => $rows);
// print json_encode($baris);
//print_r ($baris);

?>
