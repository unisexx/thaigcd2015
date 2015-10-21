<?php if(is_file('uploads/group/'.$group->image)): ?>
<div id="boxheadpic" class="corner">	

	<img src="uploads/group/<?php echo $group->image ?>" />
	
</div><!--boxheadpic-->

<div class="paddtop20bot20"></div>
<?php endif; ?>
<div id="boxprnews" class="corner">
	
	<a class="moreright" href="groups/view/<?php echo $group->id ?>">more</a>
	<div class="topic cufon"><span style="color:#CC0000;">แนะนำ</span> <?php echo lang_decode($group->name) ?></div>
	<div class="info">
		<?php echo lang_decode($group->intro) ?>
	</div>
	
</div>