<h1>ข่าวประชาสัมพันธ์</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td><th>หมวดหมู่</th><td><?php echo form_dropdown('category_id',$informations->category->get_option(),@$_GET['category_id'],'','ทั้งหมด') ?></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $informations->pagination()?>
<table class="list">
	<tr>
		<th width="70">แสดง</th>
		<th>หัวข้อ</th>
		<th>
			<?php if(is_superadmin()): ?>
			<a rel="lightbox" class="btn" href="categories/admin/categories/informations?iframe=true&width=90%&height=90%">หมวดหมู่</a>
			<?php else: ?>
			หมวดหมู่
			<?php endif; ?>
		</th>
		<th class="mark">หมายเหตุ</th>
		<th width="90"><a class="btn" href="informations/admin/informations/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($informations as $information): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $information->id ?>" <?php echo ($information->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td>
			<?php echo lang_decode($information->title,'th');?><?php echo owner_name($information)?>
			<?php if(is_superadmin()): ?>
			<div>
			<?php if($information->stick == 0):?>
				<a href="informations/admin/informations/stick_thread/<?php echo $information->id?>">ปักหมุด</a>
			<?php else:?>
				<a href="informations/admin/informations/unstick_thread/<?php echo $information->id?>">ยกเลิกปักหมุด</a>
			<?php endif;?>
			</div>
			<?php endif;?>
		</td>
		<td><?php echo anchor('informations/admin/informations?category_id='.$information->category_id,lang_decode($information->category->name,'th')) ?></td>
		<td><?php echo approve_comment($information) ?></td>
		<td>
			<a class="btn" href="informations/admin/informations/form/<?php echo $information->id?>" >แก้ไข</a> 
			<a class="btn" href="informations/admin/informations/delete/<?php echo $information->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $informations->pagination()?>