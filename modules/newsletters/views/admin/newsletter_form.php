<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
	tiny('detail');
</script>

<h1>แจ้งข่าวสารทางอีเมล์</h1>
<form action="newsletters/admin/newsletters/save/<?php echo $newsletters->id?>" method="post" enctype="multipart/form-data">
<table class="form">
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input rel="th" type="text" name="title" class="full" value="<?php echo $newsletters->title?>">
		</td>
	</tr>
	<tr>
		<th>ไฟล์แนบ :</th>
		<td><input class="full" type="text" name="attachment" value="<?php echo $newsletters->attachment?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'newsletter_attachment')" /></td>
	</tr>
	<tr>
		<th>เนื้อหา :</th>
		<td>
			<textarea rel="th" name="detail" class="full"><?php echo $newsletters->detail?></textarea>
		</td>
	</tr>
	<tr>
		<th>ประเภทข่าว :</th>
		<td><?php echo form_dropdown('category_id',$newsletters->category->get_option(),$newsletters->category_id,'');?></td></tr>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
</table>
</form>