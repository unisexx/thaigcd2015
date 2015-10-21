<ul>
	<?php foreach ($menus as $menu):?>
		<li style="background:url(uploads/icon/<?php echo $menu->icon?>) no-repeat scroll left center transparent; padding-left:32px;"><a href="<?php echo $menu->url?>"><?php echo lang_decode($menu->title,'')?></a></li>
	<?php endforeach;?>
</ul>