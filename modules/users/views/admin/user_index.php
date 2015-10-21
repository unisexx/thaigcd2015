<h1>สมาชิก</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>ค้นหา</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>

<?php echo $users->pagination()?>
<table width="100%" class="list">
	<tr>
		<th>ชื่อในระบบ</th>
		<th>อีเมล์</th>
		<th>ระดับ</th>
		<th width="90"><a class="btn" href="users/admin/users/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($users as $user):?>
	<tr <?php echo cycle()?>>
		<td><a href="users/profile/<?php echo $user->id?>" target="_blank"><?php echo $user->display?></a></td>
		<td><?php echo $user->email?></td>
		<td><?php echo $user->level->level?></td>
		<td>
			<a class="btn" href="users/admin/users/form/<?php echo $user->id?>" >แก้ไข</a>
			<a class="btn" href="users/admin/users/delete/<?php echo $user->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach?>
</table>
<?php echo $users->pagination()?>
