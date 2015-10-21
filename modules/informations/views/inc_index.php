<div id="boxprnews" class="corner">
	<a href="informations" class="moreright">more</a>
	<div class="topic"><img src="<?php echo topic("topic_prnews.png") ?>" width="200" height="25" alt="ข่าวประชาสัมพันธ์ ThaiGCD"/></div>
	<div class="clear"></div>
	<div id="tabs">
		<ul>
			<?php foreach($categories as $key => $category): ?>
			<li><a href="#tabs-<?php echo $key + 1?>"><?php echo lang_decode($category->name)?></a></li>
			<?php endforeach; ?>
		</ul>
		<?php foreach($categories as $key => $category): ?>
		<div id="tabs-<?php echo $key + 1?>">
			<?php foreach(lang_filter($category->information->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'"))->order_by('id','desc')->limit(5)->get() as $information ): ?>
			<div class="box <?php echo alternator('','alt')?>"> 
				<a href="informations/view/<?php echo $information->id ?>" class="thumb"><img src="<?php echo ($information->image)? $information->image : 'themes/thaigcd/photo/nophoto.gif' ?>" width="77" height="64" /></a>
				<div class="box_info">
					<span><?php echo mysql_to_th($information->start_date)?> - <?php echo ($information->group_id)?lang_decode($information->group->name):lang_decode($information->user->group->name) ?></span>
					<a href="informations/view/<?php echo $information->id ?>"><h3><?php echo lang_decode($information->title) ?> <?php echo icon_file($information->pdf) ?> <?php echo icon_new($information) ?></h3></a>
					<p><?php echo lang_decode($information->intro) ?></p>
				</div>   
			</div>
			<div class="clear"></div>
			<?php endforeach; ?>
		</div>
		<?php endforeach; ?>
	</div><!--tabs-->
	<div class="paddbot10"></div>
</div><!--boxprnews-->