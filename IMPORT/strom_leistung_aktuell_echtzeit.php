<?php
  
  exec('sudo /EASYMETER/get_watt.py', $output, $return_var);
  
  $teile = explode(" ", $output[0]);
 
  $datum = $teile[0];
  $zeit  = $teile[1];
  $znr   = $teile[2];
  $stand = (float)$teile[3];
  $watt  = (float)$teile[4];

?>



<html>
<head>

    <title>Stromverbrauch - Aktuelle Leistung</title>
    
    <meta name="keywords" content="Stromverbrauch - Aktuelle Leistung" />
    <meta name="description" content="Stromverbrauche - Aktuelle Leistung" />
    <meta name="googlebot" content="NOODP">


    <script src="/RGraph/libraries/RGraph.common.core.js" ></script>
<!--    <script src="/RGraph/libraries/RGraph.gauge.js" ></script>  -->
    <script src="/RGraph/libraries/RGraph.meter.js"></script>    

</head>
<body>

    <h2>Stromverbrauch - Aktuelle Leistung: <?php print($watt) ?> Watt</h1>
    <h3>Datum/Uhrzeit: <?php print($datum) ?> / <?php print($zeit) ?> </h2>  
    <h3>ZählerNr/Gesamtstand: <?php print($znr) ?> / <?php print($stand) ?> kw/h</h2>  

    
    <canvas id="cvs" width="700" height="450">
       [No canvas support]
    </canvas>

    <script>
     window.onload = function ()
     {
/*
        var gauge1 = new RGraph.Gauge({
            id: 'cvs',
            min: 0,
            max: 4000,
            value: [<?php print($leistung) ?>,<?php print($leistung) ?>],
            options: {
                textAccessible: true
            }
        });
        
        gauge1.Set('chart.title', 'Leistung(Watt)');
        gauge1.Set('chart.text.size', '15');
        gauge1.Set('chart.labels.count', '5');
        gauge1.Set('chart.title.top.size', '20');
        gauge1.Set('chart.scale.thousand', '.');        
        gauge1.Set('chart.red.start', 2400);
        gauge1.Set('chart.red.end', 4000);
        gauge1.Set('chart.yellow.start', 1600);
        gauge1.Set('chart.yellow.end', 2400);
        gauge1.Set('chart.green.start', 0);
        gauge1.Set('chart.green.end', 1600);
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
        gauge1.grow();        
  */

        var meter = new RGraph.Meter({
            id: 'cvs',
            min: 0,
            max: 3000,
            value: <?php print($watt) ?>,
            options: {
                titleSize: 20,
                greenColor: 'Gradient(green:#040)',
                yellowColor: 'Gradient(#ff0:#440)',
                redColor: 'Gradient(#f00:#400)',
                title:  <?php print($watt) ?>+' Watt',
                gutterTop: 50,
                gutterBottom: 30,
                unitsPost: '',
                redStart: 1500,
                redEnd: 3000,
                yellowStart: 750,
                yellowEnd: 1500,
                greenStart: 0,
                greenEnd: 750,
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

