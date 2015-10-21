<h1>ภาพถ่ายกิจกรรม</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>อัลบั้ม</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $categories->pagination()?>
<table class="list">
	<tr>
		<th>เผยแพร่</th>
		<th>อัลบัม</th>
		<th>จำนวนรูป</th>
		<th>โดย</th>
		<th width="90"><a class="btn" href="galleries/admin/categories/form" class="tiny">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($categories as $category): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $category->id ?>" <?php echo ($category->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><a href="galleries/admin/galleries/index/<?php echo $category->id?>"><?php echo lang_decode($category->name,'')?></a></td>
		<td><?php echo $category->galleries->result_count();?></td>
		<td><?php echo $category->user->display?></td>
		<td>
			<a class="btn" href="galleries/admin/categories/form/<?php echo $category->id ?>" >แก้ไข</a>
			<a class="btn" href="galleries/admin/categories/delete/<?php echo $category->id?>" onclick="return confirm('<?php echo 'หมวดหมู่ย่อยและบทความทั้งหมดในหมวดนี้จะถูกลบโดยอัตโนมัติ\nยืนยันการลบ'?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $categories->pagination()?>