<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/tinymce.js"></script>
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
<h1>กลุ่มงาน</h1>
<form action="groups/admin/groups/save/<?php echo $group->id ?>" method="post" enctype="multipart/form-data" >
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<?php if($group->image): ?>
	<tr><th></th><td><img class="img" style="width:656px; height:254px;" src="uploads/group/<?php echo $group->image ?>" /></td></tr>
	<?php endif; ?>
	<tr><th>รูปภาพ :</th><td><input type="file" name="image" /></td></tr>
	<tr>
		<th>กลุ่ม :</th>
		<td>
			<input type="text" name="name[th]" rel="th" value="<?php echo lang_decode($group->name,'th')?>" class="full" />
			<input type="text" name="name[en]" rel="en" value="<?php echo lang_decode($group->name,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>โทรศัพท์ :</th>
		<td>
			<input type="text" name="phone" value="<?php echo $group->phone?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>แฟกซ์ :</th>
		<td>
			<input type="text" name="fax" value="<?php echo $group->fax?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>URL :</th>
		<td>
			<input type="text" name="url" value="<?php echo $group->url?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>อีเมล์ :</th>
		<td>
			<input type="text" name="email" value="<?php echo $group->email?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<div rel="th"><textarea name="detail[th]" class="full"><?php echo lang_decode($group->detail,'th')?></textarea></div>
			<div rel="en"><textarea name="detail[en]" class="full"><?php echo lang_decode($group->detail,'en')?></textarea></div>
		</td>
	</tr>
	<tr>
		<th>แนะนำกลุ่ม(บทคัดย่อ) :</th>
		<td>
			<div rel="th"><textarea name="intro[th]" class="full editor"><?php echo lang_decode($group->aboutus,'th')?></textarea></div>
			<div rel="en"><textarea name="intro[en]" class="full editor"><?php echo lang_decode($group->aboutus,'en')?></textarea></div>
		</td>
	</tr>
	<tr>
		<th>แนะนำกลุ่ม :</th>
		<td>
			<div rel="th"><textarea name="aboutus[th]" class="full editor"><?php echo lang_decode($group->aboutus,'th')?></textarea></div>
			<div rel="en"><textarea name="aboutus[en]" class="full editor"><?php echo lang_decode($group->aboutus,'en')?></textarea></div>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><input type="button" name="back" value="ย้อนกลับ" onclick="window.location = 'groups/admin/groups'" /></td></tr>
</table>
</form>