<div id="boxprnews" class="corner">
	<a href="articles/2" class="moreright">more</a>
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
			<?php foreach($category->article->order_by('id','desc')->limit(5)->get() as $article ): ?>
			<div class="box"> 
				<a href="#" class="thumb"><img src="themes/thaigcd/photo/thumb1.jpg" width="77" height="64" /></a>
				<div class="box_info">
					<span><?php echo mysql_to_th($article->created)?></span>
					<a href="#"><h3><?php echo lang_get($article->title,'th') ?></h3></a>
					<p><?php echo lang_get($article->intro,'th') ?></p>
				</div>   
			</div>
			<div class="clear"></div>
			<?php endforeach; ?>
		</div>
		<?php endforeach; ?>
	</div><!--tabs-->
	<div class="paddbot10"></div>
</div><!--boxprnews-->
<?php echo "xxx"; ?>
