<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
	$(function(){
			$("[rel=en]").hide();
			$(".lang a").click(function(){
				$("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
				$(this).addClass('active').siblings().removeClass('active');
				return false;
			})
	})
</script>

<h1>สื่อเผยแพร่</h1>
<form action="mediapublics/admin/mediapublics/save/<?php echo $mediapublics->id?>" method="post" enctype="multipart/form-data">
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<tr>
		<th></th>
		<td><img class="img" style="max-height:90px; max-wide:120px;" src="<?php echo ($mediapublics->image)? $mediapublics->image : 'themes/thaigcd/photo/nophoto.gif' ?>"  /></td></tr>
	<tr>
		<th>รูปภาพ :</th>
		<td><input type="text" name="image" value="<?php echo $mediapublics->image?>" /><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'mediapublics_image')" /></td>
	</tr>
	<tr>
		<th>ไฟล์แนบ :</th>
		<td><input type="text" name="file" value="<?php echo $mediapublics->file?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'mediapublics')" /></td>
	</tr>
	<tr>
		<th>ประเภทสื่อ :</th>
		<td><?php echo form_dropdown('category_id',$mediapublics->category->get_option(),$mediapublics->category_id,'');?></td></tr>
	</tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input rel="th" type="text" name="title[th]" class="full" value="<?php echo lang_decode($mediapublics->title,'th')?>">
			<input rel="en" type="text" name="title[en]" class="full" value="<?php echo lang_decode($mediapublics->title,'en')?>">
		</td>
	</tr>
	<tr>
		<th>เนื้อหา :</th>
		<td>
			<textarea rel="th" name="detail[th]" class="full"><?php echo lang_decode($mediapublics->detail,'th')?></textarea>
			<textarea rel="en" name="detail[en]" class="full"><?php echo lang_decode($mediapublics->detail,'en')?></textarea>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
</table>
</form>