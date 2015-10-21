<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript" src="themes/gcdnew/js/jquery.validate.min.js"></script>
<script type="text/javascript">
	tiny('detail[th],detail[en]');
	$(function(){
			$("[rel=en]").hide();
			$(".lang a").click(function(){
				$("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
				$(this).addClass('active').siblings().removeClass('active');
				return false;
			})
			
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
<h1>กฎหมายที่เกี่ยวข้อง</h1>
<form id="frmMain" action="laws/admin/laws/save/<?php echo $law->id ?>" method="post" >
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<?php echo approver_dropdown($law);?>
	<?php echo approver_form($law);?>
	<tr><th>หมวดหมู่ :</th><td><?php echo form_dropdown('category_id',$law->category->get_option(),$law->category_id,'');?></td></tr>
	<tr><th>เริ่ม :</th><td><input type="text" name="start_date" value="<?php echo DB2Date(($law->start_date)?$law->start_date:date("Y-m-d"))?>" class="datepicker" /></td></tr>
	<tr><th>สิ้นสุด :</th><td><input type="text" name="end_date" value="<?php echo DB2Date($law->end_date)?>" class="datepicker" /></td></tr>
	<tr><th>แท็ก :</th><td><input type="text" name="tag" value="" /></td></tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title[th]" rel="th" value="<?php echo lang_decode($law->title,'th')?>" class="full" />
			<input type="text" name="title[en]" rel="en" value="<?php echo lang_decode($law->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>บทคัดย่อ :</th>
		<td>
			<textarea name="intro[th]" id="intro" class="full" rel="th"><?php echo lang_decode($law->intro,'th')?></textarea>
			<textarea name="intro[en]" id="intro" class="full" rel="en"><?php echo lang_decode($law->intro,'en')?></textarea>
		</td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<div rel="th"><textarea name="detail[th]" class="full tinymce"><?php echo lang_decode($law->detail,'th')?></textarea></div>
			<div rel="en"><textarea name="detail[en]" class="full tinymce"><?php echo lang_decode($law->detail,'en')?></textarea></div>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>