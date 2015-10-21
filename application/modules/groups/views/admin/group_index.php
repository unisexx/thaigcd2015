<h1>กลุ่มงาน</h1>
<?php echo $groups->pagination()?>
<table class="list">
	<tr>
		<th>กลุ่มงาน</th>
		<th width="90"><a class="btn" href="groups/admin/groups/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($groups as $group): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo lang_decode($group->name,'th') ?></td>
		<td>
			<a class="btn" href="groups/admin/groups/form/<?php echo $group->id?>" >แก้ไข</a> 
			<a class="btn" href="groups/admin/groups/delete/<?php echo $group->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
		
	</table>
<?php echo $groups->pagination()?>