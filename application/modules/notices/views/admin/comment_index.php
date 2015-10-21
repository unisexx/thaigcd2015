<h1>เสนอแนะวิจารณ์ - <?php echo lang_decode($comments->notice->title) ?></h1>
<?php echo $comments->pagination()?>
<table class="list">
	<tr>
		<th>หัวเรื่อง</th>
		<th>ชื่อ-นามสกุล</th>
		<th>วันที่</th>
		<th width="120"></th>
	</tr>
	<?php foreach($comments as $comment): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo $comment->title?></td>
		<td><?php echo $comment->name;?></td>
		<td><?php echo mysql_to_th($comment->created)?></td>
		<td>
			<a class="btn" href="notices/admin/notices/comment_view/<?php echo $comment->id ?>" >รายละเอียด</a>
			<a class="btn" href="notices/admin/notices/comment_delete/<?php echo $comment->id?>" onclick="return confirm('<?php echo 'ยืนยันการลบ'?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $comments->pagination()?>
	