<?php
  function get_data_all_verbrauch($start, $ende){

        $abfrage = sprintf("SELECT * FROM STROMVERBRAUCH WHERE ZEIT BETWEEN '%s' AND '%s' ORDER BY ZEIT DESC LIMIT 1",
                   mysql_real_escape_string($start),
                   mysql_real_escape_string($ende));

        
        $ergebnis = mysql_query($abfrage);
        
        while($row = mysql_fetch_object($ergebnis))
        {
          /** echo "$row->LEISTUNG <br>"; */
          $zeit     = "$row->ZEIT";
          $zaehler  = "$row->ZAEHLERNR";
          $gesamt   = "$row->GESAMT";
          $leistung = "$row->LEISTUNG";
         } 

       /** return $leistung;  */
       return array($zeit, $zaehler, $gesamt, $leistung);
  }
  function get_data_all_einspeisung($start, $ende){

        $abfrage = sprintf("SELECT * FROM EINSPEISUNG WHERE ZEIT BETWEEN '%s' AND '%s' ORDER BY ZEIT DESC LIMIT 1",
                   mysql_real_escape_string($start),
                   mysql_real_escape_string($ende));

        
        $ergebnis = mysql_query($abfrage);
        
        while($row = mysql_fetch_object($ergebnis))
        {
          /** echo "$row->LEISTUNG <br>"; */
          $zeit     = "$row->ZEIT";
          $zaehler  = "$row->ZAEHLERNR";
          $gesamt   = "$row->GESAMT";
          $leistung = "$row->LEISTUNG";
         } 

       /** return $leistung;  */
       return array($zeit, $zaehler, $gesamt, $leistung);
  }
  function get_leistung_einspeisung($start, $ende, $aufab){

/*    $leistung=get_leistung("EINSPEISUNG", $start, $ende, "DESC");*/

    if ($aufab == "DESC")
        {
         $abfrage = sprintf("SELECT LEISTUNG FROM EINSPEISUNG WHERE ZEIT BETWEEN '%s' AND '%s' ORDER BY ZEIT DESC LIMIT 1",
                     mysql_real_escape_string($start),
                     mysql_real_escape_string($ende));
        }
        else
        {
         $abfrage = sprintf("SELECT LEISTUNG FROM EINSPEISUNG WHERE ZEIT BETWEEN '%s' AND '%s' LIMIT 1",
                     mysql_real_escape_string($start),
                     mysql_real_escape_string($ende));
        }
        
        $ergebnis = mysql_query($abfrage);
        
        while($row = mysql_fetch_object($ergebnis))
        {
          /** echo "$row->LEISTUNG <br>"; */
          $leistung = "$row->LEISTUNG";
        } 

       return $leistung;  
  }
  function get_gesamt_einspeisung($start, $ende, $aufab){

/*    $leistung=get_leistung("EINSPEISUNG", $start, $ende, "DESC");*/

    if ($aufab == "DESC")
        {
         $abfrage = sprintf("SELECT GESAMT FROM EINSPEISUNG WHERE ZEIT BETWEEN '%s' AND '%s' ORDER BY ZEIT DESC LIMIT 1",
                     mysql_real_escape_string($start),
                     mysql_real_escape_string($ende));
        }
        else
        {
         $abfrage = sprintf("SELECT GESAMT FROM EINSPEISUNG WHERE ZEIT BETWEEN '%s' AND '%s' LIMIT 1",
                     mysql_real_escape_string($start),
                     mysql_real_escape_string($ende));
        }
        
        $ergebnis = mysql_query($abfrage);
        
        while($row = mysql_fetch_object($ergebnis))
        {
          /** echo "$row->LEISTUNG <br>"; */
          $gesamt = "$row->GESAMT";
        } 

        return $gesamt;
  }
  function get_leistung_stromverbrauch($start, $ende, $aufab){

/*    $leistung=get_leistung("EINSPEISUNG", $start, $ende, "DESC");*/

    if ($aufab == "DESC")
        {
         $abfrage = sprintf("SELECT LEISTUNG FROM STROMVERBRAUCH WHERE ZEIT BETWEEN '%s' AND '%s' ORDER BY ZEIT DESC LIMIT 1",
                     mysql_real_escape_string($start),
                     mysql_real_escape_string($ende));
        }
        else
        {
         $abfrage = sprintf("SELECT LEISTUNG FROM STROMVERBRAUCH WHERE ZEIT BETWEEN '%s' AND '%s' LIMIT 1",
                     mysql_real_escape_string($start),
                     mysql_real_escape_string($ende));
        }
        
        $ergebnis = mysql_query($abfrage);
        
        while($row = mysql_fetch_object($ergebnis))
        {
          /** echo "$row->LEISTUNG <br>"; */
          $leistung = "$row->LEISTUNG";
        } 

        return $leistung;
  }
  function get_lasttime_stromverbrauch($start, $ende){
         $abfrage = sprintf("SELECT ZEIT FROM STROMVERBRAUCH WHERE ZEIT BETWEEN '%s' AND '%s' ORDER BY ZEIT DESC LIMIT 1",
                     mysql_real_escape_string($start),
                     mysql_real_escape_string($ende));

         $ergebnis = mysql_query($abfrage);
         while($row = mysql_fetch_object($ergebnis))
         {
          $zeit = "$row->ZEIT";
        } 

        return $zeit;

  }
  function get_lasttime_einspeisung($start, $ende){
         $abfrage = sprintf("SELECT ZEIT FROM EINSPEISUNG WHERE ZEIT BETWEEN '%s' AND '%s' ORDER BY ZEIT DESC LIMIT 1",
                     mysql_real_escape_string($start),
                     mysql_real_escape_string($ende));

         $ergebnis = mysql_query($abfrage);
         while($row = mysql_fetch_object($ergebnis))
         {
          $zeit = "$row->ZEIT";
        } 

        return $zeit;

  }
  function get_gesamt_stromverbrauch($start, $ende, $aufab){

/*    $leistung=get_leistung("EINSPEISUNG", $start, $ende, "DESC");*/

    if ($aufab == "DESC")
        {
         $abfrage = sprintf("SELECT GESAMT FROM STROMVERBRAUCH WHERE ZEIT BETWEEN '%s' AND '%s' ORDER BY ZEIT DESC LIMIT 1",
                     mysql_real_escape_string($start),
                     mysql_real_escape_string($ende));
        }
        else
        {
         $abfrage = sprintf("SELECT GESAMT FROM STROMVERBRAUCH WHERE ZEIT BETWEEN '%s' AND '%s' LIMIT 1",
                     mysql_real_escape_string($start),
                     mysql_real_escape_string($ende));
        }
        
        $ergebnis = mysql_query($abfrage);
        
        while($row = mysql_fetch_object($ergebnis))
        {
          /** echo "$row->LEISTUNG <br>"; */
          $gesamt = "$row->GESAMT";
        } 

        return $gesamt;
  }

  function get_data_stromverbrauch_tag($start, $ende) {
  
        $abfrage = sprintf("SELECT * FROM STROMVERBRAUCH_TAG WHERE ZEIT BETWEEN '%s' AND '%s'",
                    mysql_real_escape_string($start),
                    mysql_real_escape_string($ende));

        
        $ergebnis = mysql_query($abfrage);
        
        /* for($i = 0; $array[$i] = mysql_fetch_assoc($ergebnis); $i++) ; */
        
        $arr = array();

        if(mysql_num_rows($ergebnis) == 0)
        {
          return $arr;
        }
        
        mysql_data_seek($ergebnis, 0);
 
        while ($row = mysql_fetch_array($ergebnis, MYSQL_ASSOC)) 
        /* while ($row = mysql_fetch_array($ergebnis, MYSQL_ASSOC)) */
        {
        array_push($arr, $row);
        }

/*        array_pop($arr); */
        return $arr;
  
  }
  function get_data_stromverbrauch_tag2($start, $ende) {

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
         }
       }

       //Array in JSON umwandeln und ausgeben
       return json_encode($a);
       //return $a;
       //return $a;
  
  } 
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
       //return array($a);
       //return $a;
  
  }   
?> 
