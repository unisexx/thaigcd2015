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
	$("input[name=tag]").tagEditor({
		<?php if($knowledge->tag):?>
		items: '<?php echo $knowledge->tag?>'.split(","),
		<?php endif; ?>
		continuousOutputBuild:true
		});
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
	$("input[type=button]").live('click',function(){
			$(this).parent().parent().after(
			'<tr>' +
			'<th>ชื่อเอกสาร:</th>' +
			'<td><?php echo form_input('doc[]')?> อัพโหลดไฟล์: <?php echo form_upload('file[]')?> <input type="button" value="เพิ่ม" /></td>' +
			'</tr>'
			);
		})
		$("select[name=category_id]").change(function(){
			if($(this).val()==17){
				$(".cat17").show();
			}else{
				$(".cat17").hide();
			}
		})
		if($('select[name=category_id]').val()==17){
				$(".cat17").show();
			}else{
				$(".cat17").hide();
			}
})
</script>
<h1>ความรู้วิชาการ</h1>
<form id="frmMain" action="knowledges/admin/knowledges/save/<?php echo $knowledge->id ?>" method="post" enctype="multipart/form-data" >
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<?php echo approver_dropdown($knowledge);?>
	<?php echo approver_form($knowledge);?>
	<tr><th></th><td><img class="img" style="width:77px; height:64px;" src="<?php echo (is_file('uploads/knowledge/thumbnail/'.$knowledge->image))? 'uploads/knowledge/thumbnail/'.$knowledge->image : 'media/images/dummy/77x64.gif' ?>"  /></td></tr>
	<tr><th>รูปภาพ :</th><td><input type="file" name="image" /></td></tr>
	<tr><th>หมวดหมู่ :</th><td><?php echo form_dropdown('category_id',$knowledge->category->get_option(),$knowledge->category_id,'');?></td></tr>
	<tr><th>เริ่ม :</th><td><input type="text" name="start_date" value="<?php echo DB2Date(($knowledge->start_date)?$knowledge->start_date:date("Y-m-d"))?>" class="datepicker" /></td></tr>
	<tr><th>สิ้นสุด :</th><td><input type="text" name="end_date" value="<?php echo DB2Date($knowledge->end_date)?>" class="datepicker" /></td></tr>
	<tr><th>แท็ก :</th><td><input type="text" name="tag" value="" /></td></tr>
	<tr class="cat17"><th>พยัญชนะ :</th><td><?php echo form_dropdown('label',$knowledge->label(),$knowledge->label,'');?></td></tr>
	<tr class="cat17"><th>แสดงหน้าหลัก :</th><td><?php echo form_dropdown('main',array(0=>'ไม่แสดง',1=>'แสดง'),$knowledge->main,'');?></td></tr>
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
	<?php foreach($knowledge->knowledge_file->order_by('id','asc')->get() as $doc): ?>
	<tr>
		<th style="vertical-align:top;">ชื่อเอกสาร:</th>
		<td>	
			<?php echo form_input('doc[]',$doc->name)?> อัพโหลดไฟล์: 
			<?php echo form_upload('file[]')?> 
			<a href="knowledges/admin/knowledges/download/<?php echo $doc->id ?>"><span class="icon icon-page-save"></span></a> 
			<a href="knowledges/admin/knowledges/document_delete/<?php echo $doc->id ?>" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')"><span class="icon icon-delete"></span></a>
			<?php echo form_hidden('doc_id[]',$doc->id)?>
			</ul>
		</td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<th>ชื่อเอกสาร:</th>
		<td><?php echo form_input('doc[]')?> อัพโหลดไฟล์: <?php echo form_upload('file[]')?> <input type="button" value="เพิ่ม" /></td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>