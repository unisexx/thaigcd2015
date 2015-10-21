<table class="list">
	<tr>
		<th>หัวข้อ</th><th>เริ่มแสดง</th><th><a class="btn" href="blogs/post/">เขียนบทความ</a></th>
	</tr>
	<?php foreach($blog->blogpost->order_by('id','desc')->get_page(10) as $blogpost): ?>
	<tr class="<?php echo alternator('even','odd')?>">
		<td><?php echo $blogpost->title ?></td><td><?php echo mysql_to_th($blogpost->start_date) ?></td><td><a class="btn" href="blogs/post/<?php echo $blogpost->id ?>">แก้ไข</a> <a class="btn" href="blogs/delete/<?php echo $blogpost->id ?>"> ลบ</a></td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $blog->blogpost->pagination() ?>
