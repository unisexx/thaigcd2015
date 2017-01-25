<h1>

<a href="indicators/admin/indicators">ตัวชี้วัด</a> »
 <?php echo lang_decode($rs->title,'')?>
 	
 </h1>
<?php echo $rs->pagination()?>

<table class="list">
	<tr>
		<th>ประจำปี</th>
		<th>ประเภท</th>
		<th>ชื่อหัวข้อ</th>
		<th>วันที่เพิ่ม</th>
		<th width="90">
		<a class="btn" href="indicators/admin/indicators/form">เพิ่มรายการ</a>
		</th>
	</tr>
	
	<?php foreach($rs as $data): ?>
	
	<tr id="gallery-list" <?php echo cycle()?>>
	
		<td><?php echo $data->Indicators_year; ?></td>
		
		<td>
		
		<?php 
		
/*		$itype=$data->Indicators_type_id; 
		
		$rs_type = new Indicator_type($itype);
		echo $rs_type->name;*/
		
		echo $data->Indicators_type_id;
		
		?>
			
		</td>
		<td><?php echo $data->title; ?></td>
		<td><?php echo mysql_to_th($data->created,'S',TRUE)?></td>
		<td>
			<a class="btn" href="indicators/admin/indicators/form/<?php echo $data->id?>" >แก้ไข</a> 
			<a class="btn" href="indicators/admin/indicators/delete/<?php echo $data->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	
	<?php endforeach; ?>
	
</table>

<?php echo $rs->pagination()?>
