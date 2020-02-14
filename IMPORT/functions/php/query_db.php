<?php
  function get_data_stromverbrauch_tag3($start, $ende) {

        //SQL ausf�hren  
        $abfrage = sprintf("SELECT * FROM STROMVERBRAUCH_TAG WHERE ZEIT BETWEEN '%s' AND '%s'",
                    mysql_real_escape_string($start),
                    mysql_real_escape_string($ende));

        
        $ergebnis = mysql_query($abfrage);
        

  //$res = mysql_query("select * from DAYS where DAY between '".$start."' and '".$ende."' order by DAY");
       //Anzahl der ermittelten Datens�tze herausfinden
       $num = mysql_num_rows($ergebnis);
       //Array definieren (zwei Strings, ein numerischer Wert)
       $a = array (array("", "", 0.0));
       //Array mit Werten f�llen
       if ( $num > 0 )
       {
         for ($i = 0 ; $i < $num; $i++)
         {
           //$a[$i][0] = mysql_result($ergebnis, $i , 'ZEIT');
           $datum = substr(mysql_result($ergebnis, $i , 'ZEIT'), 0, 10);
           $a[$i][0] = $datum;
           $a[$i][1] = mysql_result($ergebnis, $i , 'ZAEHLERNR');
           $a[$i][2] = mysql_result($ergebnis, $i , 'GESAMT');
           $aver = $aver +  mysql_result($ergebnis, $i , 'GESAMT');
         }
       }
       
       if ( $aver > 0 )
       {
         $aver=$aver/$num;
       }
       //Array in JSON umwandeln und ausgeben
       return array(json_encode($a), $aver);
       //return $a;
       //return $a;
  
  }   
//-----------------------------------------------------------------------------
    function get_data_stromeinspeisung_tag3($start, $ende) {

        //SQL ausf�hren  
        $abfrage = sprintf("SELECT * FROM EINSPEISUNG_TAG WHERE ZEIT BETWEEN '%s' AND '%s'",
                    mysql_real_escape_string($start),
                    mysql_real_escape_string($ende));

        
        $ergebnis = mysql_query($abfrage);
        

  //$res = mysql_query("select * from DAYS where DAY between '".$start."' and '".$ende."' order by DAY");
       //Anzahl der ermittelten Datens�tze herausfinden
       $num = mysql_num_rows($ergebnis);
       //Array definieren (zwei Strings, ein numerischer Wert)
       $a = array (array("", "", 0.0));
       //Array mit Werten f�llen
       if ( $num > 0 )
       {
         for ($i = 0 ; $i < $num; $i++)
         {
           //$a[$i][0] = mysql_result($ergebnis, $i , 'ZEIT');
           $datum = substr(mysql_result($ergebnis, $i , 'ZEIT'), 0, 10);
           $a[$i][0] = $datum;
           $a[$i][1] = mysql_result($ergebnis, $i , 'ZAEHLERNR');
           $a[$i][2] = mysql_result($ergebnis, $i , 'GESAMT');
           $aver = $aver +  mysql_result($ergebnis, $i , 'GESAMT');
         }
       }
       
       if ( $aver > 0 )
       {
         $aver=$aver/$num;
       }
       //Array in JSON umwandeln und ausgeben
       return array(json_encode($a), $aver);
       //return $a;
       //return $a;
  
  }
//-----------------------------------------------------------------------------  
  function get_data_stromeinspeisung_woche($start, $ende) {

        //SQL  
        $abfrage = sprintf("SELECT * FROM EINSPEISUNG_WOCHE WHERE ZEIT BETWEEN '%s' AND '%s'",
                    mysql_real_escape_string($start),
                    mysql_real_escape_string($ende));

        
        $ergebnis = mysql_query($abfrage);
        

  //$res = mysql_query("select * from DAYS where DAY between '".$start."' and '".$ende."' order by DAY");
       //Anzahl der ermittelten Datens�tze herausfinden
       $num = mysql_num_rows($ergebnis);
       //Array definieren (zwei Strings, ein numerischer Wert)
       $a = array (array("", "", 0.0));
       //Array mit Werten f�llen
       if ( $num > 0 )
       {
         for ($i = 0 ; $i < $num; $i++)
         {
           //$a[$i][0] = mysql_result($ergebnis, $i , 'ZEIT');
           $datum = substr(mysql_result($ergebnis, $i , 'ZEIT'), 0, 10);
           $a[$i][0] = $datum;
           $a[$i][1] = mysql_result($ergebnis, $i , 'ZAEHLERNR');
           $a[$i][2] = mysql_result($ergebnis, $i , 'GESAMT');
           $aver = $aver +  mysql_result($ergebnis, $i , 'GESAMT');
         }
       }
       
       if ( $aver > 0 )
       {
         $aver=$aver/$num;
       }
       //Array in JSON umwandeln und ausgeben
       return array(json_encode($a), $aver);
       //return $a;
       //return $a;
  
  }       
