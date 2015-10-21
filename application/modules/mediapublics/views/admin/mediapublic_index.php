<h1>สื่อเผยแพร่</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td>
			<th>หมวดหมู่</th><td><?php echo form_dropdown('category_id',$mediapublics->category->get_option(),@$_GET['category_id'],'','ทั้งหมด') ?></td>
			<td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $mediapublics->pagination()?>
<table class="list">
	<tr>
		<th width="70">แสดง</th>
		<th>หัวข้อ</th>
		<th>
			<?php if(is_superadmin()): ?>
			<a rel="lightbox" class="btn" href="categories/admin/categories/mediapublics?iframe=true&width=90%&height=90%">หมวดหมู่</a>
			<?php else: ?>
			หมวดหมู่
			<?php endif; ?>
		</th>
		<th class="mark">หมายเหตุ</th>
		<th width="90"><a class="btn" href="mediapublics/admin/mediapublics/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($mediapublics as $mediapublic):?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $mediapublic->id ?>" <?php echo ($mediapublic->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><?php echo lang_decode($mediapublic->title)?><?php echo owner_name($mediapublic)?></td>
		<td><?php echo anchor('mediapublics/admin/mediapublics?category_id='.$mediapublic->category_id,lang_decode($mediapublic->category->name,''))?></td>
		<td><?php echo approve_comment($mediapublic) ?></td>
		<td>
			<a class="btn" href="mediapublics/admin/mediapublics/form/<?php echo $mediapublic->id?>" >แก้ไข</a> 
			<a class="btn" href="mediapublics/admin/mediapublics/delete/<?php echo $mediapublic->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<?php echo $mediapublics->pagination()?>