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
<h1>ประกาศ/จัดจ้าง</h1>
<form id="frmMain" action="notices/admin/notices/save/<?php echo $notice->id ?>" method="post" enctype="multipart/form-data" >
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<?php echo approver_dropdown($notice);?>
	<?php echo approver_form($notice);?>
	<tr><th></th><td><img class="img" style="width:77px; height:64px;" src="<?php echo (is_file('uploads/notice/thumbnail/'.$notice->image))? 'uploads/notice/thumbnail/'.$notice->image : 'media/images/dummy/77x64.gif' ?>"  /></td></tr>
	<tr><th>รูปภาพ :</th><td><input type="file" name="image" /></td></tr>
	<tr><th>สถานะ :</th><td><?php echo form_dropdown('category_id',$notice->category->get_option(),$notice->category_id,'');?></td></tr>
	<tr><th>เริ่ม :</th><td><input type="text" name="start_date" value="<?php echo DB2Date(($notice->start_date)?$notice->start_date:date("Y-m-d"))?>" class="datepicker" /></td></tr>
	<tr><th>สิ้นสุด :</th><td><input type="text" name="end_date" value="<?php echo DB2Date($notice->end_date)?>" class="datepicker" /></td></tr>
	<tr>
		<th>เริ่มการยื่นซองสอบราคา :</th>
		<td><input type="text" name="start_notice" value="<?php echo DB2Date($notice->start_notice)?>" class="datepicker" /></td>
	</tr>
	<tr>
		<th>สิ้นสุดการยื่นซองสอบราคา :</th>
		<td><input type="text" name="end_notice" value="<?php echo DB2Date($notice->end_notice)?>" class="datepicker" /></td>
	</tr>
	<tr>
		<th>วันเปิดซอง :</th>
		<td>
			<input type="text" name="open_date" value="<?php echo DB2Date($notice->open_date)?>" class="datepicker" />
		</td>
	</tr>
	<tr>
		<th>ร่วมสังเกตการณ์ :</th>
		<td>
			<input type="text" name="observe_date" value="<?php echo DB2Date($notice->observe_date)?>" class="datepicker" />
		</td>
	</tr>
	<tr>
		<th>สถานที่ :</th>
		<td>
			<textarea name="place" ><?php echo $notice->place?></textarea>
		</td>
	</tr>
	<tr>
		<th>หน่วยงาน :</th>
		<td>
			<input type="text" name="dept" value="<?php echo $notice->dept?>" />
		</td>
	</tr>
	<tr>
		<th>โทรศัพท์ :</th>
		<td>
			<input type="text" name="phone" value="<?php echo $notice->phone?>" />
		</td>
	</tr>
	<tr>
		<th>โทรสาร :</th>
		<td>
			<input type="text" name="fax" value="<?php echo $notice->fax?>" />
		</td>
	</tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title[th]" rel="th" value="<?php echo lang_decode($notice->title,'th')?>" class="full" />
			<input type="text" name="title[en]" rel="en" value="<?php echo lang_decode($notice->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>บทคัดย่อ :</th>
		<td>
			<textarea name="intro[th]" id="intro" class="full" rel="th"><?php echo lang_decode($notice->intro,'th')?></textarea>
			<textarea name="intro[en]" id="intro" class="full" rel="en"><?php echo lang_decode($notice->intro,'en')?></textarea>
		</td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<div rel="th"><textarea name="detail[th]" class="full tinymce"><?php echo lang_decode($notice->detail,'th')?></textarea></div>
			<div rel="en"><textarea name="detail[en]" class="full tinymce"><?php echo lang_decode($notice->detail,'en')?></textarea></div>
		</td>
	</tr>
	<tr><th>ชื่อไฟล์ 1 :</th><td><input type="text" name="file_name1" value="<?php echo $notice->file_name1?>"/></td></tr>
	<tr><th>ไฟล์แนบ 1 :</th><td><input type="text" name="file_src1" value="<?php echo $notice->file_src1?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'file')" /></td></tr>
	<tr><th>ชื่อไฟล์ 2 :</th><td><input type="text" name="file_name2" value="<?php echo $notice->file_name2?>"/></td></tr>
	<tr><th>ไฟล์แนบ 2 :</th><td><input type="text" name="file_src2" value="<?php echo $notice->file_src2?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'file')" /></td></tr>
	<tr><th>ชื่อไฟล์ 3 :</th><td><input type="text" name="file_name3" value="<?php echo $notice->file_name3?>"/></td></tr>
	<tr><th>ไฟล์แนบ 3 :</th><td><input type="text" name="file_src3" value="<?php echo $notice->file_src3?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'file')" /></td></tr>
	<tr><th>ชื่อไฟล์ 4 :</th><td><input type="text" name="file_name4" value="<?php echo $notice->file_name4?>"/></td></tr>
	<tr><th>ไฟล์แนบ 4 :</th><td><input type="text" name="file_src4" value="<?php echo $notice->file_src4?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'file')" /></td></tr>
	<tr><th>ชื่อไฟล์ 5 :</th><td><input type="text" name="file_name5" value="<?php echo $notice->file_name5?>"/></td></tr>
	<tr><th>ไฟล์แนบ 5 :</th><td><input type="text" name="file_src5" value="<?php echo $notice->file_src5?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'file')" /></td></tr>
	<tr><th></th><td><input type="submit" value="บันทึก"><?php echo form_back() ?></td></tr>
	<?php echo form_referer() ?>
</table>
</form>