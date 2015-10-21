<?php foreach($informations as $information ): ?>
	<div class="box <?php echo alternator('','alt')?>"> 
		<a href="informations/view/<?php echo $information->id ?>/1" class="thumb"><img src="<?php echo ($information->image)? $information->image : 'themes/thaigcd/photo/nophoto.gif' ?>" width="77" height="64" /></a>
		<div class="box_info">
			<span><?php echo mysql_to_th($information->start_date)?></span>
			<a href="informations/view/<?php echo $information->id ?>/1"><h3><?php echo lang_decode($information->title) ?></h3></a>
			<p><?php echo lang_decode($information->intro) ?></p>
		</div>   
	</div>
	<div class="clear"></div>
<?php endforeach; ?>
<div class="paddtop20bot20"><span></span></div>
<a href="informations/group/<?php echo $group->id ?>" class="more-rb">more</a>