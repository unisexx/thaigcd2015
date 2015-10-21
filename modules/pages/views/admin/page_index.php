<h1>เกี่ยวกับสำนัก</h1>
<table class="list">
	<tr>
		<th>หัวข้อ</th>
		<th>โดย</th>
		<th width="90"></th>
	</tr>
	<?php foreach($pages as $page): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo lang_decode($page->title,'th');?></td>
		<td><?php echo $page->user->display?></td>
		<td><a class="btn" href="pages/admin/pages/form/<?php echo $page->id?>" >แก้ไข</a></td>
	</tr>
	<?php endforeach; ?>
</table>