//-----------------------------------------------------------------------------  
  function get_data_stromverbrauch_woche($start, $ende) {

        //SQL  
        $abfrage = sprintf("SELECT * FROM STROMVERBRAUCH_WOCHE WHERE ZEIT BETWEEN '%s' AND '%s'",
                    mysql_real_escape_string($start),
                    mysql_real_escape_string($ende));

        
        $ergebnis = mysql_query($abfrage);
        

  //$res = mysql_query("select * from DAYS where DAY between '".$start."' and '".$ende."' order by DAY");
       //Anzahl der ermittelten Datens�tze herausfinden
       $num = mysql_num_rows($ergebnis);
       //Array definieren (zwei Strings, ein numerischer Wert)
       $a = array (array("", "", 0.0));
       //Array mit Werten f�llen
       if ( $num > 0 )
       {
         for ($i = 0 ; $i < $num; $i++)
         {
           //$a[$i][0] = mysql_result($ergebnis, $i , 'ZEIT');
           $datum = substr(mysql_result($ergebnis, $i , 'ZEIT'), 0, 10);
           $a[$i][0] = $datum;
           $a[$i][1] = mysql_result($ergebnis, $i , 'ZAEHLERNR');
           $a[$i][2] = mysql_result($ergebnis, $i , 'GESAMT');
           $aver = $aver +  mysql_result($ergebnis, $i , 'GESAMT');
         }
       }
       
       if ( $aver > 0 )
       {
         $aver=$aver/$num;
       }
       //Array in JSON umwandeln und ausgeben
       return array(json_encode($a), $aver);
       //return $a;
       //return $a;
  
  }       
//-----------------------------------------------------------------------------  
  function get_data_stromeinspeisung_monat($start, $ende) {

        //SQL  
        $abfrage = sprintf("SELECT * FROM EINSPEISUNG_MONAT WHERE ZEIT BETWEEN '%s' AND '%s'",
                    mysql_real_escape_string($start),
                    mysql_real_escape_string($ende));

        
        $ergebnis = mysql_query($abfrage);
        

  //$res = mysql_query("select * from DAYS where DAY between '".$start."' and '".$ende."' order by DAY");
       //Anzahl der ermittelten Datens�tze herausfinden
       $num = mysql_num_rows($ergebnis);
       //Array definieren (zwei Strings, ein numerischer Wert)
       $a = array (array("", "", 0.0));
       //Array mit Werten f�llen
       if ( $num > 0 )
       {
         for ($i = 0 ; $i < $num; $i++)
         {
           //$a[$i][0] = mysql_result($ergebnis, $i , 'ZEIT');
           $datum = substr(mysql_result($ergebnis, $i , 'ZEIT'), 0, 10);
           $a[$i][0] = $datum;
           $a[$i][1] = mysql_result($ergebnis, $i , 'ZAEHLERNR');
           $a[$i][2] = mysql_result($ergebnis, $i , 'GESAMT');
           $aver = $aver +  mysql_result($ergebnis, $i , 'GESAMT');
         }
       }
       
       if ( $aver > 0 )
       {
         $aver=$aver/$num;
       }
       //Array in JSON umwandeln und ausgeben
       return array(json_encode($a), $aver);
       //return $a;
       //return $a;
  
  }       
