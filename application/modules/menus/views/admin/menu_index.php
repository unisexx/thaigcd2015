<h1>จัดการเมนู</h1>
<?php echo $menus->pagination()?>
<form id="order" action="menus/admin/menus/save" method="post">
<table class="list">
	<tr>
		<th>แสดง</th>
		<th>ลำดับ</th>
		<th>โลโก้</th>
		<th>ชื่อเมนู</th>
		<th>โมดูล</th>
		<th>หมายเหตุ</th>
		<th width="90"><a class="btn" href="menus/admin/menus/form">เพิ่มรายการ</a></th>
	</tr>
	
	<?php foreach ($menus as $menu):?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $menu->id ?>" <?php echo ($menu->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td>
			<input type="text" name="orderlist[]" size="3" value="<?php echo $menu->orderlist?>">
			<input type="hidden" name="orderid[]" value="<?php echo $menu->id ?>">
		</td>
		<td><img src="uploads/icon/<?php echo $menu->icon?>"></td>
		<td><?php echo lang_decode($menu->title,'');?></td>
		<td><?php echo $menu->url ?></td>
		<td><?php echo approve_comment($menu) ?></td>
		<td>
			<a class="btn" href="menus/admin/menus/form/<?php echo $menu->id?>" >แก้ไข</a> 
			<a class="btn" href="menus/admin/menus/delete/<?php echo $menu->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
	
</table>
<br>
<input type="submit" value="บันทึก">
</form>
<?php echo $menus->pagination()?>