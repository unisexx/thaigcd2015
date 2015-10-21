<h1>แจ้งลบความคิดเห็นเว็บบล็อค</h1>
<?php echo $comments->pagination()?>
<table class="list">
	<tr>
		<th>ความคิดเห็น</th>
		<th>บล็อค</th>
		<th>เรื่อง</th>
		<th>เหตุผล</th>
		<th width="90"></th>
	</tr>
	<?php foreach($comments as $comment): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo $comment->blogcomment->comment?></td>
		<td><?php echo $comment->blogcomment->blogpost->blog->title ?></td>
		<td><?php echo $comment->blogcomment->blogpost->title ?></td>
		<td><?php echo $comment->reason ?></td>
		<td>
			<a class="btn" href="blogs/admin/blogs/delete/<?php echo $comment->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $comments->pagination()?>