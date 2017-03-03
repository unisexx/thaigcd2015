<? $statusArr = array('active'=>'ใช้งาน','ban'=>'ถูกระงับ','wait'=>'รอการตรวจสอบ'); ?>
<h1>สมาชิก</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr>
				<th>ชื่อ</th><td><input type="text" name="first_name" value="<?php echo (isset($_GET['first_name']))?$_GET['first_name']:'' ?>" /></td>
				<th>นามสกุล</th><td><input type="text" name="last_name" value="<?php echo (isset($_GET['last_name']))?$_GET['last_name']:'' ?>" /></td>
			</tr>
			<tr>
				<th>อีเมล์</th><td><input type="text" name="email" value="<?php echo (isset($_GET['email']))?$_GET['email']:'' ?>" /></td>
				<th>ระดับ</th><td><?php echo form_dropdown('level_id',get_option('id','level','levels'),@$_GET['level_id'],'',' ') ?></td>
				<td><input type="submit" value="ค้นหา" /></td>
			</tr>
		</table>
	</form>
</div>

<?php echo $users->pagination()?>
<table width="100%" class="list">
	<tr>
		<th>ชื่อ-นามสกุล</th>
		<th>ชื่อที่ใช้ในระบบ</th>
		<th>อีเมล์</th>
		<th>ระดับ</th>
		<th>วันที่สมัคร</th>
		<th>สถานะ</th>
		<th width="90"><a class="btn" href="users/admin/users/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($users as $user):?>
	<tr <?php echo cycle()?>>
		<td><a href="users/profile/<?php echo $user->id?>" target="_blank"><?php echo $user->profile->first_name.' '.$user->profile->last_name?></a></td>
		<td><?php echo $user->display?></td>
		<td><?php echo $user->username?></td>
		<td><?php echo $user->level->level?></td>
		<td><?php echo mysql_to_th($user->created)?></td>
		<td><?=$statusArr[$user->m_status]?></td>
		<td>
			<a class="btn" href="users/admin/users/form/<?php echo $user->id?>" >แก้ไข</a>
			<a class="btn" href="users/admin/users/delete/<?php echo $user->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach?>
</table>
<?php echo $users->pagination()?>
