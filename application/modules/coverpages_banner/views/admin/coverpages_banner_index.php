<h1>

<a href="coverpages_banner/admin/coverpages_banner">แบนเนอร์หน้าแรก</a> »
 <?php echo lang_decode($infograh->title,'')?>
 	
 </h1>
<?php echo $rs->pagination()?>

<table class="list">
	<tr>
		<th>ภาพ</th>
		<th>ชื่อภาพ</th>
		<th>วันที่สร้าง</th>
		<th width="90">
		<a class="btn" href="coverpages_banner/admin/coverpages_banner/form">เพิ่มรายการ</a>
		</th>
	</tr>
	
	<?php foreach($rs as $data): ?>
	
	<tr id="gallery-list" <?php echo cycle()?>>
		<td>
			<!--<a rel="lightbox[gallery]" href="uploads/infograh/image/<?php echo $data->image?>">-->
			
				<img src="uploads/coverpages_banner/<?php echo $data->image?>">
				
			<!--</a>-->
		</td>
		<td><?php echo $data->name?></td>
		<td><?php echo mysql_to_th($data->created,'S',TRUE)?></td>
		<td>
			<a class="btn" href="coverpages_banner/admin/coverpages_banner/form/<?php echo $data->id?>" >แก้ไข</a> 
			<a class="btn" href="coverpages_banner/admin/coverpages_banner/delete/<?php echo $data->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	
	<?php endforeach; ?>
	
</table>

<?php echo $rs->pagination()?>
