	<div class="topic"><img src="<?php echo topic("topic_law.png") ?>" width="200" height="25" /></div>
	<div id="data">
		<h2><?php echo lang_decode($law->title)?> <span class="f10 TxtGray2"><?php echo mysql_to_th($law->start_date) ?> - <?php echo $law->counter ?> ครั้ง</span> </h2>
		<?php echo lang_decode($law->detail) ?>
		<div class="ref"><strong>Credit by </strong> <span><?php echo $law->user->profile->first_name.' '.$law->user->profile->last_name.' '.$law->user->profile->position?></span></div>     
		<?php if($law->tag): ?><div class="tag"><strong>TAG :</strong> <span><?php echo tag_decode($law->tag) ?></span></div><?php endif; ?>
    </div><!--data-->
