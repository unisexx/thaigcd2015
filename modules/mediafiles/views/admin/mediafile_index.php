<h1>สื่อมัลติมีเดีย</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><th>ประเภท</th><td><?php echo form_dropdown('category_id',$mediafiles->category->get_option(),@$_POST['category_id'],'','ทั้งหมด') ?></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<table class="list">
	<tr>
		<th>แสดง</th>
		<th>หัวข้อ</th>
		<th>โดย</th>
		<th><a rel="lightbox" class="btn" href="categories/admin/categories/mediafiles?iframe=true&width=90%&height=90%">หมวดหมู่</a></th>
		<th width="90"><a class="btn" href="mediafiles/admin/mediafiles/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach ($mediafiles as $mediafile):?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $mediafile->id ?>" <?php echo ($mediafile->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><?php echo $mediafile->title ?></td>
		<td><?php echo $mediafile->user->display ?></td>
		<td><?php echo lang_decode($mediafile->category->name,'') ?></td>
		<td>
			<a class="btn" href="mediafiles/admin/mediafiles/form/<?php echo $mediafile->id?>" >แก้ไข</a> 
			<a class="btn" href="mediafiles/admin/mediafiles/delete/<?php echo $mediafile->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>