<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/tinymce.js"></script>
<script type="text/javascript">
	$(function(){
		$('#rep').click(function(){
			$('#replyfrm').slideDown("slow");
			return false;
		});
	});
</script>
<div id="inbox">
	<h1>อ่านข้อความ</h1>
		<div class="blogrow">
			<img class="avatar" src="uploads/users/<?php echo $from_user->profile->avatar;?>" width="48" height="48">
			<div class="create"><B><a href="users/profile/<?php echo $from_user->id?>"><?php echo $from_user->display?></a></B> <?php echo mysql_to_th($pm->created,'S',TRUE)?> <div style="position:absolute; top:53px; right:15px;"><a href="pms/delete/<?php echo $pm->id?>">ลบ</a> | <a id="rep" href="#">ตอบกลับ</a></div></div>
			<div>เรื่อง : <?php echo $pm->subject?></div>
			<div style="margin:0 0 0 60px;"><?php echo $pm->message?></div>
			<div class="clear"></div>
		</div>
		<form id="replyfrm" name="reply" method="post" action="pms/save/<?php echo $from_user->id?>" style="display:none;">
		<div style="margin:5px 0 0 0;"></div>
			<div>
				<label for="subject">หัวข้อ :</label>
				<input id="subject" type="text" name="subject" value="RE: <?php echo $pm->subject?>" style="width:450px">
			</div>
			<div>
				<label for="message">เนื้อหา :</label>
				<textarea name="message" class="editor[pm]">
					<div><b><?php echo $from_user->display?> พิมพ์ว่า:</b></div>
					<div style="border:1px solid #000; width:90%; background:#eee; padding:5px;">
						<div><?php echo $pm->message?></div>
					</div>
					<br><br>
				</textarea>
			</div>
			<input type="hidden" name="user_id" value="<?php echo $from_user->id?>">
			<input type="submit" value="ตอบกลับ" style="margin:5px 0 0 0;">
		</form>
</div>
