<!-- Calendar -->
			<link rel='stylesheet' type='text/css' href='media/js/fullcalendar-1.4.3/redmond/theme.css' />
			<link rel='stylesheet' type='text/css' href='media/js/fullcalendar-1.4.3/fullcalendar-my.css' />
			<script type='text/javascript' src='media/js/fullcalendar-1.4.3/fullcalendar.js'></script>
			<script type='text/javascript' src='media/js/ui.core.js'></script>
			<script type='text/javascript' src='media/js/ui.draggable.js'></script>
			<script type='text/javascript' src='media/js/ui.resizable.js'></script>
<!-- !Calendar -->
<script type="text/javascript">
	$(function(){	
		$.fullCalendar.parseDate( 'a' );		
		$('#calendar').fullCalendar({
			header: {
						left: 'today',
						center: 'title',
						right: 'prev,next'
					},
			theme: true,
			editable: true,
			disableDragging : true,
			disableResizing : true,
			eventClick: function(event){
			window.location = '<?php echo base_url()?>calendars/view/' + event.id + '/<?php echo $id ?>';
					},
					events: "<?php echo base_url()?>calendars/events/<?php echo $id ?><?php echo @$_GET['group_id'] ?>",
					loading: function(bool) {
					if (bool) $('#loading').show();
						else $('#loading').hide();
					}
				});
            });
        </script>

<div class="topic"><img class="topic_carendar" src="themes/thaigcd/images/topic_calendar.png" /></div>

<div id="data">
<form method="get">
<p class="search">
	<label>กลุ่มงาน : </label> 
	<?php echo form_dropdown('group_id',get_option('id','name','groups','','th'),@$_GET['group_id'],'','กรุณาเลือกกลุ่มงาน') ?> 
	<input type="submit" value="ค้นหา" />
</p>
</form>
<div style="clear:left;display:inline-block;width:100%">
		<div style="height:30px;">&nbsp;
		<div id='loading' style='display:none;text-align:center;'><img src="images/etc/ajax-loader.gif" /></div>
	</div>
	<div id='calendar'></div>
	<div style="clear:both;"></div></div>
</div>
