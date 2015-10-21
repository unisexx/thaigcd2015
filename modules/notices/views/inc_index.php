<div class="corner" id="boxnotice">
	<a class="moreright2" href="notices">more</a>
	<div class="topic"><img width="200" height="25" src="<?php echo topic("topic_notice.png") ?>"></div>
	<?php foreach($notices as $notice): ?>
	<div class="box <?php echo alternator('','alt')?>"> 
		<a class="thumb" href="notices/view/<?php echo $notice->id ?>"><img width="77" height="64" src="<?php echo ($notice->image)?$notice->image:'themes/thaigcd/photo/nophoto.gif' ?>"></a>
		<div class="box_info">
		<span><?php echo mysql_to_th($notice->start_date) ?></span>
		<a href="notices/view/<?php echo $notice->id ?>"><h3><?php echo lang_decode($notice->title) ?></h3></a>
		</div>   
	</div>
    <div class="clear"></div>
	<?php endforeach; ?>
</div>