<h1>ข่าวสารผู้บริหาร</h1>
<?php include('_menu.php');?><br>
<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>ค้นหา</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>

<?php echo $executives->pagination()?>
<table class="list">
	<tr>
		<th width="70">แสดง</th>
		<th>หัวข้อ</th>
		<th class="mark">หมายเหตุ</th>
		<th width="90"><a class="btn" href="executives/admin/executives/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($executives as $executive): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $executive->id ?>" <?php echo ($executive->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><?php echo lang_decode($executive->title,'th');?><?php echo owner_name($executive)?></td>
		<td><?php echo approve_comment($executive) ?></td>
		<td>
			<a class="btn" href="executives/admin/executives/form/<?php echo $executive->id?>" >แก้ไข</a> 
			<a class="btn" href="executives/admin/executives/delete/<?php echo $executive->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
		
	</table>
<?php echo $executives->pagination()?>