
	<div class="topic"><img class="topic_carendar" src="themes/thaigcd/images/topic_calendar.png" /></div>
	<div id="data">
		<h2><?php echo $calendar->title?> <?php echo ($calendar->group_id)?' - '.lang_decode($calendar->group->name):'' ?><br /> <span class="f10 TxtGray2">ประเภท: <?php echo $type ?> เริ่ม <?php echo mysql_to_th($calendar->start) ?> ถึง  <?php echo mysql_to_th($calendar->end) ?> - <?php echo $calendar->counter ?> ครั้ง</span> </h2>
		<?php echo $calendar->detail ?>
    </div><!--data-->
