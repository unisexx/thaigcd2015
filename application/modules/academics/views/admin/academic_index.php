<h1>ศูนย์รวมวิชาการ</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td>
			<th>หมวดหมู่</th><td><?php echo form_dropdown('category_id',$academics->category->get_option(),@$_GET['category_id'],'','ทั้งหมด') ?></td>
			<td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $academics->pagination()?>
<table class="list">
	<tr>
		<th width="70">แสดง</th>
		<th>หัวข้อ</th>
		<th>
			<?php if(is_superadmin()): ?>
			<a rel="lightbox" class="btn" href="categories/admin/categories/academics?iframe=true&width=90%&height=90%">หมวดหมู่</a>
			<?php else: ?>
			หมวดหมู่
			<?php endif; ?>
		</th>
		<th class="mark">หมายเหตุ</th>
		<th width="90"><a class="btn" href="academics/admin/academics/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($academics as $academic):?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $academic->id ?>" <?php echo ($academic->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><?php echo lang_decode($academic->title)?><?php echo owner_name($academics)?></td>
		<td><?php echo anchor('academics/admin/academics?category_id='.$academic->category_id,lang_decode($academic->category->name,''))?></td>
		<td><?php echo approve_comment($academic) ?></td>
		<td>
			<a class="btn" href="academics/admin/academics/form/<?php echo $academic->id?>" >แก้ไข</a> 
			<a class="btn" href="academics/admin/academics/delete/<?php echo $academic->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<?php echo $academics->pagination()?>