<div id="boxprnews" class="corner">
	<a href="informations" class="moreright" target="_self">more</a>
	<div class="topic"><img src="<?php echo topic("topic_prnews.png") ?>" width="200" height="25" alt="ข่าวประชาสัมพันธ์ ThaiGCD"/></div>
	<div class="clear"></div>
	<div id="tabs">
		<ul>
			<?php foreach($categories as $key => $category): ?>
			<li><a href="#tabs-<?php echo $key + 1?>" target="_self"><?php echo lang_decode($category->name)?></a></li>
			<?php endforeach; ?>
		</ul>
		<?php foreach($categories as $key => $category): ?>
		<div id="tabs-<?php echo $key + 1?>">
			<?php foreach(lang_filter($category->information->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'"))->order_by('stick desc, start_date desc, id desc')->limit(5)->get() as $information ): ?>
			<div class="box <?php echo alternator('','alt')?>"> 
				<a href="informations/view/<?php echo $information->id ?>" class="thumb" <?php echo (pathinfo($information->pdf, PATHINFO_EXTENSION)=="pdf")?'target="_blank"':'target="_self"' ?> ><img src="<?php echo (is_file('uploads/information/thumbnail/'.$information->image))? 'uploads/information/thumbnail/'.$information->image : 'themes/thaigcd/photo/nophoto.gif' ?>" width="77" height="64" alt="<?=lang_decode($information->title)?>" /></a>
				<div class="box_info">
					<!--					<span><?php echo mysql_to_th($information->start_date)?> - <?php echo ($information->group_id)?lang_decode($information->group->name):lang_decode($information->user->group->name) ?> (<?=@$information->user->profile->agency->name?>)</span>-->
				 	<span><?php echo mysql_to_th($information->start_date)?></span>
					<a href="informations/view/<?php echo $information->id ?>"  <?php echo (pathinfo($information->pdf, PATHINFO_EXTENSION)=="pdf")?'target="_blank"':'target="_self"' ?> ><h3><?php echo lang_decode($information->title) ?> <?php echo icon_file($information->pdf) ?> <?php echo icon_new($information) ?></h3></a>
					<p><?php echo lang_decode($information->intro) ?></p>
				</div>
				<?php echo ($information->stick==1)?'<img src="media/images/pin.png" alt="บทความปักหมุด" class="pin" />':'' ?>
			</div>
			<div class="clear"></div>
			<?php endforeach; ?>
		</div>
		<?php endforeach; ?>
	</div><!--tabs-->
	<div class="paddbot10"></div>
</div><!--boxprnews-->