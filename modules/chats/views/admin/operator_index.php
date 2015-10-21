<h1>แชตออนไลน์</h1>
<?php include "_menu.php"?><br>
<form method="post" action="">
	<label for="search">ค้นหาสมาชิก</label>
	<input id="search" type="text" name="search" value="<?php echo @$_POST['search']?>">
	<input type="submit" value="submit">
</form>
<?php echo $users->pagination()?>
<table width="100%" class="list">
	<tr>
		<th>สถานะ</th>
		<th>ชื่อในระบบ</th>
		<th>อีเมล์</th>
		<th>ระดับ</th>
	</tr>
	<?php foreach($users as $user):?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="chat_operator" value="<?php echo $user->id ?>" <?php echo ($user->chat_operator=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><a href="users/profile/<?php echo $user->id?>" target="_blank"><?php echo $user->display?></a></td>
		<td><?php echo $user->email?></td>
		<td><?php echo $user->level->level?></td>
	</tr>
	<?php endforeach?>
</table>
<?php echo $users->pagination()?>