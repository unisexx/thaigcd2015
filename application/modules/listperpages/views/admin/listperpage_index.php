<h1>จัดการลิสต์</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>&nbsp;</td></tr>
		</table>
	</form>
</div>

<form id="list" action="listperpages/admin/listperpages/save" method="post">
<table class="list">
	<tr>
		<th>โมดูล</th>
		<th>แสดงแถว</th>
	</tr>
	
	<?php foreach($modules as $module):?>
		<tr <?php echo cycle()?>>
			<td><?php echo $module->name?></td>
			<td><input type="text" name="listperpage[]" size="5" value="<?php echo $module->listperpage?>"><input type="hidden" name="listid[]" value="<?php echo $module->id ?>"></td>
		</tr>
	<?php endforeach;?>
</table>
<br>
<input type="submit" value="บันทึก">
</form>