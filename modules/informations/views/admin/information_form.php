<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
	tiny('detail[th],detail[en]');
	$(function(){
			$("[rel=en]").hide();
			$(".lang a").click(function(){
				$("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
				$(this).addClass('active').siblings().removeClass('active');
				return false;
			})
	})
</script>
<h1>ข่าวประชาสัมพันธ์</h1>
<form action="informations/admin/informations/save/<?php echo $information->id ?>" method="post" >
	
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>

	<?php echo approver_dropdown($information);?>
	<?php echo approver_form($information);?>
	<tr><th></th><td><img class="img" style="width:77px; height:64px;" src="<?php echo ($information->image)? $information->image : 'media/images/dummy/77x64.gif' ?>"  /></td></tr>
	<tr><th>รูปภาพ :</th><td><input type="text" name="image" value="<?php echo $information->image ?>" /><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'images')" /></td></tr>
	<tr><th>หมวดหมู่ :</th><td><?php echo form_dropdown('category_id',$information->category->get_option(),$information->category_id,'');?></td></tr>
	<tr><th>เริ่ม :</th><td><input type="text" name="start_date" value="<?php echo $information->start_date?>" class="datepicker" /></td></tr>
	<tr><th>สิ้นสุด :</th><td><input type="text" name="end_date" value="<?php echo $information->end_date?>" class="datepicker" /></td></tr>
	<tr><th>file :</th><td><input type="text" name="pdf" value="<?php echo $information->pdf?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'pdf')" /></td></tr>
	<tr><th>แท็ก :</th><td><input type="text" name="tag" value="<?php echo $information->tag?>" /></td></tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title[th]" rel="th" value="<?php echo lang_decode($information->title,'th')?>" class="full" />
			<input type="text" name="title[en]" rel="en" value="<?php echo lang_decode($information->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>บทคัดย่อ :</th>
		<td>
			<textarea name="intro[th]" id="intro" class="full" rel="th"><?php echo lang_decode($information->intro,'th')?></textarea>
			<textarea name="intro[en]" id="intro" class="full" rel="en"><?php echo lang_decode($information->intro,'en')?></textarea>
		</td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<div rel="th"><textarea name="detail[th]" class="full tinymce"><?php echo lang_decode($information->detail,'th')?></textarea></div>
			<div rel="en"><textarea name="detail[en]" class="full tinymce"><?php echo lang_decode($information->detail,'en')?></textarea></div>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><input type="button" name="back" value="ย้อนกลับ" onclick="window.location = 'informations/admin/informations'" /></td></tr>
</table>
</form>