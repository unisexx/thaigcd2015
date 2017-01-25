<h1>

<a href="modules_infograph/admin/modules_infograph">infograph</a> »
 <?php echo lang_decode($infograh->title,'')?>
 	
 </h1>
<?php echo $rs->pagination()?>

<table class="list">
	<tr>
		<th>ภาพ</th>
        <th>File</th>
		<th>วันที่สร้าง</th>
		<th width="90">
		<a class="btn" href="modules_infograph/admin/modules_infograph/form">เพิ่มรายการ</a>
		</th>
	</tr>
	
	<?php foreach($rs as $data): ?>
	
	<tr id="gallery-list" <?php echo cycle()?>>
		<td><img src="uploads/modules_infograph/image/<?php echo $data->image; ?>"></td>
        <td><?php echo $data->file_pdf; ?></td>
		<td><?php echo mysql_to_th($data->created,'S',TRUE); ?></td>
		<td>
			<a class="btn" href="modules_infograph/admin/modules_infograph/form/<?php echo $data->id?>" >แก้ไข</a> 
			<a class="btn" href="modules_infograph/admin/modules_infograph/delete/<?php echo $data->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	
	<?php endforeach; ?>
	
</table>

<?php echo $rs->pagination()?>
