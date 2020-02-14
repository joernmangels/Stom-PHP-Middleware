<?php
  function conn_db($datenbank){
    $hostname = "localhost";
    $username = "root";
    $password = "deeuu001";
    $database = $datenbank;
    
    $connection = mysql_connect($hostname, $username, $password) OR die('Could not connect to MySQL: ' . mysql_error());
    mysql_select_db($database);

    return $connection;
  }
?> 