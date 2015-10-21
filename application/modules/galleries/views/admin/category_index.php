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
		<th width="70">แสดง</th>
		<th>อัลบัม</th>
		<th style="text-align:center;" width="90">จำนวนรูป</th>
		
		<th class="mark">หมายเหตุ</th>
		<th width="90"><a class="btn" href="galleries/admin/categories/form" class="tiny">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($categories as $category): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $category->id ?>" <?php echo ($category->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><?php echo lang_decode($category->name,'')?><?php echo owner_name($category)?></td>
		<td style="text-align:center;"><?php echo $category->galleries->result_count();?></td>
		<td><?php echo approve_comment($category) ?></td>
		<td>
			<a class="btn" href="galleries/admin/galleries/index/<?php echo $category->id?>">จัดการรูปภาพ</a><br /><br />
			<a class="btn" href="galleries/admin/categories/form/<?php echo $category->id ?>" >แก้ไข</a>
			<a class="btn" href="galleries/admin/categories/delete/<?php echo $category->id?>" onclick="return confirm('<?php echo 'หมวดหมู่ย่อยและบทความทั้งหมดในหมวดนี้จะถูกลบโดยอัตโนมัติ\nยืนยันการลบ'?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $categories->pagination()?>