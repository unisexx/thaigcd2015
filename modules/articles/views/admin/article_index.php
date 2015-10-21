<h1>บทความ</h1>
<?php echo $articles->pagination()?>
<table class="list">
	<tr>
		<th>หัวข้อ</th>
		<th>โดย</th>
		<th><a rel="lightbox" class="btn" href="categories/admin/categories/article?iframe=true&width=90%&height=90%">หมวดหมู่</a></th>
		<th width="90"><a class="btn" href="articles/admin/articles/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($articles as $article): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo lang_get($article->title);?></td>
		<td><?php echo $article->user->display?></td>
		<td><?php echo $article->category->breadcrumb('articles/admin/articles/')?></td>
		<td>
			<a class="btn" href="articles/admin/articles/form/<?php echo $article->id?>" >แก้ไข</a> 
			<a class="btn" href="articles/admin/articles/delete/<?php echo $article->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
		
	</table>
<?php echo $articles->pagination()?>