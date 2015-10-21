<h1>ความรู้วิชาการ</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><th>หมวดหมู่</th><td><?php echo form_dropdown('category_id',$knowledges->category->get_option(),@$_POST['category_id'],'','ทั้งหมด') ?></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $knowledges->pagination()?>
<table class="list">
	<tr>
		<th>แสดง</th>
		<th>หัวข้อ</th>
		<th>โดย</th>
		<th><a rel="lightbox" class="btn" href="categories/admin/categories/knowledges?iframe=true&width=90%&height=90%">หมวดหมู่</a></th>
		<th>หมายเหตุ</th>
		<th width="90"><a class="btn" href="knowledges/admin/knowledges/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($knowledges as $knowledge): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $knowledge->id ?>" <?php echo ($knowledge->status=="approve")?'checked="checked"':'' ?> <?php echo ($_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><?php echo lang_decode($knowledge->title,'th');?></td>
		<td><?php echo $knowledge->user->display?></td>
		<td><?php echo lang_decode($knowledge->category->name,'') ?></td>
		<td><?php echo approve_comment($knowledge) ?></td>
		<td>
			<a class="btn" href="knowledges/admin/knowledges/form/<?php echo $knowledge->id?>" >แก้ไข</a> 
			<a class="btn" href="knowledges/admin/knowledges/delete/<?php echo $knowledge->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
		
	</table>
<?php echo $knowledges->pagination()?>