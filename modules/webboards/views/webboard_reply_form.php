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
<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/tinymce.js"></script>
<div class="topic"><img src="<?php echo topic("topic_board.png") ?>" height="25" width="200"></div>
	<div id="data">
		<div id="navi"><a href="webboards" class="link_prev B">เว็บบอร์ด</a> &gt; <a href="webboards/category/<?php echo $webboard_quiz->category_id?>" class="link_prev B"><?php echo lang_decode($webboard_quiz->category->name,'')?></a> &gt; <a href="webboards/view_topic/<?php echo $webboard_quiz->id?>" class="link_prev B"><?php echo $webboard_quiz->title?></a> &gt; แสดงความเห็น/ตอบกระทู้</div>
				<form action="webboards/save_reply/<?php echo $webboard_quiz->id?>/<?php echo $webboard_answer->id?>/<?php echo $type?>" method="post" enctype="multipart/form-data">
					<table class="form">
						<tr>
							<th>RE :</th>
							<td><?php echo $webboard_quiz->title?></td>
						</tr>
						<tr>
							<th></th>
							<td>
								<?php echo uppic_mce();?>
							</td>
						</tr>
						<tr>
							<th class="top"></th>
							<td>
								<textarea name="detail" class="full editor[webboard]">
									<?php if ($quote_id == 0):?>
									<div><b><?php echo $webboard_quiz->user->display?> พิมพ์ว่า:</b></div>
									<div style="border:1px solid #000; width:90%; background:#eee; padding:5px;"><?php echo $webboard_quiz->detail?></div><br><br>
									<?php elseif ($quote_id > 0 && $type == "quote"):?>
									<div><b><?php echo $webboard_answer->user->display?> พิมพ์ว่า:</b></div>
									<div style="border:1px solid #000; width:90%; background:#eee; padding:5px;"><?php echo $webboard_answer->detail;?></div><br><br>
									<?php elseif ($quote_id > 0 && $type == "edit"):?>
									<?php echo $webboard_answer->detail;?>
									<?php endif;?>
								</textarea>
							</td>
						</tr>
						<tr>
							<td><?php echo form_hidden('category_id',$webboard_quiz->category_id)?></td>
						</tr>
						<tr><th></th><td><img src="users/captcha" /> </td></tr>
						<tr><th>Captcha :</th><td><input type="text" name="captcha" class="textbox"> </td></tr>
						<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
					</table>
				</form>
	</div>
<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="shadow"></div>