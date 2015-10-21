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
<h1>ไฮไลท์</h1>
<form action="hilights/admin/hilights/save/<?php echo $hilight->id ?>" method="post" >
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<?php echo approver_dropdown($hilight);?>
	<?php echo approver_form($hilight);?>
	<tr><th></th><td><img class="img" style="width:656px; height:253px;" src="<?php echo ($hilight->image)? $hilight->image : 'media/images/dummy/656x253.gif' ?>"  /></td></tr>
	<tr><th>รูปภาพ :</th><td><input type="text" name="image" value="<?php echo $hilight->image ?>" /><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'images')" /></td></tr>
	<tr><th>เริ่ม :</th><td><input type="text" name="start_date" value="<?php echo $hilight->start_date?>" class="datepicker" /></td></tr>
	<tr><th>สิ้นสุด :</th><td><input type="text" name="end_date" value="<?php echo $hilight->end_date?>" class="datepicker" /></td></tr>
	<tr><th>แท็ก :</th><td><input type="text" name="tag" value="<?php echo $hilight->tag?>" /></td></tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title[th]" rel="th" value="<?php echo lang_decode($hilight->title,'th')?>" class="full" />
			<input type="text" name="title[en]" rel="en" value="<?php echo lang_decode($hilight->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<div rel="th"><textarea name="detail[th]" class="full tinymce"><?php echo lang_decode($hilight->detail,'th')?></textarea></div>
			<div rel="en"><textarea name="detail[en]" class="full tinymce"><?php echo lang_decode($hilight->detail,'en')?></textarea></div>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><input type="button" name="back" value="ย้อนกลับ" onclick="window.location = 'hilights/admin/hilights'" /></td></tr>
</table>
</form>