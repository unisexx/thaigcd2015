
<h1>ประเภทตัวชี้วัด</h1>

<form action="indicators_types/admin/indicators_types/save/0/<?php echo $rs->id ?>" method="post" enctype="multipart/form-data">

<table class="form">
	

			
	<tr>
		<th>ชือประเภท :</th>
		<td>

			<input type="text" name="name" id="name" value="<?php echo $rs->name?>">
			
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