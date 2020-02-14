<?php
    include("functions/connect_db.php");
    include("functions/query.php"); 
    $connection= conn_db("PVSTROM"); 
    $start = date("Y-m-d 00:00:00");
    $ende = date("Y-m-d 23:59:59"); 
    $data=get_data_all_einspeisung($start, $ende);
    /** var_dump($data);     */
    $zeit     = $data[0];
    $zaehler  = $data[1];
    $gesamt   = $data[2];
    $leistung = $data[3];
  /**  Tages Gesamt */   
    $gesamtmax=get_gesamt_einspeisung($start, $ende, "DESC");
    $gesamtmin=get_gesamt_einspeisung($start, $ende, "ASSC");    
    $gesamt_today = $gesamtmax - $gesamtmin ;
  /**  Wochen Gesamt */
    $startwoche=strftime("%w",mktime(0,0,0,date("m"),date("d"),date("Y")))-1; 
    if($startwoche==-1) $startwoche=6; 
    $start = date("Y-m-d",mktime(0,0,0,date("m"),date("d")-$startwoche,date("Y"))) . " 00:00:00";
    $gesamtmax=get_gesamt_einspeisung($start, $ende, "DESC");
    $gesamtmin=get_gesamt_einspeisung($start, $ende, "ASSC");    
    $gesamt_week = $gesamtmax - $gesamtmin ;
  /**  Monats Gesamt */      
    $start = date("Y-m-01 00:00:00");
    $gesamtmax=get_gesamt_einspeisung($start, $ende, "DESC");
    $gesamtmin=get_gesamt_einspeisung($start, $ende, "ASSC");    
    $gesamt_month = $gesamtmax - $gesamtmin ;
  /**  Jahres Gesamt */
    $start = date("Y-01-01 00:00:00");
    $gesamtmax=get_gesamt_einspeisung($start, $ende, "DESC");
    $gesamtmin=get_gesamt_einspeisung($start, $ende, "ASSC");    
    $gesamt_year = $gesamtmax - $gesamtmin ;
?>

<script src="/RGraph/libraries/RGraph.common.core.js"></script>
<script src="/RGraph/libraries/RGraph.hprogress.js"></script>
<script src="/RGraph/libraries/RGraph.common.dynamic.js" ></script>
<script src="/RGraph/libraries/RGraph.meter.js"></script> 
    
<html>
  <head>    
    <title>PV-Anlage - Aktuelle Z&aumlhlerdaten</title>         
    <meta name="keywords" content="PV-Anlage - Z&aumlhlerdaten" />    
    <meta name="description" content="PV-Anlage - Z&aumlhlerdaten" />    
    <meta name="googlebot" content="NOODP">    
  </head>
  <body>
  <h1>PV-Anlage - Aktuelle Z&aumlhlerdaten</h1>  

<p style="float:left;">
<table border>
     <colgroup>
        <col width=350>
        <col width=200 align=char char=",">
     </colgroup>
    <tr>
      <td><h4>Z&aumlhlernummer</h4></td>
      <td ALIGN="CENTER"><h4><?php print($zaehler) ?></h4></td>
    </tr>
    <tr>
      <td>Letzte Messung</td>
      <td ALIGN="CENTER"> <?php print($zeit) ?></td>
    </tr>
    <tr>
      <td>Gesamtz&aumlhlerstand (kw/h)</td>
      <td ALIGN="CENTER"><?php print($gesamt) ?></td>
    </tr>
    <tr>
      <td>Aktuelle Leistung (Watt)</td>
      <td ALIGN="CENTER"> <?php print($leistung) ?></td>
    </tr>
    <tr>
      <td>Einspeiseleistung - Heute (kw/h)</td>
      <td ALIGN="CENTER"> <?php print($gesamt_today) ?></td>
    </tr>
    <tr>
      <td>Einspeiseleistung - Diese Woche (kw/h)</td>
      <td ALIGN="CENTER"> <?php print($gesamt_week) ?></td>
    </tr>
    <tr>
      <td>Einspeiseleistung - Dieser Monat (kw/h)</td>
      <td ALIGN="CENTER"> <?php print($gesamt_month) ?></td>
    </tr>
    <tr>
      <td>Einspeiseleistung - Dieses Jahr (kw/h)</td>
      <td ALIGN="CENTER"> <?php print($gesamt_year) ?></td>
    </tr>
</table>
</p>
<p> 
<canvas id="leistung" width="700" height="250"> 
      [No canvas support]
</canvas>     
</p>
<div style="clear:left;"></div>




<br>
  <canvas id="heute" width="600" height="100"> 
      [No canvas support]
  </canvas>   
  
  <canvas id="woche" width="600" height="100"> 
      [No canvas support]
  </canvas>   
<br> 
<br>
  <canvas id="monat" width="600" height="100"> 
      [No canvas support]
  </canvas>   
  
  <canvas id="jahr" width="600" height="100"> 
      [No canvas support]
  </canvas>   
<br> 
<br> 
<br> 

 
  <table border="1" width="100%">                                                   
      <tr>                                           
        <td align="left">                                                     
          <a href="STROM.html">Zur&uumlck zur &Uumlbersicht</a>  </td>                                 
      </tr>                      
    </table>     
  </body>
</html>

<script>
    window.onload = function ()
    {
///////////////////////////////////////////////////     
        var meter = new RGraph.Meter({
            id: 'leistung',
            min: 0,
            max: 3000,
            value: <?php print($leistung) ?>,
            options: {
                title:  'PV-Leistung <?php print($leistung) ?> Watt',
                titleSize: 10,
                textSize: 8,
                gutterTop: 30, 
                unitsPost: '',
                redStart: 0,
                redEnd: 750,
                yellowStart: 750,
                yellowEnd: 1500,
                greenStart: 1500,
                greenEnd: 3000,
                scaleThousand: '.',
                textAccessible: false
            }
        }).grow();
///////////////////////////////////////////////////     
       var hprogress = new RGraph.HProgress({
            id: 'heute',
            min: 0,
            max: 20,
            value: <?php print($gesamt_today) ?>,
            options: {
                title:  'Tagesz\u00e4hler <?php print($gesamt_today) ?> (kw/h)',
                titleSize: 10,
                colors: ['green'],
                margin: 0,
                textAccessible: true,
            }
        }).grow();   
///////////////////////////////////////////////////     
       var hprogress = new RGraph.HProgress({
            id: 'woche',
            min: 0,
            max: 120,
            value: <?php print($gesamt_week) ?>,
            options: {
                title:  'Wochenz\u00e4hler <?php print($gesamt_week) ?> (kw/h)',
                titleSize: 10,
                colors: ['green'],
                margin: 0,
                textAccessible: true,
            }
        }).grow();   
///////////////////////////////////////////////////     
        var hprogress = new RGraph.HProgress({
            id: 'monat',
            min: 0,
            max: 450,
            value: <?php print($gesamt_month) ?>,
            options: {
                title:  'Monatsz\u00e4hler <?php print($gesamt_month) ?> (kw/h)',
                titleSize: 10,
                colors: ['green'],
                margin: 0,
                textAccessible: true,
            }
        }).grow();
///////////////////////////////////////////////////     
        var hprogress = new RGraph.HProgress({
            id: 'jahr',
            min: 0,
            max: 3000,
            value: <?php print($gesamt_year) ?>,
            options: {
                title:  'Jahresz\u00e4hler <?php print($gesamt_year) ?> (kw/h)',
                titleSize: 10,
                colors: ['green'],
                margin: 0,
                textAccessible: true,
            }
        }).grow();
///////////////////////////////////////////////////        
    };
</script>