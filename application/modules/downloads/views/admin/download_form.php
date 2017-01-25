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
		<?php if($information->tag):?>
		items: '<?php echo $information->tag?>'.split(","),
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
})
</script>

<h1>ดาวน์โหลด</h1>
<form id="frmMain" action="downloads/admin/downloads/save/<?php echo $downloads->id?>" method="post" enctype="multipart/form-data">
<table class="form">
    <tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
    <?php echo approver_dropdown($downloads);?>
    <?php echo approver_form($downloads);?>

<tr>
    <th></th>
    <td><img class="img" style="width:77px; height:64px;" src="<?php echo (is_file('uploads/download/thumbnail/'.$downloads->image))? 'uploads/download/thumbnail/'.$downloads->image : 'media/images/dummy/77x64.gif' ?>"  />
    </td>
    </tr>
    
	<tr>
    <th>รูปภาพ :</th>
    <td><input type="file" name="image" /></td>
    </tr>
    
<!--	<tr>
    <th>หมวดหมู่ :</th>
    <td><?php echo form_dropdown('category_id',$downloads->category->get_option(),$downloads->category_id,'');?></td>
    </tr>-->
    
	<tr>
    <th>เริ่ม :</th>
    <td><input type="text" name="start_date" value="<?php echo DB2Date(($downloads->start_date)?$downloads->start_date:date("Y-m-d"))?>" class="datepicker" /></td>
    </tr>
	<tr>
    <th>สิ้นสุด :</th>
    <td><input type="text" name="end_date" value="<?php echo DB2Date($downloads->end_date)?>" class="datepicker" /></td>
    </tr>
    
    <tr>
        <th>ไฟล์แนบ :</th>
        <td><input type="text" name="file" value="<?php echo $downloads->file?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'downloads')" /></td>
    </tr>
    <tr>
        <th>ประเภทสื่อ :</th>
        <td><?php echo form_dropdown('category_id',$downloads->category->get_option(),$downloads->category_id,'');?></td></tr>
    </tr>
    
	<tr>
    <th>แท็ก :</th>
    <td><small>กด Enter เพื่อเพิ่มแท็ก</small>
    <br />
    <input type="text" name="tag" value="" />
    </td>
    </tr>
	<tr>
    <th>ที่มา :</th>
    <td><input type="text" name="refer" value="<?php echo $downloads->refer?>" /></td>
    </tr>
	
    <tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title[th]" rel="th" value="<?php echo lang_decode($downloads->title,'th')?>" class="full" />
			<input type="text" name="title[en]" rel="en" value="<?php echo lang_decode($downloads->title,'en')?>" class="full" />
		</td>
	</tr>
    
	<tr>
		<th>บทคัดย่อ :</th>
		<td>
			<textarea name="intro[th]" id="intro" class="full" rel="th"><?php echo lang_decode($downloads->intro,'th')?></textarea>
			<textarea name="intro[en]" id="intro" class="full" rel="en"><?php echo lang_decode($downloads->intro,'en')?></textarea>
		</td>
	</tr>
    
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<div rel="th"><textarea name="detail[th]" class="full tinymce"><?php echo lang_decode($downloads->detail,'th')?></textarea></div>
			<div rel="en"><textarea name="detail[en]" class="full tinymce"><?php echo lang_decode($downloads->detail,'en')?></textarea></div>
		</td>
	</tr>
    
    

   
    <tr><th></th><td><input type="submit" value="บันทึก"><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>