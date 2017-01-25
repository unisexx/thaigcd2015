<h1>

<a href="yearbook/admin/yearbook">รายงานประจำปี</a> »
 <?php echo lang_decode($rs->title,'')?>
 	
 </h1>
<?php echo $rs->pagination()?>

<table class="list">
	<tr>
		<th>ประจำปี</th>
		<th>ชื่อหัวข้อ</th>
		<th>วันที่เพิ่ม</th>
		<th width="90">
		<a class="btn" href="yearbook/admin/yearbook/form">เพิ่มรายการ</a>
		</th>
	</tr>
	
	<?php foreach($rs as $data): ?>
	
	<tr id="gallery-list" <?php echo cycle()?>>
	
		<td><?php echo $data->yearbook_year; ?></td>
		
		<td><?php echo $data->title; ?></td>
		<td><?php echo mysql_to_th($data->created,'S',TRUE)?></td>
		<td>
			<a class="btn" href="yearbook/admin/yearbook/form/<?php echo $data->id?>" >แก้ไข</a> 
			<a class="btn" href="yearbook/admin/yearbook/delete/<?php echo $data->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	
	<?php endforeach; ?>
	
</table>

<?php echo $rs->pagination()?>
