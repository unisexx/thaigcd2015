<h1><a href="galleries/admin/categories">ภาพถ่ายกิจกรรม</a> » <?php echo lang_decode($categories->name,'')?></h1>
<?php echo $galleries->pagination()?>
<table class="list">
	<tr>
		<th>ภาพ</th>
		<th>ชื่อภาพ</th>
		<th>โดย</th>
		<th width="90"><a class="btn" href="galleries/admin/galleries/<?php echo $categories->id?>/form">เพิ่มรายการ</a></th>
	</tr>
	
	<?php foreach($galleries as $gallery): ?>
	<tr id="gallery-list" <?php echo cycle()?>>
		<td><a rel="lightbox[gallery]" href="uploads/galleries/<?php echo $gallery->image?>"><img src="uploads/galleries/<?php echo $gallery->image?>"></a></td>
		<td><?php echo $gallery->title?></td>
		<td><?php echo $gallery->user->display?></td>
		<td>
			<a class="btn" href="galleries/admin/galleries/<?php echo $galleries->category->id?>/form/<?php echo $gallery->id?>" >แก้ไข</a> 
			<a class="btn" href="galleries/admin/galleries/delete/<?php echo $galleries->category->id?>/<?php echo $gallery->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $galleries->pagination()?>
