<div id="boxphoto" class="corner" style="padding-bottom:10px;">
	<div class="topic"><img src="<?php echo topic("topic_gallery.png") ?>" width="200" height="25" /></div>
			<?php if(!isset($group->id)): ?>
				<form action="galleries" method="get">
				<p class="search">
				<span class="TxtGray4 B" >อัลบั้ม: </span>
				<input type="text" name="albumsearch" value="<?php echo @$_GET['albumsearch']?>">
				<span class="TxtGray4 B" >กลุ่มงาน: </span>
				<?php echo form_dropdown('groups',get_option('id','name','groups'),@$_GET['groups'],'class="group_ddl"','ทุกกลุ่มงาน');?>
				
				<input type="submit" value="ค้นหา">
				</p>
				</form>
			<?php endif; ?>
			
			<ul class="gallery">
				<?php foreach ($categories as $category):?>
				<li>
					<a href="galleries/view/<?php echo $category->id?>/<?php echo (isset($group->id))?$group->id:'' ?>"><span class="clip_image"></span><img src="uploads/galleries/thumbs/<?php echo $category->gallery->order_by("id", "desc")->get()->image?>" alt="image" title="<?php echo lang_decode($category->name,'')?>" class="imgtooltip" /></a>
                    <div class="txtgallery"><?php echo lang_decode($category->name,'')?> - <span><?php echo lang_decode($category->group->name) ?></span></div>
                    <div class="qtyphoto">
                    	<?php if($category->gallery->result_count() == "1"):?>
						(1 image)
						<?php else:?>
						(<?php echo $category->gallery->result_count()?> images)
						<?php endif;?>
					</div>
				</li>
				<?php echo alternator('','','<div class="clear"></div>') ?></php>
				<?php endforeach;?>
			</ul>
	<div class="clear"></div>
</div>