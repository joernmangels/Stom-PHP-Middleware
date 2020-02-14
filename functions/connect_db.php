<?php
  function conn_db($datenbank){
    $hostname = "192.168.2.180";
    $username = "root";
    $password = "deeuu001";
    $database = $datenbank;
    
    $connection = mysql_connect($hostname, $username, $password) OR die('Could not connect to MySQL: ' . mysql_error());
    mysql_select_db($database);

    return $connection;
  }
?> 