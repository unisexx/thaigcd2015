<script type="text/javascript">
	$(document).ready(function(){
		var upload_file = "<?php echo $mediafiles->file?>";
		if(upload_file == ""){
			$("#embed").attr("checked","checked");
			$(".upload").hide();
			$(".embed").show();
		}else{
			$("#upload").attr("checked","checked");
			$(".upload").show();
			$(".embed").hide();
		}
		
		$("input[type=radio]").live("click",function(){
			if($(this).val() == "upload"){
				$(".upload").show();
				$(".embed").hide();
			}else{
				$(".upload").hide();
				$(".embed").show();
			}
		});
	});
</script>
<script type="text/javascript" src="themes/gcdnew/js/jquery.validate.min.js"></script>
<script type="text/javascript">
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
<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<h1>สื่อมัลติมีเดีย</h1>
<form id="frmMain" action="mediafiles/admin/mediafiles/save/<?php echo $mediafiles->id?>" method="post" enctype="multipart/form-data">
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<?php echo approver_dropdown($mediafiles);?>
	<?php echo approver_form($mediafiles);?>
	<?php if(is_file('uploads/mediafiles/'.$mediafiles->image)): ?>
		<tr>
			<th></th>
			<td><img style="max-height:90px; max-wide:120px;" src="uploads/mediafiles/<?php echo $mediafiles->image?>" /></td>
		</tr>
	<?php endif; ?>
	<tr>
		<th>รูปภาพ :</th>
		<td><?php echo form_upload('image')?> ขนาด 77 x 64 px)</td>
	</tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<?php echo form_input('title[th]',lang_decode($mediafiles->title,'th'),'class=full rel=th');?>
			<?php echo form_input('title[en]',lang_decode($mediafiles->title,'en'),'class=full rel=en');?>
		</td>
	</tr>
	<tr>
		<th>เลือกรูปแบบการนำเข้า video</th>
		<td><input id="upload" type="radio" name="import" value="upload"> <label for="upload">อัพโหลด</label>  <input id="embed" type="radio" name="import" value="embed"> <label for="embed">โค้ดวิดีโอ</label></td>
	</tr>
	<tr class="upload">
		<th>ไฟล์อัพโหลด :</th>
		<td><input type="text" name="file" value="<?php echo $mediafiles->file?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'mediafiles')" /> (max of size 50 mb : mp3,mp4,flv)</td>
	</tr>
	
	<?php if($mediafiles->embed): ?>
	<tr class="embed">
		<th></th>
		<td><?php echo $mediafiles->embed?></td>
	</tr>
	<?php endif; ?>
	<tr class="embed">
		<th>Embed :</th>
		<td><textarea name="embed" class="full"><?php echo $mediafiles->embed?></textarea></td>
	</tr>
	<tr>
		<th>ประเภท :</th>
		<td><?php echo form_dropdown('category_id',$mediafiles->category->get_option(),$mediafiles->category_id,'');?></td></tr>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>