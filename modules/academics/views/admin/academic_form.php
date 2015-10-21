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

<h1>ศูนย์รวมวิชาการ</h1>
<form action="academics/admin/academics/save/<?php echo $academics->id?>" method="post" enctype="multipart/form-data">
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<tr>
		<th></th>
		<td><img class="img" style="max-height:90px; max-wide:120px;" src="<?php echo ($academics->image)? $academics->image : 'themes/thaigcd/photo/nophoto.gif' ?>"  /></td></tr>
	<tr>
		<th>รูปภาพ :</th>
		<td><input type="text" name="image" value="<?php echo $academics->image?>" /><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'academics_image')" /></td>
	</tr>
	<tr>
		<th>ไฟล์แนบ :</th>
		<td><input type="text" name="file" value="<?php echo $academics->file?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'academics')" /></td>
	</tr>
	<tr>
		<th>ประเภทสื่อ :</th>
		<td><?php echo form_dropdown('category_id',$academics->category->get_option(),$academics->category_id,'');?></td></tr>
	</tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input rel="th" type="text" name="title[th]" class="full" value="<?php echo lang_decode($academics->title,'th')?>">
			<input rel="en" type="text" name="title[en]" class="full" value="<?php echo lang_decode($academics->title,'en')?>">
		</td>
	</tr>
	<tr>
		<th>เนื้อหา :</th>
		<td>
			<textarea rel="th" name="detail[th]" class="full"><?php echo lang_decode($academics->detail,'th')?></textarea>
			<textarea rel="en" name="detail[en]" class="full"><?php echo lang_decode($academics->detail,'en')?></textarea>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
</table>
</form>