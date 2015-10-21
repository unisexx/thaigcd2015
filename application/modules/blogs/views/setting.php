<script type="text/javascript" src="media/js/farbtastic/farbtastic.js"></script>
<link rel="stylesheet" href="media/js/farbtastic/farbtastic.css" type="text/css" />
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#picker').farbtastic(function(color){
		$('#page,#blog-side').css('backgroundColor',color);
		$('#color').val(color);
	});
	
	
});
</script>
<form method="post" enctype="multipart/form-data">
	<div>
		<label>สีพื้นหลัง</label><br />
		<div class="form-item"><input class="text small" type="hidden" id="color" name="background" value="" /></div>
		<div id="picker"></div>
	</div>
	<div>
		<label>รูปเฮดเดอร์ <span style="font-weight:normal;">(ภาพควรมีขนาดความกว้าง 646 pixel และนามสกุล jpg หรือ png เท่านั้น)</span></label><br />
		<input type="file" name="header" />
	</div>
	<div>
		<label>ชื่อบล็อค</label><br />
		<input type="text" name="title" value="<?php echo $blog->title ?>" class="text full" />
	</div>
	<div>
		<label>รายละเอียด</label><br />
		<input type="text" name="description" value="<?php echo $blog->description ?>" class="text full" />
	</div>
	<hr />
	<input type="submit" value="บันทึก" />
</form>

