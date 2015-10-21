<h1>กฎหมายที่เกี่ยวข้อง</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><th>หมวดหมู่</th><td><?php echo form_dropdown('category_id',$laws->category->get_option(),@$_POST['category_id'],'','ทั้งหมด') ?></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $laws->pagination()?>
<table class="list">
	<tr>
		<th>แสดง</th>
		<th>หัวข้อ</th>
		<th>โดย</th>
		<th><a rel="lightbox" class="btn" href="categories/admin/categories/laws?iframe=true&width=90%&height=90%">หมวดหมู่</a></th>
		<th>หมายเหตุ</th>
		<th width="90"><a class="btn" href="laws/admin/laws/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($laws as $law): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $law->id ?>" <?php echo ($law->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><?php echo lang_decode($law->title,'th');?></td>
		<td><?php echo $law->user->display?></td>
		<td><?php echo lang_decode($law->category->name,'') ?></td>
		<td><?php echo approve_comment($law) ?></td>
		<td>
			<a class="btn" href="laws/admin/laws/form/<?php echo $law->id?>" >แก้ไข</a> 
			<a class="btn" href="laws/admin/laws/delete/<?php echo $law->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
		
	</table>
<?php echo $laws->pagination()?>