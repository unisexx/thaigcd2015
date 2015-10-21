<div class="corner" id="boxknowledge">
	<div class="topic"><img width="200" height="25" src="<?php echo topic("topic_knowledge.png") ?>"></div>
	<div class="subtopic">ค้นหา 
		<form method="post">
			<input type="text" id="textfield" name="search" value="<?php echo @$_POST['search'] ?>">
			<input type="submit" class="btn_search2" value="Submit" id="button2" name="button2">
		</form>
	</div>
	<div id="data">
		
		<div class="groupname"><?php echo lang_decode($category->name) ?></div>
			<?php echo $category->knowledge->pagination() ?>
			<?php foreach($category->knowledge as $knowledge): ?>
			<div class="box"> 
				<a class="thumb" href="knowledges/view/<?php echo $knowledge->id ?>"><img width="77" height="64" src="<?php echo ($knowledge->image)? $knowledge->image : 'themes/thaigcd/photo/nophoto.gif' ?>"></a>
				<div class="box_info">
					<span><?php echo mysql_to_th($knowledge->start_date)?></span>
	                <a href="knowledges/view/<?php echo $knowledge->id ?>"><h3><?php echo lang_decode($knowledge->title) ?></h3></a>
	                <p><?php echo lang_decode($knowledge->intro) ?></p>
				</div>   
			</div>
			<div class="clear"></div>
			<?php endforeach; ?>
			<?php echo $category->knowledge->pagination() ?>
	</div><!--data-->
</div>