<script type="text/javascript">
	$(function(){
		$('.all input:checkbox').click(function(){
			if(this.checked)
			{
				$(this).parent().siblings().find("input:checkbox").attr('checked','');
			}
			else
			{
				$(this).parent().siblings().find("input:checkbox").attr('checked','checked');
			}
		})
	})
</script>
<h1>สิทธิการใช้งาน</h1>
<form method="post" action="users/admin/levels/save/<?php echo $level->id?>" enctype="multipart/form-data">
	<table class="form">
		<tr><th>Level :</th><td><input type="text" name="level" value="<?php echo $level->level ?>" /></td></tr>
		<tr><th>Is Admin :</th><td><input type="checkbox" name="is_admin" value="1" <?php echo ($level->is_admin == "1")?'checked="checked"':'' ?>?></td></tr>
		<tr><th>Is Approver :</th><td><input type="checkbox" name="approve" value="1" <?php echo ($level->approve == "1")?'checked="checked"':'' ?>?></td></tr>
		
		
	</table>
	<table class="list" style="margin:0 0 20px 0;">
		<tr><th style="width:250px;"></th><th style="width:100px;">ทั้งหมด</th><th style="width:100px;">ตามกลุ่มงาน</th><th style="width:100px;">เฉพาะของตัวเอง</th><th></th></tr>
		<tr>
			<td><strong>มุมมองการใช้งาน</strong></td>
			<td><input type="radio" name="view" value="1" <?php echo ($level->view == "1")?'checked="checked"':'' ?>?></td>
			<td><input type="radio" name="view" value="2" <?php echo ($level->view == "2")?'checked="checked"':'' ?>?></td>
			<td><input type="radio" name="view" value="3" <?php echo ($level->view == "3")?'checked="checked"':'' ?>?></td>
			<td></td>
		</tr>
	</table>
	<table class="list">
		<tr><th style="width:250px;"></th><th style="width:100px;">เข้าถึง</th><th style="width:100px;">เพิ่ม</th><th style="width:100px;">แก้ไข</th><th style="width:100px;">ลบ</th><th style="width:100px;">เลือกทั้งหมด</th><th></th></tr>
		<?php foreach($modules as $module): ?>
		<tr <?php echo cycle() ?>>
			<td><?php echo $module->name ?></td>
			<td><input type="checkbox" name="module[<?php echo $module->module?>][index]" value="1" <?php echo (@$level->auth->{$module->module}->{'index'} == 1)?'checked="checked"':''; ?> /></td>
			<td><input type="checkbox" name="module[<?php echo $module->module?>][add]" value="1" <?php echo (@$level->auth->{$module->module}->{'add'} == 1)?'checked="checked"':''; ?> /></td>
			<td><input type="checkbox" name="module[<?php echo $module->module?>][edit]" value="1" <?php echo (@$level->auth->{$module->module}->{'edit'} == 1)?'checked="checked"':''; ?> /></td>
			<td><input type="checkbox" name="module[<?php echo $module->module?>][delete]" value="1" <?php echo (@$level->auth->{$module->module}->{'delete'} == 1)?'checked="checked"':''; ?> /></td>
			<td class="all"><input type="checkbox" name="all" value="1" <?php echo (@$level->auth->{$module->module}->{'index'} + @$level->auth->{$module->module}->{'add'} + @$level->auth->{$module->module}->{'edit'} + @$level->auth->{$module->module}->{'delete'} == 4)?'checked="checked"':''; ?> /></td>
			<td></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<div style="padding:5px;">
		<input type="submit" value="บันทึก" />
	</div>
</form>
