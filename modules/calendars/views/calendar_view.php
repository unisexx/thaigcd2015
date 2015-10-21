
	<div class="topic"><img src="themes/thaigcd/images/topic_calendar.png" /></div>
	<div id="data">
		<h2><?php echo $calendar->title?><br /> <span class="f10 TxtGray2">ประเภท: <?php echo $type ?> เริ่ม <?php echo mysql_to_th($calendar->start) ?> ถึง  <?php echo mysql_to_th($calendar->end) ?> - <?php echo $calendar->counter ?> ครั้ง</span> </h2>
		<?php echo $calendar->detail ?>
    </div><!--data-->
