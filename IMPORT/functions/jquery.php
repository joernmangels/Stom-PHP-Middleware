<!doctype html>
<html>
  <head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="jquery/themes/ui-lightness/jquery-ui.css" />
    <script src="jquery/jquery-1.9.1.js"></script>
    <script src="jquery/js/jquery-ui-1.10.3.custom.js"></script>
    <script>  
      jQuery(function($){
          $.datepicker.regional['de'] = {clearText: 'l�schen', clearStatus: 'aktuelles Datum l�schen',
                  closeText: 'schlie�en', closeStatus: 'ohne �nderungen schlie�en',
                  prevText: '<zur�ck', prevStatus: 'letzten Monat zeigen',
                  nextText: 'Vor>', nextStatus: 'n�chsten Monat zeigen',
                  currentText: 'heute', currentStatus: '',
                  monthNames: ['Januar','Februar','M�rz','April','Mai','Juni',
                  'Juli','August','September','Oktober','November','Dezember'],
                  monthNamesShort: ['Jan','Feb','M�r','Apr','Mai','Jun',
                  'Jul','Aug','Sep','Okt','Nov','Dez'],
                  monthStatus: 'anderen Monat anzeigen', yearStatus: 'anderes Jahr anzeigen',
                  weekHeader: 'Wo', weekStatus: 'Woche des Monats',
                  dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
                  dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa'],
                  dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'],
                  dayStatus: 'Setze DD als ersten Wochentag', dateStatus: 'W�hle D, M d',
                  dateFormat: 'dd.mm.yy', firstDay: 1, 
                  initStatus: 'W�hle ein Datum', isRTL: false};
          $.datepicker.setDefaults($.datepicker.regional['de']);
      });
    </script>
    
    
    
    <link rel="stylesheet" href="jquery/timepicker/jquery-ui-timepicker-addon.css" />
    <script src="jquery/timepicker/jquery-ui-timepicker-addon.js"></script>
    
    <script>
      $.timepicker.regional['de'] = {
        timeOnlyTitle: 'Uhrzeit ausw�hlen',
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