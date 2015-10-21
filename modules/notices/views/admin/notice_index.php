<h1>ประกาศ/จัดจ้าง</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><th>สถานะ</th><td><?php echo form_dropdown('category_id',$notices->category->get_option(),@$_POST['category_id'],'','ทั้งหมด') ?></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $notices->pagination()?>
<table class="list">
	<tr>
		<th>แสดง</th>
		<th>หัวข้อ</th>
		<th>โดย</th>
		<th>สถานะ</th>
		<th>หมายเหตุ</th>
		<th width="90"><a class="btn" href="notices/admin/notices/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($notices as $notice): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $notice->id ?>" <?php echo ($notice->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><?php echo lang_decode($notice->title,'th');?></td>
		<td><?php echo $notice->user->display?></td>
		<td><?php echo lang_decode($notice->category->name,'th') ?></td>
		<td><?php echo approve_comment($notice) ?></td>
		<td>
			<a class="btn" href="notices/admin/notices/form/<?php echo $notice->id?>" >แก้ไข</a> 
			<a class="btn" href="notices/admin/notices/delete/<?php echo $notice->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
		
	</table>
<?php echo $notices->pagination()?>