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
<h1>จัดการเมนู</h1>
<form action="menus/admin/menus/save/<?php echo $menus->id ?>" method="post" enctype="multipart/form-data">
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<?php if(is_file('uploads/icon/'.$menus->icon)): ?>
	<tr><th></th><td><img class="avatar" src="uploads/icon/<?php echo $menus->icon ?>" /></td></tr>
	<?php endif; ?>
	<tr><th>ไอคอน : </th><td><input type="file" name="icon" /><span class="alt">(Image Size:24 x 24 px)</span></td></tr>
	<tr>
		<th>ชื่อเมนู :</th>
		<td>
			<?php echo form_input('title[th]',lang_decode($menus->title,'th'),'class=full rel=th');?>
			<?php echo form_input('title[en]',lang_decode($menus->title,'en'),'class=full rel=en');?>
		</td>
	</tr>
	<tr>
		<th>เว็บไซต์ :</th>
		<td>
			<?php echo form_input('url',$menus->url,'class=full rel=th');?>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
</table>
</form>