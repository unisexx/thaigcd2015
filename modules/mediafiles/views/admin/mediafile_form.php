<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<h1>สื่อมัลติมีเดีย</h1>
<form action="mediafiles/admin/mediafiles/save/<?php echo $mediafiles->id?>" method="post" enctype="multipart/form-data">
<table class="form">
	<?php if(is_file('uploads/mediafiles/'.$mediafiles->image)): ?>
		<tr>
			<th></th>
			<td><img style="max-height:90px; max-wide:120px;" src="uploads/mediafiles/<?php echo $mediafiles->image?>" />
			</td>
		</tr>
	<?php endif; ?>
	<tr>
		<th>รูปภาพ :</th>
		<td><?php echo form_upload('image')?> (Image Size:77 x 64 px)</td>
	</tr>
	<tr>
		<th>หัวข้อ :</th>
		<td><?php echo form_input('title',$mediafiles->title)?></td>
	</tr>
	<tr>
		<th>ไฟล์อัพโหลด :</th>
		<td><input type="text" name="file" value="<?php echo $mediafiles->file?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'mediafiles')" /> (max of size 50 mb : mp3,mp4,flv)</td>
	</tr>
	<tr>
		<th>Embed :</th>
		<td><textarea name="embed" class="full"><?php echo $mediafiles->embed?></textarea></td>
	</tr>
	<tr>
		<th>ประเภท :</th>
		<td><?php echo form_dropdown('category_id',$mediafiles->category->get_option(),$mediafiles->category_id,'');?></td></tr>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
</table>
</form>