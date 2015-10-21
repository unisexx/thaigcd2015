<div id="boxprnews" class="corner">
	<div class="topic"><img src="themes/thaigcd/images/topic_prnews.png" width="200" height="25" alt="ข่าวประชาสัมพันธ์ ThaiGCD"/></div>
	<div class="clear"></div>
	<div id="tabs">
		<ul>
			<?php foreach($categories as $key => $category): ?>
			<li><a href="#tabs-<?php echo $key + 1?>"><?php echo $category->name?></a></li>
			<?php endforeach; ?>
		</ul>
		<?php foreach($categories as $key => $category): ?>
		<div id="tabs-<?php echo $key + 1?>">
			<?php foreach($category->article->get_page(5) as $article ): ?>
			<div class="box"> 
				<a href="articles/view/<?php echo $article->id ?>" class="thumb"><img src="themes/thaigcd/photo/thumb1.jpg" width="77" height="64" /></a>
				<div class="box_info">
					<span>02/06/2553</span>
					<a href="articles/view/<?php echo $article->id ?>"><h3><?php echo lang_get($article->title,'th') ?></h3></a>
					<p><?php echo lang_get($article->intro,'th') ?></p>
				</div>   
			</div>
			<div class="clear"></div>
			<?php endforeach; ?>
			<?php echo $category->article->pagination(); ?>
		</div>
		<?php endforeach; ?>
	</div><!--tabs-->
	<div class="paddbot10"></div>
</div><!--boxprnews-->