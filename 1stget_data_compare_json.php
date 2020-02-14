<?php
 header('Content-Type: application/json');
 include("functions/connect_db.php");   
 
 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  $table = $_POST['TABLE'];
  $start = $_POST['START'];
  $ende  = $_POST['ENDE'];
  
  //$start = "2018-01-01 23:59:59";
  //$ende  = "2018-01-20 23:59:59";
  //$table = "TAG";
  
  // Für Postman-Test
  //$table = $_GET['TABLE'];
  //$start = $_GET['START'];
  //$ende  = $_GET['ENDE'];
////////////////////////////////////////////////////////////////////////////////////////////////////////
// GET DATA PV  
  $connection = conn_db("PVSTROM");
  //$data_pv = get_data_array("PV", $table, $start, $ende);
  //echo $data_pv;
  switch ($table) {
	    case "TAG":
    	      $abfrage_pv = sprintf("SELECT * FROM EINSPEISUNG_TAG WHERE ZEIT BETWEEN '%s' AND '%s'",
		                 mysql_real_escape_string($start),
		                 mysql_real_escape_string($ende));
	    break;
	    case "WOCHE":
              $abfrage_pv = sprintf("SELECT * FROM EINSPEISUNG_WOCHE WHERE ZEIT BETWEEN '%s' AND '%s'",
		                 mysql_real_escape_string($start),
		                 mysql_real_escape_string($ende));
	    break;
	    case "MONAT":
              $abfrage_pv = sprintf("SELECT * FROM EINSPEISUNG_MONAT WHERE ZEIT BETWEEN '%s' AND '%s'",
		                 mysql_real_escape_string($start),
		                 mysql_real_escape_string($ende));
	    break;
	    case "JAHR":
              $abfrage_pv = sprintf("SELECT * FROM EINSPEISUNG_JAHR WHERE ZEIT BETWEEN '%s' AND '%s'",
		                 mysql_real_escape_string($start),
		                 mysql_real_escape_string($ende));
	    break;
  }
  $ergebnis_pv = mysql_query($abfrage_pv);
  $num = mysql_num_rows($ergebnis_pv);
  mysql_close($connection);
////////////////////////////////////////////////////////////////////////////////////////////////////////
// GET DATA VB
  $connection_vb = conn_db("STROM");
	switch ($table) {
	    case "TAG":
    	      $abfrage_vb = sprintf("SELECT * FROM STROMVERBRAUCH_TAG WHERE ZEIT BETWEEN '%s' AND '%s'",
		                 mysql_real_escape_string($start),
		                 mysql_real_escape_string($ende));
	    break;
	    case "WOCHE":
              $abfrage_vb = sprintf("SELECT * FROM STROMVERBRAUCH_WOCHE WHERE ZEIT BETWEEN '%s' AND '%s'",
		                 mysql_real_escape_string($start),
		                 mysql_real_escape_string($ende));
	    break;
	    case "MONAT":
              $abfrage_vb = sprintf("SELECT * FROM STROMVERBRAUCH_MONAT WHERE ZEIT BETWEEN '%s' AND '%s'",
		                 mysql_real_escape_string($start),
		                 mysql_real_escape_string($ende));
	    break;
	    case "JAHR":
              $abfrage_vb = sprintf("SELECT * FROM STROMVERBRAUCH_JAHR WHERE ZEIT BETWEEN '%s' AND '%s'",
		                 mysql_real_escape_string($start),
		                 mysql_real_escape_string($ende));
	    break;
	}
  $ergebnis_vb = mysql_query($abfrage_vb);
  mysql_close($connection_vb);
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////  
// Daten zu JSON zusammenführen           

  for ($i = 0 ; $i < $num; $i++)
  {
	  $datum = substr(mysql_result($ergebnis_pv, $i , 'ZEIT'), 0, 10);

	  $rows[$i] = [
		 "Datum"     => $datum,
		 "ZaehlerPV" => mysql_result($ergebnis_pv, $i , 'ZAEHLERNR'),
		 "WertPV"    => mysql_result($ergebnis_pv, $i , 'GESAMT'),
		 "ZaehlerVB" => mysql_result($ergebnis_vb, $i , 'ZAEHLERNR'),
		 "WertVB"    => mysql_result($ergebnis_vb, $i , 'GESAMT'),
		];
	}
  
  $baris = array('DataSet' => $rows);
  echo json_encode($baris);

} 
  
?>



