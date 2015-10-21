<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/tinymce.js"></script>

<form method="post">
	<div>
		<label>หัวข้อ</label><br />
		<input type="text" name="title" value="<?php echo $blogpost->title ?>" />
	</div>
	<div>
		<label>เริ่ม</label><br />
		<input type="text" name="start_date" class="datepicker" value="<?php echo ($blogpost->start_date)?$blogpost->start_date:date("Y-m-d"); ?>" style="width:150px;"/>
	</div>
	<div>
		<label>แท็ก</label><br />
		<input type="text" name="tag" value="<?php echo $blogpost->tag ?>" />
	</div>
	<div>
		<label>รายละเอียด</label><br />
		<textarea name="detail" class="editor[blog]"><?php echo $blogpost->detail ?></textarea>
	</div>
	<hr />
	<input type="submit" value="บันทึก" />
 </form>
