<?php foreach($notices as $notice ): ?>
	<div class="box <?php echo alternator('','alt')?>"> 
		<a href="notices/view/<?php echo $notice->id ?>" class="thumb"><img src="<?php echo (is_file('uploads/notice/thumbnail/'.$notice->image))?'uploads/notice/thumbnail/'.$notice->image : 'themes/thaigcd/photo/nophoto.gif' ?>" width="77" height="64" /></a>
		<div class="box_info">
			<span><?php echo mysql_to_th($notice->start_date)?></span>
			<a href="notices/view/<?php echo $notice->id ?>"><h3><?php echo lang_decode($notice->title) ?></h3></a>
		</div>   
	</div>
	<div class="clear"></div>
<?php endforeach; ?>