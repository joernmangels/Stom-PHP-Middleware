	$(function(){
//  $( "#startzeitpunkt" ).datetimepicker( { dateFormat: 'yy-mm-dd', timeFormat: 'HH:mm:ss' } ); 
  
//    $("#startzeitpunkt").datepicker({dateFormat: 'yy-mm-dd'+' 23:59:59', 
//                                      numberOfMonths: 3,
//                                      changeMonth: true,
//                                      changeYear: true,
//                                      showButtonPanel: true,
//                                      dateFormat: 'MM yy'
//                                      });
      $("#startzeitpunkt").datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            //dateFormat: 'yy-mm-dd'+' 23:59:59',
            dateFormat: 'yy',
            onClose: function(dateText, inst) { 
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1));
            },
//            beforeShow : function(input, inst) {
//                var datestr;
//                if ((datestr = $(this).val()).length > 0) {
//                    year = datestr.substring(datestr.length-4, datestr.length);
//                    month = jQuery.inArray(datestr.substring(0, datestr.length-5), 
//                    $(this).datepicker('option', 'monthNamesShort'));
//                    $(this).datepicker('option', 'defaultDate', new Date(year, month, 1));
//                    $(this).datepicker('setDate', new Date(year, month, 1));
//                }
//            }
        });

  

  
  
    
//    $("#endezeitpunkt").datepicker({dateFormat: 'yy-mm-dd'+' 23:59:59', numberOfMonths: 3});
      $("#endezeitpunkt").datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            //dateFormat: 'MM yy',
            dateFormat: 'yy',
            onClose: function(dateText, inst) { 
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1));
            },
//            beforeShow : function(input, inst) {
//                var datestr;
//                if ((datestr = $(this).val()).length > 0) {
//                    year = datestr.substring(datestr.length-4, datestr.length);
//                    month = jQuery.inArray(datestr.substring(0, datestr.length-5), 
//                    $(this).datepicker('option', 'monthNamesShort'));
//                    $(this).datepicker('option', 'defaultDate', new Date(year, month, 1));
//                    $(this).datepicker('setDate', new Date(year, month, 1));
//                }
//            }
        });
	});
//
function clear_canvas()
{
  var can = document.getElementById('canvasBar');
  RGraph.Reset(can);
//  var ctx = can.getContext('2d');

//  ctx.restore();
//  ctx.clearRect(0, 0, can.width, can.height);
 
//ctx.save();
//ctx.setTransform(1, 0, 0, 1, 0, 0);
// Will always clear the right space
//ctx.clearRect(0, 0, can.width, can.height);
//ctx.restore();

//can.width = can.width;
//  ctx.fillStyle = 'white';
//  ctx.fillRect(0, 0, can.width, can.height);

}
//
    function diagramm_ausgeben(serverstring)
    { 
    
      clear_canvas();
       
      //document.write(serverstring);  
      //JSON-String in Array umwandeln
      var werte = JSON.parse(serverstring);  
      //document.write(werte);
      //Ermitteln, wie viele Datens?tze enthalten sind
      var i = werte.length;  
      //Variablen definieren
      var labels = [];
      var werte2 = [];
      var tips = [];
      //Schleife um alle Datens?tze im Array ausf?hren
      for (var k=0; k<i; k++)
      {
        //Die Werte f?r das Chart
        //Array "werte"
        //Index 0: ZEIT 
        //Index 1: ZAEHLER
        //Index 2: GESAMT (dies wollen wir auslesen)
        werte2.push([werte[k][2]]);
        //Labels erzeugen
        //Hier einfach nur das Datum (Index 0) hinterlegen
        labels.push([werte[k][0]]);
        //Tooltip aufbauen
        //Hier nur die Werte hinterlegen
        tips.push(werte[k][2]);
        //Es geht auch sowas:
        //tips.push("Verbrauch: " + werte[k][2]);
        //Grunds?tzlich ist der Tooltip ein HTML-Div-Element. Man kann hier also auch komplexe
        //Dinge machen. Das k?nnte man vieleicht benutzen, um die Ereignisse (neue Waschmaschine) 
        //zu erfassen.
      }      
      //Werte f?r Chart hinterlegen
//      bar = new RGraph.Bar('canvasBar', werte2);
//      bar.Set('chart.gutter.left', 25);
//      bar.Set('chart.gutter.bottom', 100);
//      bar.Set('chart.title', 'Tagesertrag in KW/h');
//      bar.Set('chart.colors', ['rgb(34,139,34)']);       
//      bar.Set('chart.text.angle', 60);
//      //Tooltips hinterlegen
//      bar.Set('chart.tooltips', tips);
//      bar.Set('chart.tooltips.event',"onmousemove");
//      bar.Set('chart.background.grid.autofit.align', true);
//      bar.Set('chart.ymax',20);
//      //Labels hinterlegen
//      bar.Set('chart.labels', labels);
//      bar.Draw();

//            var bar = new RGraph.Bar('canvasBar', [12,13,16,15,16,19,19,12,23,16,13,24])
//                .Set('gutter.left', 35)
//                .Set('title', 'A basic chart')
//                .Set('labels', ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
//                .Draw();
                

         new RGraph.Bar({
            id: 'canvasBar',
            data: werte2,
            options: {
                ymax: 5500,
                labels: labels,
                colors: ['red'],
                gutterLeft: 50,
                gutterRight: 5,
                gutterTop: 50,
                tooltips: tips,
                labelsAbove: true,
                labelsAboveDecimals: 2,
                tooltipsEvent: 'onmousemove',
                title: 'Jahresverbrauch in KW/h',
                gutterBottom: 100,
                textAngle: 40,
                textAccessible: false,
                backgroundGridAutofitNumvlines: 7,
                labelsOffsety: 7
            }
        }).grow();               
                
//        }).draw();
    }
