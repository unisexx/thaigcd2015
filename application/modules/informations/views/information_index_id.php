<div id="boxprnews" class="corner">
	<div class="topic"><img src="<?php echo topic("topic_prnews.png") ?>" width="200" height="25" alt="ข่าวประชาสัมพันธ์ ThaiGCD"/></div>
	<div class="clear"></div>
	<form method="get">
		<p class="search" style="margin:5px 10px;">
		<label>หัวข้อ : </label> 
		<input type="text" name="search" value="<?php echo @$_GET['search'] ?>" /> 
		<label>วันที่ : </label> 
		<input class="datepicker" type="text" name="start_date" value="<?php echo @$_GET['start_date'] ?>" />
		<input type="submit" value="ค้นหา" />
		</p>
	</form>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1"><?php echo lang_decode($category->name)?></a></li>
		</ul>
	
		<div id="tabs-1">
			<?php echo $category->information->pagination(); ?>
			<?php foreach($category->information as $information ): ?>
			<div class="box"> 
				<a href="informations/view/<?php echo $information->id ?>" class="thumb"  <?php echo (pathinfo($information->pdf, PATHINFO_EXTENSION)=="pdf")?'target="_blank"':'' ?> ><img src="<?php echo (is_file('uploads/information/thumbnail/'.$information->image))? 'uploads/information/thumbnail/'.$information->image : 'themes/thaigcd/photo/nophoto.gif' ?>" width="77" height="64" /></a>
				<div class="box_info">
					<span><?php echo mysql_to_th($information->start_date)?> - <?php echo ($information->group_id)?lang_decode($information->group->name):lang_decode($information->user->group->name) ?> (<?=@$information->user->profile->agency->name?>)</span>
					<a href="informations/view/<?php echo $information->id ?>"  <?php echo (pathinfo($information->pdf, PATHINFO_EXTENSION)=="pdf")?'target="_blank"':'' ?> ><h3><?php echo lang_decode($information->title) ?> <?php echo icon_file($information->pdf) ?> <?php echo icon_new($information) ?></h3></a>
					<p><?php echo lang_decode($information->intro) ?></p>
				</div>   
			</div>
			<div class="clear"></div>
			<?php endforeach; ?>
			<?php echo $category->information->pagination(); ?>
		</div>
	</div><!--tabs-->
	<div class="paddbot10"></div>
</div><!--boxprnews-->