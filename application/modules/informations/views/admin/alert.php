<h1>แจ้งลบความคิดเห็นข่าว</h1>
<?php echo $comments->pagination()?>
<table class="list">
	<tr>
		<th>ความคิดเห็น</th>
		<th>หัวข้อข่าว</th>
		<th>เหตุผล</th>
		<th width="90"></th>
	</tr>
	<?php foreach($comments as $comment): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo $comment->information_comment->comment?></td>
		<td><?php echo lang_decode($comment->information_comment->information->title) ?></td>
		<td><?php echo $comment->reason ?></td>
		<td>
			<a class="btn" href="informations/admin/information_alerts/delete/<?php echo $comment->information_comment_id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $comments->pagination()?>