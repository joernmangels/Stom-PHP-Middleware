<?php
 header('Content-Type: application/json');
 
 include("connect_db.php");
 include("query_db.php"); 
 
//$starti = $_GET['q'];
// echo $starti;
//  echo $_POST['START'];
//  echo $_POST['ENDE'];
 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  $start = $_POST['START'];
  $ende  = $_POST['ENDE'];
  


  $connection= conn_db("PVSTROM"); 
  
  list($data, $average) = get_data_stromeinspeisung_tag3($start, $ende);
//  $over = json_encode($data);
//  echo json_encode($data);
    echo round($average, 2);
    echo '@';
    echo $data;
 } 
 
//  $start = '2016-10-02 23:59:59';
//  $ende  = '2016-10-30 23:59:59';
//  $connection= conn_db("PVSTROM"); 
//  list($data, $average) = get_data_stromeinspeisung_woche($start, $ende);
//  $over = json_encode($data);
//  echo $over;
//  echo $average;
 
?>