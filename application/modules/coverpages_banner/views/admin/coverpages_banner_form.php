
<h1>แบนเนอร์หน้าแรก</h1>

<form action="coverpages_banner/admin/coverpages_banner/save/0/<?php echo $rs->id ?>" method="post" enctype="multipart/form-data">

<table class="form">

	<?php if(is_file('uploads/coverpages_banner/'.$rs->image)): ?>
		<tr>
			<th></th>
			<td>
			<img src="uploads/coverpages_banner/<?php echo $rs->image?>" />
			</td>
		</tr>
	<?php endif; ?>
	<tr>
		<th>รูปภาพ :</th>
		<td>
		
		<input type="file" name="image">
			
		</td>
	</tr>
	
	
	<tr>
		<th>ชื่อ :</th>
		<td>

			<input type="text" name="name" id="name" value="<?php echo $rs->name?>">
			
		</td>
	</tr>
	
	<tr>
		<th>ลิงค์ :</th>
		<td>

			<input type="text" name="link" id="link" value="<?php echo $rs->link?>">
			*http://thaileptoclub.org
		</td>
	</tr>

	<tr><th></th>
	
	<td>
	
	<input type="submit" value="บันทึก">
	<?php echo form_back() ?>
		
		
	</td>
	
	</tr>
</table>
<?php echo form_referer() ?>
</form>