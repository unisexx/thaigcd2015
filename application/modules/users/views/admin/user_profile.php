<script type="text/javascript" src="themes/gcdnew/js/jquery.validate.min.js"></script>
<script language="javascript">
	$(function(){
		$("#frmProfile").validate({
			rules: 
			{
				username: 
				{ 
					required: true,
					email: true,
					remote: "users/admin_check_email"
				},
				display: 
				{ 
					required: true,
					remote: "users/admin_check_display"
				},
				password: 
				{
					required: true
				},
				_password:
				{
					equalTo: "#password"
				},
				first_name: 
				{ 
					required: true
				},
				last_name: 
				{ 
					required: true
				}
			},
			messages:
			{
				username: 
				{ 
					required: "กรุณากรอกอีเมล์ค่ะ",
					email: "กรุณากรอกอีเมล์ให้ถูกต้องค่ะ",
					remote: "อีเมล์นี้ไม่สามารถใช้งานได้"
				},
				display: 
				{ 
					required: "กรุณากรอกชื่อในระบบค่ะ",
					remote: "ชื่อในระบบนี้ไม่สามารถใช้ได้ค่ะ"
				},
				password: 
				{
					required: "กรุณากรอกรหัสผ่านค่ะ",
				},
				_password:
				{
					equalTo: "กรุณากรอกรหัสผ่านให้ตรงกันทั้ง 2 ช่องค่ะ"
				},
				first_name:
				{
					required: "กรุณากรอกชื่อค่ะ"
				},
				last_name:
				{
					required: "กรุณากรอกนามสกุลค่ะ"
				}
			}
		});
	})
</script>
<h1>ประวัติ</h1>
<form id="frmProfile" method="post" action="users/admin/profiles/save" enctype="multipart/form-data">
	<table class="form">
	<?php if(is_file('uploads/users/'.$user->profile->avatar)): ?>
	<tr><th></th><td><a class="btn" href="users/admin/profiles/remove_image/<?php echo $user->id ?>" />x</a><br /><img class="avatar" src="uploads/users/<?php echo $user->profile->avatar ?>" /></td></tr>
	<?php endif; ?>
	<tr><th>รูปประจำตัว : </th><td><input type="file" name="image" /><span class="alt">(ขนาด 140 x 140 px)</span></td></tr>
	<tr><th>ชื่อในระบบ:</th><td><input type="text" class="text small" name="display" value="<?php echo $user->display?>"> </td></tr>
	<tr><th>อีเมล์ล็อคอิน:</th><td><input type="text" class="text small" name="username" value="<?php echo $user->username?>"> </td></tr>
	<tr><th>รหัสผ่าน:</th><td><input id="password" type="password" class="text small" name="password" value="<?php echo $user->password?>"> </td></tr>
	<tr><th>ยืนยันรหัสผ่าน:</th><td><input type="password" class="text small" name="_password" value="<?php echo $user->password?>"> </td></tr>
	<tr><th>ชื่อ : </th><td><input type="text" class="text" name="first_name" value="<?php echo $user->profile->first_name?>" /></td></tr>
	<tr><th>นามสกุล : </th><td><input type="text" class="text" name="last_name" value="<?php echo $user->profile->last_name?>" /></td></tr>
	<tr><th>วันเกิด : </th><td><input type="text" name="birth_day" value="<?php echo DB2Date($user->profile->birth_day) ?>" class="text datepicker" /></td></tr>
	<tr><th>เพศ : </th><td><?php echo form_dropdown('gender', array('m'=>'ชาย', 'f'=>'หญิง'), $user->profile->gender,'class="text select"'); ?></td></tr>
	<tr><th>เบอร์โทรศัพท์ : </th><td><input type="text" class="text small" name="phone" value="<?php echo $user->profile->phone?>" /></td></tr>
	<tr><th>เบอร์โทรศัพท์มือถือ : </th><td><input type="text" class="text small" name="mobile" value="<?php echo $user->profile->mobile?>" /></td></tr>
	<tr><th>ที่อยู่ : </th><td><textarea name="address" class="textarea" ><?php echo $user->profile->address?></textarea></td></tr>
	<tr><th>รหัสไปรษณีย์ : </th><td><input type="text" class="text small" name="postcode" value="<?php echo $user->profile->postcode?>" /></td></tr>
	<tr><th></th><td><input type="submit" value="<?php echo lang('btn_submit')?>" /></td></tr>
	</table>
</form>