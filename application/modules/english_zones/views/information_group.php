
	<div class="topic"><img src="<?php echo topic("topic_prnews.png") ?>" width="200" height="25" alt="ข่าวประชาสัมพันธ์ ThaiGCD"/></div>
	<div class="clear"></div>
	<div id="data">
			<?php echo $informations->pagination(); ?>
			<?php foreach($informations as $information ): ?>
			<div class="box-tag"> 
				<a href="informations/view/<?php echo $information->id ?>" class="thumb"  <?php echo (pathinfo($information->pdf, PATHINFO_EXTENSION)=="pdf")?'target="_blank"':'' ?> ><img class="photo" src="<?php echo (is_file('uploads/information/thumbnail/'.$information->image))? 'uploads/information/thumbnail/'.$information->image : 'themes/thaigcd/photo/nophoto.gif' ?>" width="77" height="64" /></a>
				<div class="box_info box-tag-detail">
					<span><?php echo mysql_to_th($information->start_date)?></span>
					<a href="informations/view/<?php echo $information->id ?>"  <?php echo (pathinfo($information->pdf, PATHINFO_EXTENSION)=="pdf")?'target="_blank"':'' ?> ><h3><?php echo lang_decode($information->title) ?></h3></a>
					<p><?php echo lang_decode($information->intro) ?></p>
				</div>   
			</div>
			<div class="clear"></div>
			<?php endforeach; ?>
			<?php echo $informations->pagination(); ?>
	</div>
	<div class="paddbot10"></div>
