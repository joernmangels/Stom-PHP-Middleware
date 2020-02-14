<?php

  exec('sudo /EASYMETER/get_watt_pv.py', $output, $return_var);
 
//  echo count($output);
//  echo $output[0];
    
  $teile = explode(" ", $output[0]);
 
//  $datum = $teile[0];
//  $zeit  = $teile[1];
//  $znr   = $teile[2];
//  $stand = $teile[3];
  $watt  = $teile[4];
  
  echo $datum;
  echo $zeit;
  echo $znr;
  echo $stand;
  echo $watt;  
?>