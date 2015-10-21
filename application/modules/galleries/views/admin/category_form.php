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
					"name[th]": 
					{ 
							required: true
					}
				},
				messages:
				{
					"name[th]": 
					{ 
							required: "กรุณากรอกหัวข้อค่ะ"
					}
				}
			});		
	})
</script>
<h1 style="margin:0 0 15px;">อัลบั้ม</h1>
<form id="frmMain" method="post" action="galleries/admin/categories/save/<?php echo $category->id?>" enctype="multipart/form-data">
	<table class="form">
		<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
		<?php echo approver_dropdown($category);?>
		<?php echo approver_form($category);?>
		<tr>
			<th>ชื่ออัลบั้ม :</th>
			<td>
				<input type="text" name="name[th]" rel="th" value="<?php echo lang_decode($category->name,'th')?>" />
				<input type="text" name="name[en]" rel="en" value="<?php echo lang_decode($category->name,'en')?>" />
			</td>
		</tr>
		<tr>	
			<th></th>
			<td>
			<input type="hidden" name="parents" value="<?php echo $parent->id ?>"  />
			<input type="hidden" name="module" value="<?php echo $parent->module ?>"  />
			<input type="submit" value="บันทึก" class="submit small" />
			</td>
		</tr>
	</table>
</form>
