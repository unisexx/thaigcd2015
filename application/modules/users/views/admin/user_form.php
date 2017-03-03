<script type="text/javascript">
	$(function(){
		if($('select[name=level_id]').val()==5){
				$(".type2").hide();
			}else{
				$(".type2").show();
			}

		$('select[name=level_id]').change(function(){
			if($(this).val()==5){
				$(".type2").hide();
			}else{
				$(".type2").show();
			}
		})
	})
</script>
<h1>สมาชิก</h1>
<form method="post" action="users/admin/users/save/<?php echo $user->id?>" enctype="multipart/form-data">
	<table class="form">
		<tr><th>สถานะ:</th><td>
			<input type="radio" name="m_status" value="active" <?=$user->m_status == 'active' ? 'checked' : '' ;?>> ใช้งาน
			<input type="radio" name="m_status" value="ban" <?=$user->m_status == 'ban' ? 'checked' : '' ;?>> ถูกระงับ
			<input type="radio" name="m_status" value="wait" <?=$user->m_status == 'wait' ? 'checked' : '' ;?>> รอการตรวจสอบ
		</td></tr>
		<tr><th>กลุ่มงาน :</th><td><?php echo form_dropdown('group_id',get_option('id','name','groups','','th'),$user->group->id,'class="text select"',' ')?></td></tr>
		<tr><th>สิทธิ์การเข้าใช้:</th><td><?php echo form_dropdown('level_id',$levels->all_to_assoc('id','level'),$user->level->id,'class="text select"')?></td></tr>
		<tr><th>ชื่อในระบบ:</th><td><input type="text" class="text small" name="display" value="<?php echo $user->display?>"> </td></tr>
		<tr><th>อีเมล์ล็อคอิน:</th><td><input type="text" class="text small" name="username" value="<?php echo $user->username?>"> </td></tr>
		<tr><th>รหัสผ่าน:</th><td><input type="password" class="text small" name="password" value="<?php echo $user->password?>"> </td></tr>
		<tr><th>ยืนยันรหัสผ่าน:</th><td><input type="password" class="text small" name="_password" value="<?php echo $user->password?>"> </td></tr>
		<tr>
		<th>ชื่อ:</th>
		<td><?php echo form_input('first_name',$user->profile->first_name)?></td>
		</tr>
		<tr>
			<th>นามสกุล:</th>
			<td><?php echo form_input('last_name',$user->profile->last_name)?></td>
		</tr>
		<tr>
			<th>เพศ:</th>
			<td><span style="padding-right:15px;">
					<input type="radio" name="gender" value="m" <?php echo ($user->profile->gender == "m")?'checked="checked"':''?> />
					<img src="themes/gcdnew/images/male.jpg" width="16" height="16" />
				</span>
				<span>
					<input type="radio" name="gender" value="f" <?php echo ($user->profile->gender == "f")?'checked="checked"':''?> />
					<img src="themes/gcdnew/images/female.jpg" width="16" height="16" />
				</span>
			</td>
		</tr>
		<tr>
			<th>วันเกิด:</th>
			<td><?php echo form_input('birth_day',DB2Date($user->profile->birth_day),'class="datepicker"')?></td>
		</tr>
		<tr class="type2">
			<th>บัตรประชาชน:</th>
			<td><?php echo form_input('idcard',$user->profile->idcard,'maxlength="13"')?></td>
		</tr>
		<tr class="type2">
			<th>ตำแหน่ง:</th>
			<td><?php echo form_input('position',$user->profile->position)?></td>
		</tr>
		<tr class="type2">
			<th>ระดับ:</th>
			<td><?php echo form_input('level',$user->profile->level)?></td>
		</tr>
		<tr class="type2">
			<th>หน่วยงาน:</th>
			<td><?php echo form_dropdown('agency_id',get_option('id','name','agencies'),$user->profile->agency_id) ?></td>
		</tr>
		<tr class="type2">
			<th>จังหวัด:</th>
			<td><?php echo form_dropdown('province_id',get_option('id','name','provinces','order by id asc'),$user->profile->province_id) ?></td>
		</tr>
		<tr>
			<th>โทรศัพท์:</th>
			<td><?php echo form_input('phone',$user->profile->phone)?></td>
		</tr>
		<tr>
			<th>มือถือ:</th>
			<td><?php echo form_input('mobile',$user->profile->mobile)?></td>
		</tr>
		<tr>
			<th>เจ้าหน้าที่ศูนย์เด็กเล็ก</th>
			<td>
				<?=form_dropdown('nursery',array('0'=>'มองเห็นทุกเขต','1'=>'เจ้าหน้าที่เขต 1','2'=>'เจ้าหน้าที่เขต 2','3'=>'เจ้าหน้าที่เขต 3','4'=>'เจ้าหน้าที่เขต 4','5'=>'เจ้าหน้าที่เขต 5','6'=>'เจ้าหน้าที่เขต 6','7'=>'เจ้าหน้าที่เขต 7','8'=>'เจ้าหน้าที่เขต 8','9'=>'เจ้าหน้าที่เขต 9','10'=>'เจ้าหน้าที่เขต 10','11'=>'เจ้าหน้าที่เขต 11','12'=>'เจ้าหน้าที่เขต 12'),$user->nursery,'','--- เลือก ---');?>
			</td>
		</tr>
		<tr><th></th><td><input type="submit" value="<?php echo lang('btn_submit')?>" class="button" /><?php echo form_back() ?></td></tr>
		<?php echo form_referer() ?>
	</table>
</form>
