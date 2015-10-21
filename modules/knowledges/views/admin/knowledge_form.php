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
<h1>ความรู้วิชาการ</h1>
<form action="knowledges/admin/knowledges/save/<?php echo $knowledge->id ?>" method="post" >
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<?php echo approver_dropdown($knowledge);?>
	<?php echo approver_form($knowledge);?>
	<tr><th></th><td><img class="img" style="width:77px; height:64px;" src="<?php echo ($knowledge->image)? $knowledge->image : 'themes/thaigcd/photo/nophoto.gif' ?>"  /></td></tr>
	<tr><th>รูปภาพ :</th><td><input type="text" name="image" value="<?php echo $knowledge->image ?>" /><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'images')" />[77 x 64 px]</td></tr>
	<tr><th>หมวดหมู่ :</th><td><?php echo form_dropdown('category_id',$knowledge->category->get_option(),$knowledge->category_id,'');?></td></tr>
	<tr><th>เริ่ม :</th><td><input type="text" name="start_date" value="<?php echo $knowledge->start_date?>" class="datepicker" /></td></tr>
	<tr><th>สิ้นสุด :</th><td><input type="text" name="end_date" value="<?php echo $knowledge->end_date?>" class="datepicker" /></td></tr>
	<tr><th>แท็ก :</th><td><input type="text" name="tag" value="<?php echo $knowledge->tag?>" /></td></tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title[th]" rel="th" value="<?php echo lang_decode($knowledge->title,'th')?>" class="full" />
			<input type="text" name="title[en]" rel="en" value="<?php echo lang_decode($knowledge->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>บทคัดย่อ :</th>
		<td>
			<textarea name="intro[th]" id="intro" class="full" rel="th"><?php echo lang_decode($knowledge->intro,'th')?></textarea>
			<textarea name="intro[en]" id="intro" class="full" rel="en"><?php echo lang_decode($knowledge->intro,'en')?></textarea>
		</td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<div rel="th"><textarea name="detail[th]" class="full tinymce"><?php echo lang_decode($knowledge->detail,'th')?></textarea></div>
			<div rel="en"><textarea name="detail[en]" class="full tinymce"><?php echo lang_decode($knowledge->detail,'en')?></textarea></div>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
</table>
</form>