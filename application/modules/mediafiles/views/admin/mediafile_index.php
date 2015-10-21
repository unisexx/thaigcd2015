<h1>สื่อมัลติมีเดีย</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td>
			<th>ประเภท</th><td><?php echo form_dropdown('category_id',$mediafiles->category->get_option(),@$_GET['category_id'],'','ทั้งหมด') ?></td>
			<td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $mediafiles->pagination()?>
<table class="list">
	<tr>
		<th width="70">แสดง</th>
		<th>หัวข้อ</th>
		<th>
			<?php if(is_superadmin()): ?>
			<a rel="lightbox" class="btn" href="categories/admin/categories/mediafiles?iframe=true&width=90%&height=90%">หมวดหมู่</a>
			<?php else: ?>
			หมวดหมู่
			<?php endif; ?>
		</th>
		<th class="mark">หมายเหตุ</th>
		<th width="90"><a class="btn" href="mediafiles/admin/mediafiles/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach ($mediafiles as $mediafile):?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $mediafile->id ?>" <?php echo ($mediafile->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><?php echo lang_decode($mediafile->title) ?><?php echo owner_name($mediafile)?></td>
		<td><?php echo anchor('mediafiles/admin/mediafiles?category_id='.$mediafile->category_id,lang_decode($mediafile->category->name,'th')) ?></td>
		<td><?php echo approve_comment($mediafile) ?></td>
		<td>
			<a class="btn" href="mediafiles/admin/mediafiles/form/<?php echo $mediafile->id?>" >แก้ไข</a> 
			<a class="btn" href="mediafiles/admin/mediafiles/delete/<?php echo $mediafile->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $mediafiles->pagination()?>