<ul id="breadcrumb">
	<li><a href="#">ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="officer">รายชื่อผู้อบรม</a></li>
	<li><a href="officer/form/<?php echo $user->id ?>" ><?php echo ($user->id)?'แก้ไขผู้อบรม':'เพิ่มผู้อบรม' ?></a></li>
</ul>
<div id="content">
<form method="post" action="officer/save/<?php echo $user->id?>" >
<table class="form tab">
	<tr>
		<th>อีเมล์ล็อคอิน</th>
		<td><?php echo ($user->id)?$user->username:form_input('username',$user->username)?></td>
	</tr>
	<tr>
		<th>รหัสผ่าน</th>
		<td><?php echo form_password('password',$user->password)?></td>
	</tr>
	<tr>
		<th>ยืนยันรหัสผ่าน</th>
		<td><?php echo form_password('_password',$user->password)?></td>
	</tr>
	<tr>
		<th>ชื่อ</th>
		<td><?php echo form_input('first_name',$user->profile->first_name)?></td>
	</tr>
	<tr>
		<th>นามสกุล</th>
		<td><?php echo form_input('last_name',$user->profile->last_name)?></td>
	</tr>
	<tr>
		<th>เพศ</th>
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
		<th>วันเกิด</th>
		<td><?php echo form_input('birth_day',$user->profile->birth_day,'class="datepicker"')?></td>
	</tr>
	<tr>
		<th>บัตรประชาชน</th>
		<td><?php echo form_input('idcard',$user->profile->idcard,'maxlength="13"')?></td>
	</tr>
	<tr>
		<th>ตำแหน่ง</th>
		<td><?php echo form_input('position',$user->profile->position)?></td>
	</tr>
	<tr>
		<th>ระดับ</th>
		<td><?php echo form_input('level',$user->profile->level)?></td>
	</tr>
	<tr>
		<th>หน่วยงาน</th>
		<td><?php echo form_dropdown('agency_id',get_option('id','name','agencies'),$user->profile->agency_id) ?></td>
	</tr>
	<tr>
		<th>จังหวัด</th>
		<td><?php echo form_dropdown('province_id',get_option('id','name','provinces','order by id asc'),$user->profile->province_id) ?></td>
	</tr>
	<tr>
		<th>โทรศัพท์</th>
		<td><?php echo form_input('phone',$user->profile->phone)?></td>
	</tr>
	<tr>
		<th>มือถือ</th>
		<td><?php echo form_input('mobile',$user->profile->mobile)?></td>
	</tr>
	<tr>
		<th></th>
		<td><?php echo form_submit('',lang('btn_submit'),'class="button"')?></td>
	</tr>
</table>

</form>
</div>