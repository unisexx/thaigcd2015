<h1>ติดต่อสอบถาม</h1>
<?php echo $contacts->pagination()?>
<table class="list">
	<tr>
		<th>หัวข้อ</th>
		<th>ชื่อ-นามสกุล</th>
		<th>อีเมล์</th>
		<th width="90"></th>
	</tr>
	<?php foreach($contacts as $contact): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo $contact->title ?></td>
		<td><?php echo $contact->name ?></td>
		<td><?php echo $contact->email ?></td>
		<td>
			<a class="btn" href="contacts/admin/contacts/form/<?php echo $contact->id?>" >รายละเอียด</a> 
		</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $contacts->pagination()?>