<div id="boxphoto" class="corner">
	<div class="topic"><img src="<?php echo topic("topic_gallery.png") ?>" width="200" height="25" /></div>
				<?php if(!isset($group->id)): ?>
				<form action="galleries" method="post">
				<span class="TxtGray4 B" style="padding:0 15px;">ค้นหาจาก :</span>
				<!--<?php echo form_dropdown('category_id',$galleries->category->get_option(),@$_POST['category_id'],'','ทุกอัลบัม');?>-->
				<?php echo form_dropdown('groups',get_option('id','name','groups'),@$_POST['groups'],'','ทุกกลุ่มงาน');?>
				<input type="text" name="albumsearch" value="<?php echo @$_POST['albumsearch']?>">
				<input type="submit" value="submit">
				</form>
				<?php endif; ?>
			<ul class="gallery">
				<?php foreach ($categories as $category):?>
				<li>
					<a href="galleries/view/<?php echo $category->id?>/<?php echo (isset($group->id))?$group->id:'' ?>"><span></span><img src="uploads/galleries/thumbs/<?php echo $category->gallery->order_by("id", "desc")->get()->image?>" alt="image" title="<?php echo lang_decode($category->name,'')?>" class="imgtooltip" /></a>
                    <div class="txtgallery"><?php echo lang_decode($category->name,'')?> </div>
                    <div class="qtyphoto">
                    	<?php if($category->gallery->result_count() == "1"):?>
						(1 image)
						<?php else:?>
						(<?php echo $category->gallery->result_count()?> images)
						<?php endif;?>
					</div>
				</li>
				<?php endforeach;?>
			</ul>
	<div class="clear"></div>
</div>