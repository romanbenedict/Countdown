<!DOCTYPE html>
<html>
  <head>
    <title>Countdown to ...</title>
    <!-- Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">@import "js/jquery.countdown.css";</style> 
	<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Arbutus+Slab' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Kristi' rel='stylesheet' type='text/css'>
  </head>
  <body>
	<div class="container">
	<!-- Header-->
    <h1 style="font-family: 'Arbutus Slab', serif; text-align:center">Countdown to <span class="editable" style="font-family: 'Kristi', cursive;">[...]</span></h1>
	<!--Countdowns-->
	<h2 style="font-family: 'Kristi', cursive; text-align:center;"><span id="countingto" >Date </span> <a href="#" id="todatepicker" data-date-format="yyyy-mm-dd" data-date="<?php echo date("Y-m-d");?>"><i class="icon-calendar"></i></a></h2>
	<div class="row"><div id="countdownto" class="well span8 offset2"><span class="countdown_row countdown_show4"><span class="countdown_section"><span class="countdown_amount">--</span><br>Week</span><span class="countdown_section"><span class="countdown_amount">--</span><br>Days</span><span class="countdown_section"><span class="countdown_amount">--</span><br>Hours</span><span class="countdown_section"><span class="countdown_amount">--</span><br>Minutes</span></span></div></div>
	<h1 style="font-family: 'Arbutus Slab', serif; text-align:center">Time From <span id="countingfrom" style="font-family: 'Kristi', cursive;">Date </span> <a href="#" id="fromdatepicker" data-date-format="yyyy-mm-dd" data-date="2012-09-20"><i class="icon-calendar"></i></a></h1>
	<div class="row"><div id="countdownfrom" class="well span8 offset2"><span class="countdown_row countdown_show4"><span class="countdown_section"><span class="countdown_amount">--</span><br>Week</span><span class="countdown_section"><span class="countdown_amount">--</span><br>Days</span><span class="countdown_section"><span class="countdown_amount">--</span><br>Hours</span><span class="countdown_section"><span class="countdown_amount">--</span><br>Minutes</span></span></div></div>
	<!--Progress Bar-->
	<div class="row"><div class="span1">Start</div><div id="progressbarcontainer" class="progress span10"><!--<div class="bar" style="width: 0%;"></div>--></div><div class="span1">End</div></div>
	<!--Presets Row-->
	<hr>
	<div class="row"><a class="span2 btn btn-large">New Year</a><a class="span2 btn btn-large">Easter</a><a class="span2 btn btn-large">Christmas</a><a class="span2 btn btn-large">Mayan Apocalypse</a><a class="span2 btn btn-large">Save for Bookmark</a></div>
	<!--Advertising Row-->
	<hr>
	<div style="display: block; margin-left: auto; margin-right: auto; width:730px"><script type="text/javascript"><!--
google_ad_client = "ca-pub-1230455213402745";
/* Countdown */
google_ad_slot = "9225796094";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
	<!--Copyright Row-->
	<hr>
	<p style="text-align:center; text-size:small;">Copyright &copy Roman Benedict 2012 / Version 0.5</p>
   </div>
   <!--Scripts-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.countdown.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<!--Datepicker Scripts-->
	<script>
	$('#todatepicker').datepicker()
				.on('changeDate', function(ev){
						var startDate = new Date(ev.date);
						$('#countingto').text($('#todatepicker').data('date'));
						$('#todatepicker').datepicker('hide');
				var countingToDate = $("#countingto").clone().children().remove().end().text();
				$('#countdownto').countdown('destroy')
				$('#countdownto').countdown({until: new Date(countingToDate), format: 'wdHM'});
				//progressbar calculations
				var progressFromDate = Date.parse($('#countingfrom').text());
				var progressToDate = Date.parse($('#countingto').text())
				var todaysDate = new Date(); // Todays date
				var diffDaysRange = progressToDate - progressFromDate;
				var diffDaysPosition = Math.abs(todaysDate - progressFromDate);
				//progressbar rendering
				var progressBar = Math.abs(diffDaysPosition / diffDaysRange * 100 );
$("#progressbarcontainer").html("<div class='bar' style='width: "+progressBar+"%;'></div>");});
				
	</script>
	<script>
	$('#fromdatepicker').datepicker()
				.on('changeDate', function(ev){
						startDate = new Date(ev.date);
						$('#countingfrom').text($('#fromdatepicker').data('date'));
					$('#fromdatepicker').datepicker('hide');
				var countingFromDate = $("#countingfrom").clone().children().remove().end().text();
				$('#countdownfrom').countdown('destroy')
				$('#countdownfrom').countdown({since: new Date(countingFromDate), format: 'wdHM'});
				//progressbar calculations
				var progressFromDate = Date.parse($('#countingfrom').text());
				var progressToDate = Date.parse($('#countingto').text())
				var todaysDate = new Date(); // Todays date
				var diffDaysRange = progressToDate - progressFromDate;
				var diffDaysPosition = Math.abs(todaysDate - progressFromDate);
				//progressbar rendering
				var progressBar = Math.abs(diffDaysPosition / diffDaysRange * 100 );
$("#progressbarcontainer").html("<div class='bar' style='width: "+progressBar+"%;'></div>");});
 	</script>
	<!--Click-to-Edit Scripts-->
<script>
    (function($) {

        $.fn.inlineEdit = function(options) {
        
            // define some options with sensible default values
            // - hoverClass: the css classname for the hover style
            options = $.extend({
                hoverClass: 'hover'
            }, options);
        
            return $.each(this, function() {
        
                // define self container
                var self = $(this);
        
                // create a value property to keep track of current value
                self.value = self.text();
        
                // bind the click event to the current element, in this example it's span.editable
                self.bind('click', function() {

                    self
                        // populate current element with an input element and add the current value to it
                        .html('<input type="text" class="span1" value="'+ self.value +'">')		
                        // select this newly created input element
                        .find('input')
                            // bind the blur event and make it save back the value to the original span area
                            // there by replacing our dynamically generated input element
                            .bind('blur', function(event) {
                                self.value = $(this).val();
                                self.text(self.value);
								//var CountdownToTitle = self.value;
								//document.title = "Countdown to ".CountdownToTitle;
                            })
                            // give the newly created input element focus
                            .focus();
                            
                })
                // on hover add hoverClass, on rollout remove hoverClass
                .hover(
                    function(){
                        self.addClass(options.hoverClass);
                    },
                    function(){
                        self.removeClass(options.hoverClass);
                    }
                );
            });
        }
        
    })(jQuery);
        
    $(function(){
        $('.editable').inlineEdit();
    });

    </script>
  </body>
</html>