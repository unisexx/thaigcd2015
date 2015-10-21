<h1>หน่วยงาน</h1>
<table class="list">
	<tr>
		<th>หน่วยงาน</th>
		<th width="90"><a class="btn" href="agencies/admin/agencies/form/" >เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($agencies as $agency): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo $agency->name?></td>
		<td><a class="btn" href="agencies/admin/agencies/form/<?php echo $agency->id?>" >แก้ไข</a> <a class="btn" href="agencies/admin/agencies/delete/<?php echo $agency->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a></td>
		
	</tr>
	<?php endforeach; ?>
</table>