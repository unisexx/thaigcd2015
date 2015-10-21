<div id="boxheadpic" class="corner">	

	<img src="<?php echo $group->image ?>" />
	
</div><!--boxheadpic-->

<div class="paddtop20bot20"></div>

<div id="boxprnews" class="corner">
	
	<a class="moreright" href="groups/view/<?php echo $group->id ?>">more</a>
	<div class="topic"><img src="themes/gcdnew/images/topic_group<?php echo $group->id ?>.jpg"  alt="<?php echo lang_decode($group->name) ?>"/></div>
	<div class="info">
		<?php echo lang_decode($group->intro) ?>
	</div>
	
</div>