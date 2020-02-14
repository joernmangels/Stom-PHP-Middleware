<?php
 header('Content-Type: application/json');
 
 include("functions/connect_db.php");
 include("functions/query.php"); 
 $connection= conn_db("STROM"); 
 
 $data=get_high_vb(); 

 $rows = [
    "vb_high_day"         => $data[0],
    "vb_high_day_value"   => round($data[1], 1),
    "vb_high_week"        => $data[2],
    "vb_high_week_kw"     => $data[3],
    "vb_high_week_value"  => round($data[4], 1),
    "vb_high_month"       => $data[5],
    "vb_high_month_monat" => $data[6],
    "vb_high_month_value" => round($data[7], 1),
    "vb_high_year"        => $data[8],
    "vb_high_year_jahr"   => $data[9],
    "vb_high_year_value"  => round($data[10], 1),
    "vb_high_power"       => $data[11],
    "vb_high_power_value" => round($data[12], 1),

 ];
 
 $baris = array('HighlightVBSet' => $rows);
 print json_encode($baris);

?>