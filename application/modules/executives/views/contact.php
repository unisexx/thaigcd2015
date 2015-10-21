<div class="executive_contact">
<div style="padding:2px 0 0 2px; background:url(themes/gcdnew/images/bg_contactboss.png) top left no-repeat; height:104px; padding:0 0 0 215px; line-height:80px; font-size:16px;">
<?php echo $user->profile->first_name.' '.$user->profile->last_name ?>
</div>
<form method="post" enctype="multipart/form-data" action="executives/send/612" >
	<table class="form">
		<tr><th style="width:100px;">ชื่อ - สกุล</th><td><input type="text" name="name" /></td></tr>
		<tr><th>หัวเรื่อง</th><td><input type="text" name="title" /></td></tr>
		<tr><th>รายละเอียด</th><td><input type="text" name="detail" /></td></tr>
		<tr><th>อีเมล์</th><td><input type="text" name="email" /></td></tr>
		<tr><th>ไฟล์แนบ</th><td><input type="file" name="attach" /></td></tr>
		<tr><th></th><td><input type="submit" value="ตกลง" /></td></tr>
	</table>
</form>
</div>
