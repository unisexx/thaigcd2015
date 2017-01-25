
<h1>รายงานประจำปี</h1>

<form action="yearbook/admin/yearbook/save/0/<?php echo $rs->id ?>" method="post" enctype="multipart/form-data">

<table class="form">
	
	<?php if(is_file('uploads/yearbook/'.$rs->files)): ?>
		<tr>
			<th></th>
			<td>
			
			<a href="uploads/yearbook/<?php echo $rs->files?>" target="_blank">
			
			<?php echo icon_file($rs->files); echo $rs->files?>
				
			</a>
			
			</td>
		</tr>
	<?php endif; ?>
	
	<tr>
		<th>File Download :</th>
		<td>
		
		<input type="file" name="files">
			
		</td>
	</tr>
	<tr>
		<th>ประจำปี :</th>
		<td>

			<input type="text" name="yearbook_year" id="yearbook_year" value="<?php echo $rs->yearbook_year?>">
			
		</td>
	</tr>
			
	<tr>
		<th>หัวข้อ :</th>
		<td>

			<input type="text" name="title" id="title" value="<?php echo $rs->title?>">
			
		</td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>

			<textarea id="detail" name="detail"><?php echo $rs->detail?></textarea>
			<script type="text/javascript" src="media/ckeditor/ckeditor.js"></script>
            <script type="text/javascript" src="media/cke_config.js"></script>		
            <script type="text/javascript">
			
            var editorObj=CKEDITOR.replace( 'detail',cke_config); 
		
            </script>			
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