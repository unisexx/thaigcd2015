
	<div class="topic"><img src="<?php echo topic("topic_knowledge.png") ?>" height="25" width="200"></div>
	<div class="clear"></div>
	
	<div id="data">
		<h2 style="color:#006600;">ค้นหาจาก tag : <?php echo $tag ?></h2>
			<?php echo $knowledges->pagination(); ?>
			<?php foreach($knowledges as $knowledge ): ?>
			<div class="box-tag"> 
				<a href="knowledges/view/<?php echo $knowledge->id ?>" class="thumb"><img class="photo" src="<?php echo (is_file('uploads/knowledge/thumbnail/'.$knowledge->image))? 'uploads/knowledge/thumbnail/'.$knowledge->image : 'themes/thaigcd/photo/nophoto.gif' ?>" width="77" height="64" /></a>
				<div class="box_info box-tag-detail">
					<span><?php echo mysql_to_th($knowledge->start_date)?></span>
					<a href="knowledges/view/<?php echo $knowledge->id ?>"><h3 style="color:#006600;"><?php echo lang_decode($knowledge->title) ?></h3></a>
					<p><?php echo lang_decode($knowledge->intro) ?></p>
				</div>   
			</div>
			<div class="clear"></div>
			<?php endforeach; ?>
			<?php echo $knowledges->pagination(); ?>
	</div>
	<div class="paddbot10"></div>
