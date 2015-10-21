<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript" src="themes/gcdnew/js/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(function(){
			
			$("#frmMain").validate({
				rules: 
				{
					"title[th]": 
					{ 
							required: true
					}
				},
				messages:
				{
					"title[th]": 
					{ 
							required: "กรุณากรอกหัวข้อค่ะ"
					}
				}
			});		
	})
</script>

<h1>English Zone</h1>
<form id="frmMain" action="english_zones/admin/english_zones/save/<?php echo $english_zone->id?>" method="post" enctype="multipart/form-data">
<table class="form">
	<?php echo approver_dropdown($english_zone);?>
	<?php echo approver_form($english_zone);?>
	<tr>
		<th>ไฟล์แนบ :</th>
		<td><input type="text" name="file" value="<?php echo $english_zone->file?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'english_zones')" /></td>
	</tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input rel="th" type="text" name="title" class="full" value="<?php echo $english_zone->title?>">
		</td>
	</tr>
	
	<tr><th></th><td><input type="submit" value="บันทึก"><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>