<?php
/**
 * Please see single-event.php in this directory for detailed instructions on how to use and modify these templates.
 *
 * Override this template in your own theme by creating a file at:
 *
 *     [your-theme]/tribe-events/month/tooltip.php
 * @version 4.6.21
 */
?>

<script type="text/html" id="tribe_tmpl_tooltip">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip">
		
		[[ if(imageTooltipSrc.length) { ]]
		<div class="tribe-events-event-thumb">
			<img src="[[=imageTooltipSrc]]" alt="[[=title]]" \/>
			<\/div>
			[[ } ]]
			
			<h6 class="entry-title summary">[[=raw title]]<\/h6>
				
				<div class="tribe-event-duration">
					<abbr class="tribe-events-abbr tribe-event-date-start">[[=startTime]] <\/abbr>
						<abbr class="tribe-events-abbr tribe-event-date-end">[[=endTime]] <\/abbr>
							<\/div>
							
							<span class="tribe-events-arrow"><\/span>
	
	<\/div>
</script>

<script type="text/html" id="tribe_tmpl_tooltip_featured">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip tribe-event-featured">
		
		<h6 class="entry-title summary">[[=raw title]]<\/h6>
			
			[[ if(imageTooltipSrc.length) { ]]
			<div class="tribe-events-event-thumb">
				<img src="[[=imageTooltipSrc]]" alt="[[=title]]" \/>
				<\/div>
				[[ } ]]
				
				<div class="tribe-event-duration">
					<abbr class="tribe-events-abbr tribe-event-date-start">[[=dateDisplay]] <\/abbr>
						<\/div>
						
						<span class="tribe-events-arrow"><\/span>
	<\/div>
</script>
