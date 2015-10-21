<h1><a href="newsletters/admin/categories/member_index">สมาชิกในกลุ่มข่าว</a> » <?php echo lang_decode($category->name,'')?></h1>
<?php include "_menu.php";?>
<?php echo $email_lists->pagination()?>
<table class="list">
	<tr>
		<th>อีเมลล์</th>
	</tr>
	<?php foreach($email_lists as $email_list): ?>
		<tr <?php echo cycle()?>>
			<td><?php echo $email_list->email?></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php echo $email_lists->pagination()?>