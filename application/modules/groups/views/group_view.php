<?php if(is_file('uploads/group/'.$group->image)): ?><img src="uploads/group/<?php echo $group->image ?>" /><?php endif; ?>

<div class="topic cufon"><span style="color:#CC0000;">แนะนำ</span> <?php echo lang_decode($group->name) ?></div>
<div id="data">
	<?php echo lang_decode($group->aboutus) ?>
</div>