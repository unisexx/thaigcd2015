<ul>
	<?php foreach ($menus as $menu):?>
		<li style="background:url(uploads/icon/<?php echo $menu->icon?>) no-repeat scroll left center transparent !important; padding-left:32px;"><a href="<?php echo $menu->url?>" target="_self"><?php echo lang_decode($menu->title,'')?></a></li>
	<?php endforeach;?>
</ul>