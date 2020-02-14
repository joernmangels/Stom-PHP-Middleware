<?php
 header('Content-Type: application/json');
 
 include("functions/connect_db.php");
 include("functions/query.php"); 
 $connection= conn_db("PVSTROM"); 
 
 $data=get_high_pv(); 

 $rows = [
    "pv_high_day"         => $data[0],
    "pv_high_day_value"   => round($data[1], 1),
    "pv_high_week"        => $data[2],
    "pv_high_week_kw"     => $data[3],
    "pv_high_week_value"  => round($data[4], 1),
    "pv_high_month"       => $data[5],
    "pv_high_month_monat" => $data[6],
    "pv_high_month_value" => round($data[7], 1),
    "pv_high_year"        => $data[8],
    "pv_high_year_jahr"   => $data[9],
    "pv_high_year_value"  => round($data[10], 1),
    "pv_high_power"       => $data[11],
    "pv_high_power_value" => round($data[12], 1),

 ];
 
 $baris = array('HighlightPVSet' => $rows);
 print json_encode($baris);

?>