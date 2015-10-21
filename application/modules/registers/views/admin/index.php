<h1>ใบสมัครศูนย์เด็กเล็กปลอดโรค</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr>
				<th>ชื่อศูนย์เด็กเล็ก</th>
				<td><input type="text" name="center" value="<?php echo (isset($_GET['center']))?$_GET['center']:'' ?>" /></td>
				<th>ชื่อผู้สมัคร</th>
				<td><input type="text" name="name" value="<?php echo (isset($_GET['name']))?$_GET['name']:'' ?>" /></td>
			</tr>
			<tr>
				<th>ตำแหน่ง</th>
				<td><input type="text" name="position" value="<?php echo (isset($_GET['position']))?$_GET['position']:'' ?>" /></td>
				<th>อีเมล์</th>
				<td><input type="text" name="email" value="<?php echo (isset($_GET['email']))?$_GET['email']:'' ?>" /></td>
			</tr>
			<tr>
				<th>วันที่สมัคร</th>
				<td><input type="text" name="from" value="<?php echo (isset($_GET['from']))?$_GET['from']:'' ?>" class="datepicker" /></td>
				<th>ถึง</th>
				<td><input type="text" name="to" value="<?php echo (isset($_GET['to']))?$_GET['to']:'' ?>" class="datepicker" /> <input type="submit" value="ค้นหา" /></td>
			</tr>
			
		</table>
	</form>
</div>
<?php echo $registers->pagination()?>
<table class="list">
	<tr>
		<th>ลำดับ</th>
		<th>ชื่อศูนย์เล็กเด็ก</th>
		<th>ชื่อผู้สมัคร</th>
		<th>ตำแหน่ง</th>
		<th>อีเมล์</th>
		<th width="150"></th>
	</tr>
	<?php $_GET['page'] = (@$_GET['page'])?$_GET['page']:1 ?>
	<?php foreach($registers as $key => $register): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo ++$key + (($_GET['page'] -1) * 20)?></td>
		<td><?php echo $register->center ?></td>
		<td><?php echo $register->name ?></td>
		<td><?php echo $register->position ?></td>
		<td><?php echo $register->email ?></td>
		<td>
			<a class="btn" href="registers/admin/registers/form/<?php echo $register->id?>" >รายละเอียด</a> 
			<a class="btn" href="registers/admin/registers/delete/<?php echo $register->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" >ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $registers->pagination()?>