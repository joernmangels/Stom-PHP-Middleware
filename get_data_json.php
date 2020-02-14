<?php
 header('Content-Type: application/json');
 
 include("functions/connect_db.php");
 include("functions/query.php"); 

 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  
  $art   = $_POST['ART'];
  $table = $_POST['TABLE'];
  $start = $_POST['START'];
  $ende  = $_POST['ENDE'];
  
  // Welche DB soll geöffnet werden
  switch ($art) {
    case "PV":
        $connection= conn_db("PVSTROM");      
        break;
    case "VB":
        $connection= conn_db("STROM");
        break;
  }
  
  // Für Postman-Test
  //$start = $_GET['START'];
  //$ende  = $_GET['ENDE'];
  //$art   = $_GET['ART'];
  //$table = $_GET['TABLE'];
                        
  $data = get_data_json($art, $table, $start, $ende);
  echo $data;

 } 
  
?>
