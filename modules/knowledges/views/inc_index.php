<div id="boxknow" class="corner TxtGray3 B">
	<a href="knowledges" class="moreleft">more</a>
	<div class="topic"><img src="<?php echo topic("topic_know.png") ?>" width="200" height="25" alt="ความรู้วิชาการ" /></div>
	<?php foreach($categories as $key => $category): ?>
	<?php if($key==0): ?>
	<div style="float:left; width: 50%;">
		<ul class="paddleft15">
	<?php endif; ?>
			<li><a href="knowledges/<?php echo $category->id?>"><?php echo lang_decode($category->name) ?></a></li>
	<?php if($key==$num-1): ?>
		</ul>
	</div>
	<div style="float:left; width: 50%;">
		<ul>
	<?php endif; ?>
	<?php endforeach; ?>
		</ul>
	</div>
	<div class="clear"></div>
</div><!--boxknow-->