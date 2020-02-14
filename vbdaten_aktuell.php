<?php
 header('Content-Type: application/json');
 
 include("functions/connect_db.php");
 include("functions/query.php"); 
 $connection= conn_db("STROM"); 
 
 //Aktuelle Daten
//(
//    [Aktuell] => Array
//        (
//            [letztemessung] => 2018-02-02 16:40:04
//            [zaehlernummer] => 0272031312686
//            [gesamtzaehlerstand] => 11531.91
//            [aktuelle_leistung] => 6.16
//            [gesamt_heute] => 1.29
//            [gesamt_woche] => 10.9
//            [gesamt_monat] => 3.64
//            [gesamt_jahr] => 73.29
//            [tagesziel] => 8.6
//            [wochenziel] => 10.38
//            [monatsziel] => 0.81
//            [jahresziel] => 2.62
//        )
//)

 $start = date("Y-m-d 00:00:00");
 $ende = date("Y-m-d 23:59:59"); 
 $data=get_data_all_verbrauch($start, $ende); 
 /**  Tages Gesamt */   
 $gesamtmax=get_gesamt_stromverbrauch($start, $ende, "DESC");
 $gesamtmin=get_gesamt_stromverbrauch($start, $ende, "ASSC");    
 $gesamt_today = $gesamtmax - $gesamtmin ; 
 /**  Wochen Gesamt */
 $startwoche=strftime("%w",mktime(0,0,0,date("m"),date("d"),date("Y")))-1; 
 if($startwoche==-1) $startwoche=6; 
 $start = date("Y-m-d",mktime(0,0,0,date("m"),date("d")-$startwoche,date("Y"))) . " 00:00:00";
 $gesamtmax=get_gesamt_stromverbrauch($start, $ende, "DESC");
 $gesamtmin=get_gesamt_stromverbrauch($start, $ende, "ASSC");    
 $gesamt_week = $gesamtmax - $gesamtmin ;
 /**  Monats Gesamt */      
 $start = date("Y-m-01 00:00:00");
 $gesamtmax=get_gesamt_stromverbrauch($start, $ende, "DESC");
 $gesamtmin=get_gesamt_stromverbrauch($start, $ende, "ASSC");    
 $gesamt_month = $gesamtmax - $gesamtmin ;
 /**  Jahres Gesamt */
 $start = date("Y-01-01 00:00:00");
 $gesamtmax=get_gesamt_stromverbrauch($start, $ende, "DESC");
 $gesamtmin=get_gesamt_stromverbrauch($start, $ende, "ASSC");    
 $gesamt_year = $gesamtmax - $gesamtmin ;
 
 // Tagesziel max = <20kwh
 $maxpv = 20; 
 $tagesziel = 100 / $maxpv * $gesamt_today;
 // Wochenziel max = 140kwh
 $maxpv = 140; 
 $wochenziel = 100 / $maxpv * $gesamt_week; 
 // Monatsziel max = 450kwh
 $maxpv = 550; 
 $monatsziel = 100 / $maxpv * $gesamt_month;  
// Jahresziel max = 2800kwh
 $maxpv = 5000; 
 $jahresziel = 100 / $maxpv * $gesamt_year;  
  
 
 // Übergabe Array
 $rows = [
    "letztemessung"      => $data[0],
    "zaehlernummer"      => $data[1],
    "gesamtzaehlerstand" => round($data[2], 1),
    "aktuelle_leistung"  => round($data[3], 1),
    "gesamt_heute"       => round($gesamt_today, 1),
    "gesamt_woche"       => round($gesamt_week, 1),
    "gesamt_monat"       => round($gesamt_month, 1),
    "gesamt_jahr"        => round($gesamt_year, 1),
    "tagesziel"          => round($tagesziel, 0),
    "wochenziel"         => round($wochenziel, 0),
    "monatsziel"         => round($monatsziel, 0),
    "jahresziel"         => round($jahresziel, 0),                  
];
 
 $baris = array('AktuellSet' => $rows);
 print json_encode($baris);
 //print_r ($baris);
?>