//-----------------------------------------------------------------------------  
  function get_data_stromverbrauch_monat($start, $ende) {

        //SQL  
        $abfrage = sprintf("SELECT * FROM STROMVERBRAUCH_MONAT WHERE ZEIT BETWEEN '%s' AND '%s'",
                    mysql_real_escape_string($start),
                    mysql_real_escape_string($ende));

        
        $ergebnis = mysql_query($abfrage);
        

  //$res = mysql_query("select * from DAYS where DAY between '".$start."' and '".$ende."' order by DAY");
       //Anzahl der ermittelten Datens�tze herausfinden
       $num = mysql_num_rows($ergebnis);
       //Array definieren (zwei Strings, ein numerischer Wert)
       $a = array (array("", "", 0.0));
       //Array mit Werten f�llen
       if ( $num > 0 )
       {
         for ($i = 0 ; $i < $num; $i++)
         {
           //$a[$i][0] = mysql_result($ergebnis, $i , 'ZEIT');
           $datum = substr(mysql_result($ergebnis, $i , 'ZEIT'), 0, 10);
           $a[$i][0] = $datum;
           $a[$i][1] = mysql_result($ergebnis, $i , 'ZAEHLERNR');
           $a[$i][2] = mysql_result($ergebnis, $i , 'GESAMT');
           $aver = $aver +  mysql_result($ergebnis, $i , 'GESAMT');
         }
       }
       
       if ( $aver > 0 )
       {
         $aver=$aver/$num;
       }
       //Array in JSON umwandeln und ausgeben
       return array(json_encode($a), $aver);
       //return $a;
       //return $a;
  
  }  
//-----------------------------------------------------------------------------  
  function get_data_stromeinspeisung_jahr($start, $ende) {

        //SQL  
        $abfrage = sprintf("SELECT * FROM EINSPEISUNG_JAHR WHERE ZEIT BETWEEN '%s' AND '%s'",
                    mysql_real_escape_string($start),
                    mysql_real_escape_string($ende));

        
        $ergebnis = mysql_query($abfrage);
        

  //$res = mysql_query("select * from DAYS where DAY between '".$start."' and '".$ende."' order by DAY");
       //Anzahl der ermittelten Datens�tze herausfinden
       $num = mysql_num_rows($ergebnis);
       //Array definieren (zwei Strings, ein numerischer Wert)
       $a = array (array("", "", 0.0));
       //Array mit Werten f�llen
       if ( $num > 0 )
       {
         for ($i = 0 ; $i < $num; $i++)
         {
           //$a[$i][0] = mysql_result($ergebnis, $i , 'ZEIT');
           $datum = substr(mysql_result($ergebnis, $i , 'ZEIT'), 0, 10);
           $a[$i][0] = $datum;
           $a[$i][1] = mysql_result($ergebnis, $i , 'ZAEHLERNR');
           $a[$i][2] = mysql_result($ergebnis, $i , 'GESAMT');
           $aver = $aver +  mysql_result($ergebnis, $i , 'GESAMT');
         }
       }
       
       if ( $aver > 0 )
       {
         $aver=$aver/$num;
       }
       //Array in JSON umwandeln und ausgeben
       return array(json_encode($a), $aver);
       //return $a;
       //return $a;
  
  }   
//-----------------------------------------------------------------------------  
  function get_data_stromverbrauch_jahr($start, $ende) {

        //SQL  
        $abfrage = sprintf("SELECT * FROM STROMVERBRAUCH_JAHR WHERE ZEIT BETWEEN '%s' AND '%s'",
                    mysql_real_escape_string($start),
                    mysql_real_escape_string($ende));

        
        $ergebnis = mysql_query($abfrage);
        

  //$res = mysql_query("select * from DAYS where DAY between '".$start."' and '".$ende."' order by DAY");
       //Anzahl der ermittelten Datens�tze herausfinden
       $num = mysql_num_rows($ergebnis);
       //Array definieren (zwei Strings, ein numerischer Wert)
       $a = array (array("", "", 0.0));
       //Array mit Werten f�llen
       if ( $num > 0 )
       {
         for ($i = 0 ; $i < $num; $i++)
         {
           //$a[$i][0] = mysql_result($ergebnis, $i , 'ZEIT');
           $datum = substr(mysql_result($ergebnis, $i , 'ZEIT'), 0, 10);
           $a[$i][0] = $datum;
           $a[$i][1] = mysql_result($ergebnis, $i , 'ZAEHLERNR');
           $a[$i][2] = mysql_result($ergebnis, $i , 'GESAMT');
           $aver = $aver +  mysql_result($ergebnis, $i , 'GESAMT');
         }
       }
       
       if ( $aver > 0 )
       {
         $aver=$aver/$num;
       }
       //Array in JSON umwandeln und ausgeben
       return array(json_encode($a), $aver);
       //return $a;
       //return $a;
  
  }     
?> 