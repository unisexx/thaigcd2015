<style type="text/css">
table.form td {
padding:5px;
}
table.form th {
padding:5px;
text-align:right;
vertical-align:middle;
}
table.form th.top {
vertical-align:top;
}
table.form input[type="text"], table.form input[type="password"] {
width:250px;
}
table.form select {
width:250px;
}
table.form textarea {
height:100px;
width:250px;
}
table.form input.full[type="text"] {
width:500px;
}
table.form textarea.full {
width:840px;
}
table.form .img {
border:1px solid #CCCCCC;
}
table.form td .cirkuitSkin td.mceToolbar {
padding:1px 0 2px;
}
</style>

<script type="text/javascript">
	$(function(){
		$('.addvote').click(function(){
			$('<tr><th></th><td>ตัวเลือก : <input type="text" name="name[]" class="text small" /></td></tr>').insertBefore($('.textarea'));
			return false;
		});
	});
</script>

<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/tinymce.js"></script>
<div class="topic"><img src="<?php echo topic("topic_board.png") ?>" height="25" width="200"></div>
	<div id="data">
		<div id="navi"><a href="webboards" class="link_prev B">เว็บบอร์ด</a> &gt; <a class="link_prev B" href="webboards/category/<?php echo $categories->id?>"><?php echo lang_decode($categories->name,'')?></a> &gt; ตั้งกระทู้ใหม่</div>
				<form action="webboards/save/<?php echo $categories->id?>/<?php echo $webboard_quizs->id?>" method="post">
					<table class="form">
						<tr>
							<th>หัวข้อ :</th>
							<td><?php echo form_input('title',$webboard_quizs->title,'style="width:500px;"')?>
							<?php if($topic_type == 'vote'):?>
							<input class="btn addvote" type="button" value="+ เพิ่มตัวเลือกโหวต"></td>
							<?php endif;?>
						</tr>
						<?php if($topic_type == 'vote'):?>
						
						<?php foreach($webboard_quizs->webboard_polldetail as $item): ?>
						<tr><th></th><td>ตัวเลือก : <input type="text" name="name[]" value="<?php echo $item->name ?>" class="text small" /> <a class="btn" href="webboards/delete_poll_choice/<?php echo $item->id?>" class="btn" onclick="return confirm('ต้องการลบตัวเลือกนี้?')">ลบ</a><input type="hidden" name="detail_id[]" value="<?php echo $item->id ?>" /></td></tr>
						<?php endforeach; ?>
			
						<tr><th></th><td>ตัวเลือก : <input type="text" name="name[]" class="text small" /></td></tr>
						<?php endif;?>
						<tr>
							<th></th>
							<td>
								<?php echo uppic_mce();?>
							</td>
						</tr>
						<tr class="textarea">
							<th class="top">เนื้อหา :</th>
							<td>
								<textarea name="detail" class="editor[webboard]"><?php echo $webboard_quizs->detail?></textarea>
								<?php echo form_hidden('category_id',$categories->id)?>
								<?php echo form_hidden('type',$topic_type)?>
							</td>
						</tr>
						<tr><th></th><td><img src="users/captcha" /> </td></tr>
						<tr><th>Captcha :</th><td><input type="text" name="captcha" class="textbox"> </td></tr>
						<?php if (is_login('Administrator')):?>
						<tr><th>กระทู้เฉพาะกลุ่ม :</th><td><?php echo form_dropdown('group_id',get_option('id','name','groups','','th'),$webboard_quizs->group_id,'class="text select"','เข้าได้ทุกกลุ่ม')?></td></tr>
						<?php else:?>
						<tr><th>กระทู้เฉพาะกลุ่ม :</th><td><input type="checkbox" name="group_id" value="<?php echo user()->group_id?>" <?php if($webboard_quizs->group_id != 0){echo "checked=checked";}?>> <?php echo lang_decode(user()->group->name)?></td></tr>
						<?php endif;?>
						<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
					</table>
				</form>
	</div>