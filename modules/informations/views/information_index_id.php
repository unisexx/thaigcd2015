<div id="boxprnews" class="corner">
	<div class="topic"><img src="<?php echo topic("topic_prnews.png") ?>" width="200" height="25" alt="ข่าวประชาสัมพันธ์ ThaiGCD"/></div>
	<div class="clear"></div>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1"><?php echo lang_decode($category->name)?></a></li>
		</ul>
	
		<div id="tabs-1">
			<?php echo $category->information->pagination(); ?>
			<?php foreach($category->information as $information ): ?>
			<div class="box"> 
				<a href="informations/view/<?php echo $information->id ?>" class="thumb"><img src="<?php echo ($information->image)? $information->image : 'themes/thaigcd/photo/nophoto.gif' ?>" width="77" height="64" /></a>
				<div class="box_info">
					<span><?php echo mysql_to_th($information->start_date)?></span>
					<a href="informations/view/<?php echo $information->id ?>"><h3><?php echo lang_decode($information->title,'th') ?></h3></a>
					<p><?php echo lang_decode($information->intro,'th') ?></p>
				</div>   
			</div>
			<div class="clear"></div>
			<?php endforeach; ?>
			<?php echo $category->information->pagination(); ?>
		</div>

	</div><!--tabs-->
	<div class="paddbot10"></div>
</div><!--boxprnews-->