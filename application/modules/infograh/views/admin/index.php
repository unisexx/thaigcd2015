<h1>

<a href="infograh/admin/infograh">Infographic</a> »
 <?php echo lang_decode($infograh->title,'')?>
 	
 </h1>
<?php echo $infograh->pagination()?>

<table class="list">
	<tr>
		<th>ภาพ</th>
		<th>ชื่อภาพ</th>
		<th>วันที่สร้าง</th>
		<th width="90">
		<a class="btn" href="infograh/admin/infograh/form">เพิ่มรายการ</a>
		</th>
	</tr>
	
	<?php foreach($infograh as $data): ?>
	
	<tr id="gallery-list" <?php echo cycle()?>>
		<td>
			<!--<a rel="lightbox[gallery]" href="uploads/infograh/image/<?php echo $data->image?>">-->
			
				<img src="uploads/infograh/image/<?php echo $data->image?>">
				
			<!--</a>-->
		</td>
		<td><?php echo $data->title?></td>
		<td><?php echo mysql_to_th($data->created,'S',TRUE)?></td>
		<td>
			<a class="btn" href="infograh/admin/infograh/form/<?php echo $data->id?>" >แก้ไข</a> 
			<a class="btn" href="infograh/admin/infograh/delete/<?php echo $data->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	
	<?php endforeach; ?>
	
</table>

<?php echo $infograh->pagination()?>
