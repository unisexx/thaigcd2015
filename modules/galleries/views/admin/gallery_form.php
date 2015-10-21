<h1><a href="galleries/admin/categories">ภาพถ่ายกิจกรรม</a> >> <?php echo lang_decode($categories->name,'')?></h1>
<form action="galleries/admin/galleries/save/<?php echo $categories->id?>/<?php echo $galleries->id ?>" method="post" enctype="multipart/form-data" id="gallery_form">
<table class="form">
	<?php if(is_file('uploads/galleries/'.$galleries->image)): ?>
		<tr>
			<th></th>
			<td><img src="uploads/galleries/<?php echo $galleries->image?>" />
			</td>
		</tr>
	<?php endif; ?>
	<tr>
		<th>รูปภาพ :</th>
		<td><input type="file" name="image"></td>
	</tr>
	<tr>
		<th>ชื่อภาพ :</th>
		<td><input type="text" name="title" value="<?php echo $galleries->title?>"></td>
	</tr>
	<tr>
		<th>อัลบัม :</th>
		<td><input type="text" value="<?php echo lang_decode($categories->name,'')?>" disabled="true"><input type="hidden" name="category_id" value="<?php echo $categories->id?>"></td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
</table>
</form>