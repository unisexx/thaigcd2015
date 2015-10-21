<h1>สมาชิก</h1>
<form method="post" action="users/admin/users/save/<?php echo $user->id?>" enctype="multipart/form-data">
	<table class="form">
		<tr><th>กลุ่มงาน :</th><td><?php echo form_dropdown('group_id',get_option('id','name','groups','','th'),$user->group->id,'class="text select"')?></td></tr>
		<tr><th>สิทธิ์การเข้าใช้ :</th><td><?php echo form_dropdown('level_id',$levels->all_to_assoc('id','level'),$user->level->id,'class="text select"')?></td></tr>
		<tr><th>Display :</th><td><input type="text" class="text small" name="display" value="<?php echo $user->display?>"> </td></tr>
		<tr><th>E-mail :</th><td><input type="text" class="text small" name="email" value="<?php echo $user->email?>"> </td></tr>
		<tr><th>Password :</th><td><input type="password" class="text small" name="password" value="<?php echo $user->password?>"> </td></tr>
		<tr><th>Confirm Password :</th><td><input type="password" class="text small" name="_password" value="<?php echo $user->password?>"> </td></tr>
		<tr><th></th><td><input type="submit" value="<?php echo lang('btn_submit')?>" class="button" /><input type="button" value="<?php echo lang('btn_back')?>" class="button" onclick="window.location = 'user/admin/user'" /></td></tr>
		<input type="hidden" name="id" value="<?php echo $user->id?>" />
	</table>
</form>