//
  function get_data(starti, ende) {
//         alert(start+ende);
//    if (str == "") {
//        document.getElementById("txtHint").innerHTML = "";
//        return;
//    } else { 
      if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
//               document.getElementById("sicherheitshinweise").innerHTML=xmlhttp.responseText;
              return xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","/functions/php/get_woche.php?q="+starti,true);
//        xmlhttp.open("GET","/functions/php/phpinfo.php?q="+starti,true);
//        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
      }
 // }
 function get_data_jquery(starti, ende) {
            //Browser Support Code
     var ajaxRequest;  // The variable that makes Ajax possible!
               
     try {
        // Opera 8.0+, Firefox, Safari
         ajaxRequest = new XMLHttpRequest();
     }catch (e) {
        // Internet Explorer Browsers
        try {
           ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }catch (e) {
           try{
              ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
           }catch (e){
              // Something went wrong
              alert("Your browser broke!");
              return false;
           }
        }
     }
 
     // Create a function that will receive data 
     // sent from the server and will update
     // div section in the same page.
				
     ajaxRequest.onreadystatechange = function(){
      if(ajaxRequest.readyState == 4){
           var ajaxDisplay = document.getElementById('ajaxDiv');
           ajaxDisplay.innerHTML = ajaxRequest.responseText;
      }
     }
 
 }
 //
function get_data2(starti, ende) {
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "/functions/php/get_woche.php";
//    var fn = document.getElementById("first_name").value;
//    var ln = document.getElementById("last_name").value;
    var vars = "firstname="+starti+"&lastname="+ende;
//    var vars = starti+ende;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
//			document.getElementById("status").innerHTML = return_data;
        return return_data; 
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
//    document.getElementById("status").innerHTML = "processing...";
}
//
function get_data3(starti, ende){
    var postdata = "START="+starti+"&ENDE="+ende;
    
    var aj = $.ajax({
        type: "POST",
        url: "/functions/php/get_jahr.php",
        data: postdata,
        dataType: 'json',
        cache: false,
        async: false
    //}).responseText;
        });
        
//        var response = {valid: aj.statusText,  data: aj.responseJSON};
		    var response = aj.responseText;
//		    var response = aj.responseJSON;
        return response;
}
//
function transform_date(dat){

     return dat + '-' + '12-31 23:59:59';   

}
//
  function chkForm(formu)
  {
  
    //start = '2016-10-02 23:59:59';
    //ende  = '2016-10-30 23:59:59';
    start = formu.startzeitpunkt.value;
    ende  = formu.endezeitpunkt.value;
    // Datum kommt so: "November 2016"  umwandeln in 2016-11-30 23:59:59
    
    var newstart = transform_date(start);
    var newende  = transform_date(ende);
    
        
    if (newende < newstart)
    {
        alert('Bitte Start<=Ende eingeben!');
        return false;
    }
    if (newstart == "" || newende == "")
    {
        alert("Bitte Start- und Endejahr eingeben!");
        formu.startzeitpunkt.focus();
        return false;
    } 
    else
    {
//    alert(formu.startzeitpunkt.value);
//      var rdata = get_data (formu.startzeitpunkt.value, formu.endezeitpunkt.value);
//      var rdata = get_data_jquery (formu.startzeitpunkt.value, formu.endezeitpunkt.value);
      var rdata = get_data3(newstart, newende);
//      alert(rdata);
//      diagramm_ausgeben(rdata);
      return rdata;
    }
  }
//
function processing(formu) {
  var rdata =  chkForm(formu);
  
  if (rdata != false)
  { 
   var daten = rdata.split("@");
   var durchschnitt = "Durchschnittswert:" + " " + daten[0] + " " + "kw/h pro Jahr"; 
   
   document.getElementById('average').innerHTML = durchschnitt;
//   diagramm_ausgeben(rdata);
   diagramm_ausgeben(daten[1]);
  }
}
