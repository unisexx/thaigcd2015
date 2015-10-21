<div class="corner" id="boxlaw">
	<a class="moreright" href="laws">more</a>
	<div class="topic"><img height="25" width="200" src="<?php echo topic("topic_law.png") ?>"></div>
	<div id="tabs2">
		<ul>
			<?php foreach($categories as $key => $category): ?>
			<li class="ui-state-default ui-corner-top"><a href="#tabs2-<?php echo $key ?>"><?php echo lang_decode($category->name,'') ?></a></li>
			<?php endforeach;?>
		</ul>
		<?php foreach($categories as $key => $category): ?>
		<div id="tabs2-<?php echo $key ?>">
			<?php foreach($category->law->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'")->limit(2)->get() as $key => $law): ?>
			<?php if($law->category_id ==11): ?><h3><?php echo lang_decode($law->title) ?></h3>
			<?php echo lang_decode($law->detail) ?>
			<?php else: ?>
			<a href="laws/view/<?php echo $law->id ?>"><h3><?php echo lang_decode($law->title) ?></h3></a>
			<?php endif; ?>
			<div class="clear"></div>
			<?php endforeach;?>
		</div>
		<?php endforeach;?>
	</div>
</div>
