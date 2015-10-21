<link rel="stylesheet" href="media/js/tag/jquery.tag.css" type="text/css" media="screen" charset="utf-8" /> 
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/tinymce.js"></script>
<script type="text/javascript" src="media/js/tag/jquery.tag.editor-min.js"></script>
<script type="text/javascript">
	$(function(){
			
			$("input[name=tag]").tagEditor({
				<?php if($blogpost->tag): ?>items: '<?php echo $blogpost->tag?>'.split(","),<?php endif; ?>
				continuousOutputBuild:true
				});
	
			
			
	})
</script>
<form method="post">
	<div>
		<label>หัวข้อ</label><br />
		<input type="text" name="title" value="<?php echo $blogpost->title ?>" />
	</div>
	<div>
		<label>เริ่ม</label><br />
		<input type="text" name="start_date" class="datepicker" value="<?php echo ($blogpost->start_date)?DB2Date($blogpost->start_date):DB2Date(date("Y-m-d")); ?>" style="width:150px;"/>
	</div>
	<div>
		<label>แท็ก <span style="font-weight:normal;">(กด enter เพื่อเพิ่มแท็ก)</span></label><br />
		<input type="text" name="tag" value="" />
	</div>
	<div>
		<label>รายละเอียด</label><br />
		<textarea name="detail" class="editor[blog]"><?php echo $blogpost->detail ?></textarea>
	</div>
	<hr />
	<input type="submit" value="บันทึก" />
 </form>
