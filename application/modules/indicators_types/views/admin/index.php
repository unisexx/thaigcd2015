<h1>

<a href="indicators_types/admin/indicators_types">ประเภทตัวชี้วัด</a> »
 <?php echo lang_decode($rs->name,'')?>
 	
 </h1>
<?php echo $rs->pagination()?>

<table class="list">
	<tr>
		<th>ชื่อหัวข้อ</th>
		<th>วันที่เพิ่ม</th>
		<th width="90">
		<a class="btn" href="indicators_types/admin/indicators_types/form">เพิ่มรายการ</a>
		</th>
	</tr>
	
	<?php foreach($rs as $data): ?>
	
	<tr id="gallery-list" <?php echo cycle()?>>
	
		<td><?php echo $data->name; ?></td>
		<td><?php echo mysql_to_th($data->created,'S',TRUE)?></td>
		<td>
			<a class="btn" href="indicators_types/admin/indicators_types/form/<?php echo $data->id?>" >แก้ไข</a> 
			<a class="btn" href="indicators_types/admin/indicators_types/delete/<?php echo $data->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	
	<?php endforeach; ?>
	
</table>

<?php echo $rs->pagination()?>
