<h1>

<a href="executives/admin/executives/index_polls">รับเรื่องร้องเรียน</a> »

 </h1>
<?php echo $rs->pagination()?>

<table class="list">
	<tr>
		<th>ชื่อ</th>
		<th>วันที่เพิ่ม</th>
		<th width="90">
		<!--<a class="btn" href="yearbook/admin/yearbook/form">เพิ่มรายการ</a>-->
		</th>
	</tr>
	
	<?php foreach($rs as $data): ?>
	
	<tr id="gallery-list" <?php echo cycle()?>>
		
		<td><?php echo $data->first_name; ?></td>
		<td><?php echo mysql_to_th($data->updated,'S',TRUE)?></td>
		<td>
			<a class="btn" href="executives/admin/executives/form_pole/<?php echo $data->id?>" >แก้ไข</a> 
			<a class="btn" href="executives/admin/executives/delete_pole/<?php echo $data->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	
	<?php endforeach; ?>
	
</table>

<?php echo $rs->pagination()?>