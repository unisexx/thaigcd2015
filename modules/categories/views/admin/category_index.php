<h1>หมวดหมู่</h1>
<?php echo $categories->pagination()?>
<table class="list">
	<tr>
		<th>ชื่อ</th>
		<th>รายละเอียด</th>
		<th width="90"><a class="btn" href="categories/admin/categories/<?php echo $module?>/form" class="tiny">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($categories as $category): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo lang_decode($category->name,'')?></td>
		<td><?php echo $category->description;?></td>
		<td>
			<a class="btn" href="categories/admin/categories/<?php echo $module ?>/form/<?php echo $category->id ?>" >แก้ไข</a>
			<a class="btn" href="categories/admin/categories/delete/<?php echo $category->id?>" onclick="return confirm('<?php echo 'หมวดหมู่ย่อยและบทความทั้งหมดในหมวดนี้จะถูกลบโดยอัตโนมัติ\nยืนยันการลบ'?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $categories->pagination()?>
	