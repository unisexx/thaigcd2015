<h1>สิทธิการใช้งาน</h1>
<?php echo $levels->pagination()?>
<table width="100%" class="list">
	<tr>
		<th>ชื่อ</th>
		<th width="90"><a class="btn" href="users/admin/levels/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($levels as $level):?>
	<tr <?php echo cycle()?>>
		<td><?php echo $level->level?></td>
		<td>
			<a class="btn" href="users/admin/levels/form/<?php echo $level->id?>" >แก้ไข</a>
			<a class="btn" href="users/admin/levels/delete/<?php echo $level->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach?>
</table>
<?php echo $levels->pagination()?>
