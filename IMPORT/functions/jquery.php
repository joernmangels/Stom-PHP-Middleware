<!doctype html>
<html>
  <head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="jquery/themes/ui-lightness/jquery-ui.css" />
    <script src="jquery/jquery-1.9.1.js"></script>
    <script src="jquery/js/jquery-ui-1.10.3.custom.js"></script>
    <script>  
      jQuery(function($){
          $.datepicker.regional['de'] = {clearText: 'löschen', clearStatus: 'aktuelles Datum löschen',
                  closeText: 'schließen', closeStatus: 'ohne Änderungen schließen',
                  prevText: '<zurück', prevStatus: 'letzten Monat zeigen',
                  nextText: 'Vor>', nextStatus: 'nächsten Monat zeigen',
                  currentText: 'heute', currentStatus: '',
                  monthNames: ['Januar','Februar','März','April','Mai','Juni',
                  'Juli','August','September','Oktober','November','Dezember'],
                  monthNamesShort: ['Jan','Feb','Mär','Apr','Mai','Jun',
                  'Jul','Aug','Sep','Okt','Nov','Dez'],
                  monthStatus: 'anderen Monat anzeigen', yearStatus: 'anderes Jahr anzeigen',
                  weekHeader: 'Wo', weekStatus: 'Woche des Monats',
                  dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
                  dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa'],
                  dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'],
                  dayStatus: 'Setze DD als ersten Wochentag', dateStatus: 'Wähle D, M d',
                  dateFormat: 'dd.mm.yy', firstDay: 1, 
                  initStatus: 'Wähle ein Datum', isRTL: false};
          $.datepicker.setDefaults($.datepicker.regional['de']);
      });
    </script>
    
    
    
    <link rel="stylesheet" href="jquery/timepicker/jquery-ui-timepicker-addon.css" />
    <script src="jquery/timepicker/jquery-ui-timepicker-addon.js"></script>
    
    <script>
      $.timepicker.regional['de'] = {
        timeOnlyTitle: 'Uhrzeit auswählen',
        timeText: 'Zeit',
        hourText: 'Stunde',
        minuteText: 'Minute',
        secondText: 'Sekunde',
        currentText: 'Jetzt',
        closeText: 'Fertig',
        ampm: false
      };
      $.timepicker.setDefaults($.timepicker.regional['de']);
    </script>
    
    
    
    <link rel="stylesheet" href="jquery/css/style.css" />

  </head>

</html>   