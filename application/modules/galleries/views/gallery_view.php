<div id="boxphoto" class="corner">
	<div class="topic"><img src="<?php echo topic("topic_gallery.png") ?>" width="200" height="25" /></div>
				
				<!--<form action="galleries/view/<?php echo $catagory_id?>" method="post">
				<span class="TxtGray4 B" style="padding:0 15px;">ค้นหาจาก :</span>
				<input type="text" name="textsearch" value="<?php echo @$_POST['textsearch']?>">
				<?php //echo form_dropdown('groups',get_option('id','name','groups'),@$_POST['groups'],'','ทุกกลุ่มงาน');?>
				<input type="submit" value="submit">
				</form>-->
				
			<ul class="gallery">
				<?php foreach ($galleries as $gallery):?>
				<li>
					<a rel="lightbox[gallery]" href="uploads/galleries/<?php echo $gallery->image?>">
						<?=thumb("uploads/galleries/".$gallery->image,170,120,0)?>
						<!-- <img src="uploads/galleries/<?php echo $gallery->image?>"   width="170" height="120" <?php echo ($gallery->title)?'title="'.$gallery->title.'" class="imgtooltip"':''?>  <?php echo ($gallery->title)?'alt="'.lang_decode($gallery->category->name).':'.$gallery->title.'"':''?> /> -->
					</a>
                    <div class="txtgallery"><?php echo $gallery->title?></div>
				</li>
				<?php endforeach;?>
			</ul>
	<div class="clear"></div>
	<?php echo $galleries->pagination()?>
</div>