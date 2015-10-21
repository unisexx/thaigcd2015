<h1>ไฮไลท์</h1>
<?php echo $hilights->pagination()?>
<table class="list">
	<tr>
		<th>แสดง</th>
		<th>รูปภาพ</th>
		<th>หัวข้อ</th>
		<th>หมายเหตุ</th>
		<th width="90"><a class="btn" href="hilights/admin/hilights/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($hilights as $hilight): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $hilight->id ?>" <?php echo ($hilight->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><img src="uploads/hilight/<?php echo $hilight->image;?>" style="width:200px;" /></td>
		<td><?php echo lang_decode($hilight->title,'th');?><?php echo owner_name($hilight)?></td>
		<td><?php echo approve_comment($hilight)?></td>
		<td>
			<a class="btn" href="hilights/admin/hilights/form/<?php echo $hilight->id?>" >แก้ไข</a> 
			<a class="btn" href="hilights/admin/hilights/delete/<?php echo $hilight->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
		
	</table>
<?php echo $hilights->pagination()?>