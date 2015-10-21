<div id="boxnotice" class="corner">
	<a href="#" class="moreright2">more</a>
	<div class="topic"><img src="themes/thaigcd/images/topic_notice.png" width="200" height="25" /></div>
	<?php foreach($articles as $article): ?>
	<div class="box"> 
		<a href="#" class="thumb"><img src="themes/thaigcd/photo/thumb1.jpg" width="77" height="64" /></a>
		<div class="box_info">
			<span><?php mysql_to_th($article->created) ?></span>
			<a href="#"><h3><?php echo $article->title ?></h3></a>
		</div>   
	</div>
	<div class="clear"></div>
	<?php endforeach; ?>
</div><!--boxnotice-->