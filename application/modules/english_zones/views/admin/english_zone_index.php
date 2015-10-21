<h1>English Zone</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr>
				<th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td>
				<td><input type="submit" value="ค้นหา" /></td>
			</tr>
		</table>
	</form>
</div>
<?php echo $english_zones->pagination()?>
<table class="list">
	<tr>
		<th width="70">แสดง</th>
		<th>หัวข้อ</th>
		<th class="mark">หมายเหตุ</th>
		<th width="90"><a class="btn" href="english_zones/admin/english_zones/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($english_zones as $english_zone): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $english_zone->id ?>" <?php echo ($english_zone->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td>
			<?php echo $english_zone->title ?><?php echo owner_name($english_zone)?>
		</td>
		<td><?php echo approve_comment($english_zone) ?></td>
		<td>
			<a class="btn" href="english_zones/admin/english_zones/form/<?php echo $english_zone->id?>" >แก้ไข</a> 
			<a class="btn" href="english_zones/admin/english_zones/delete/<?php echo $english_zone->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $english_zones->pagination()?>