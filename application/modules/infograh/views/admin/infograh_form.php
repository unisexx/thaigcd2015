
<h1>infographic</h1>

<form action="infograh/admin/infograh/save/0/<?php echo $rs->id ?>" method="post" enctype="multipart/form-data">

<table class="form">

	<?php if(is_file('uploads/infograh/image/'.$rs->image)): ?>
		<tr>
			<th></th>
			<td>
			<img src="uploads/infograh/image/<?php echo $rs->image?>" />
			</td>
		</tr>
	<?php endif; ?>
	<tr>
		<th>รูปภาพ :</th>
		<td>
		
		<input type="file" name="image">
			
		</td>
	</tr>
	
	<?php if(is_file('uploads/infograh/pdf/'.$rs->file_pdf)): ?>
		<tr>
			<th></th>
			<td>
			
			<a href="uploads/infograh/pdf/<?php echo $rs->file_pdf?>" target="_blank">
			
			<?php echo $rs->file_pdf?>
				
			</a>
			
			</td>
		</tr>
	<?php endif; ?>
	
	<tr>
		<th>File Download :</th>
		<td>
		
		<input type="file" name="file_pdf">
			
		</td>
	</tr>
	
	<tr>
		<th>หัวข้อ :</th>
		<td>

			<input type="text" name="title" id="title" value="<?php echo $rs->title?>">
			
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