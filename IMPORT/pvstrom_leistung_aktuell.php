<?php
    include("functions/connect_db.php");
    include("functions/query.php"); 
        
    $connection= conn_db("PVSTROM"); 
    
    $start = date("Y-m-d 00:00:00");
    $ende = date("Y-m-d 23:59:59");    
    $leistung=get_leistung_einspeisung($start, $ende, "DESC");
    $gesamtmax=get_gesamt_einspeisung($start, $ende, "DESC");
                                                     
    $gesamtmin=get_gesamt_einspeisung($start, $ende, "ASSC");
    $zeit=get_lasttime_einspeisung($start, $ende);

    $gesamt_today = $gesamtmax - $gesamtmin ;
    /** echo "$gesamt_today"; */
?>
<html>
  <head>    
    <title>PV-Anlage - Aktuelle Leistung
    </title>         
    <meta name="keywords" content="PV-Anlage - Aktuelle Leistung" />    
    <meta name="description" content="PV-Anlage - Aktuelle Leistung" />    
    <meta name="googlebot" content="NOODP">    
        
    <script src="/RGraph/libraries/RGraph.common.core.js" ></script>    
<!--    <script src="/RGraph/libraries/RGraph.gauge.js" ></script>  -->
    <script src="/RGraph/libraries/RGraph.meter.js"></script>    

  </head>
  <body>
  <h1>PV-Anlage - Aktuelle Leistung:  <?php print($leistung) ?> Watt</h1>  
  <h2>Zeit: <?php print($zeit) ?> </h2>  
  <h2>Heutige Einspeiseleistung:  <?php print($gesamt_today) ?> kw/h</h2>    
   
  <canvas id="cvs" width="750" height="450"> 
      [No canvas support]
  </canvas>    
 
<script>
     window.onload = function ()
     {
//        var gauge1 = new RGraph.Gauge({
//            id: 'cvs',
//            min: 0,
//            max: 3500,
//            value: [<?php print($leistung) ?>,<?php print($leistung) ?>],
//            options: {
//                textAccessible: true
//            }
//        });
//        gauge1.Set('chart.title', 'PV-Leistung(Watt)');
//        gauge1.Set('chart.text.size', '15');
//        gauge1.Set('chart.labels.count', '5');
//        gauge1.Set('chart.title.top.size', '20');
/*
        gauge1.Set('chart.scale.thousand', '.');        
        gauge1.Set('chart.red.start', 2000);
        gauge1.Set('chart.red.end', 3500);
        gauge1.Set('chart.yellow.start', 1500);
        gauge1.Set('chart.yellow.end', 2000);
        gauge1.Set('chart.green.start', 0);
        gauge1.Set('chart.green.end', 1500);
        gauge1.Set('chart.gutter.bottom', 25);
        gauge1.Set('chart.gutter.left', 35);
        gauge1.Set('chart.gutter.right', 25);
        gauge1.Set('chart.gutter.top', 25);
        gauge1.Set('chart.labels.above', false);
        gauge1.Set('chart.labels.above.decimals', 0);
        gauge1.Set('chart.scale.point', ',');
        gauge1.Set('chart.scale.thousand', '.');
        gauge1.Set('chart.shadow', true);
        gauge1.Set('chart.shadow.blur', 15);
        gauge1.Set('chart.shadow.color', '#000000');
        gauge1.Set('chart.title.vpos', '0.6');
        gauge1.Set('chart.linewidth', 1);
        gauge1.Set('chart.linewidth.segments',0);
        gauge1.Set('chart.yellowColor', '#82FA58');
        gauge1.Set('chart.redColor', '#04B404');
        gauge1.grow();
*/
        var meter = new RGraph.Meter({
            id: 'cvs',
            min: 0,
            max: 3000,
            value: <?php print($leistung) ?>,
            options: {
                title:  'PV-Leistung(Watt)',
                gutterTop: 50,
                gutterBottom: 30,                
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
        

        
     }
</script>           
    <table border="1" width="100%">                                                   
      <tr>                                           
        <td align="left">                                                     
          <a href="STROM.html">Zur&uumlck zur &Uumlbersicht</a>  </td>                                 
      </tr>                      
    </table>     
  </body>
</html>