<h1>

	<a href="infograh/admin/infograh">ภาพถ่ายกิจกรรม</a> » 
	<a href="infograh/admin/infograh/form/<?php echo $rs->id; ?>">

		<?php echo $rs->title; ?>
		
	</a>
	
</h1>


<form class="form-horizontal" method="post" action="infograh/admin/infograh/save/<?php echo $rs->id; ?>" enctype="multipart/form-data">

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
	<tr>
		<th></th>
		<td>
		
		<button onclick="goBack()">กลับ</button>

		<script>
			function goBack() {
			    window.history.back();
			}
		</script>

		<input  type="submit" id="btn_save" name="btn_save" value="บันทึก"/>
			
		</td>
	</tr>
</table>

</form>