<script type="text/javascript" src="themes/gcdnew/js/jquery.validate.min.js"></script>
<script language="javascript">
$(function(){
	$("input[name=level_id]").click(function(){
		if($(this).val()=="7")
		{
			$("tr.type2").show();
			$("tr.type3").hide();
			$("input[name=code]").removeClass('error').rules("remove","required");
			$("input[name=position]").rules("add",{required: true,messages:{required: "กรุณากรอกตำแหน่งค่ะ"}});
			$("input[name=level]").rules("add",{required: true,messages:{required: "กรุณากรอกตำแหน่งค่ะ"}});
			$("select[name=dept]").rules("add",{required: true,messages:{required: "กรุณาเลือกหน่วยงานค่ะ"}});
			$("select[name=province]").rules("add",{required: true,messages:{required: "กรุณาเลือกจังหวัดค่ะ"}});
		}
		else if($(this).val()=="4")
		{
			$("tr.type3").show();
			$("tr.type2").hide();
			$("input[name=code]").rules("add",{required: true,messages:{required: "กรุณากรอกรหัสเจ้าหน้าที่ค่ะ"}});
			$("input[name=position]").removeClass('error').rules("remove","required");
			$("input[name=level]").removeClass('error').rules("remove","required");
			$("select[name=dept]").removeClass('error').rules("remove","required");
			$("select[name=province]").removeClass('error').rules("remove","required");
		}
		else
		{
			$("tr.type2").hide();
			$("tr.type3").hide();
			$("input[name=code]").removeClass('error').rules("remove","required");
			$("input[name=position]").removeClass('error').rules("remove","required");
			$("input[name=level]").removeClass('error').rules("remove","required");
			$("select[name=dept]").removeClass('error').rules("remove","required");
			$("select[name=province]").removeClass('error').rules("remove","required");
		}
	})

	$("#frmRegister").validate({
	rules:
	{
		username:
		{
			required: true,
			email: true,
			remote: "users/check_email"
		},
		display:
		{
			required: true,
			remote: "users/check_display"
		},
		password:
		{
			required: true,
			minlength: 6
		},
		_password:
		{
			equalTo: "#inputpassword"
		},
		first_name:
		{
			required: true
		},
		last_name:
		{
			required: true
		},
		birth_day:
		{
			required: true
		},
		captcha:
		{
			required: true,
			remote: "users/check_captcha"
		}
	},
	messages:
	{
		username:
		{
			required: "กรุณากรอกอีเมล์ค่ะ",
			email: "กรุณากรอกอีเมล์ให้ถูกต้องค่ะ",
			remote: "อีเมล์นี้ไม่สามารถใช้งานได้"
		},
		display:
		{
			required: "กรุณากรอกชื่อผู้ใช้ค่ะ",
			remote: "ชื่อผู้ใช้นี้ไม่สามารถใช้งานได้"
		},
		password:
		{
			required: "กรุณากรอกรหัสผ่านค่ะ",
			minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษรค่ะ"
		},
		_password:
		{
			equalTo: "กรุณากรอกรหัสผ่านให้ตรงกันทั้ง 2 ช่องค่ะ"
		},
		first_name:
		{
			required: "กรุณากรอกชื่อค่ะ"
		},
		last_name:
		{
			required: "กรุณากรอกนามสกุลค่ะ"
		},
		birth_day:
		{
			required: "กรุณากรอกวันเกิดค่ะ"
		},
		captcha:
		{
			required: "กรุณากรอกตัวอักษรตัวที่เห็นในภาพค่ะ",
			remote: "กรุณากรอกตัวอักษรให้ตรงกับภาพค่ะ"
		}
	}
	});
});
</script>
<div class="topic"><img width="200" height="25" src="<?php echo topic("topic_register.png")?>"></div>
<div id="data">


	<div class="contact_form">

			<form class="form-horizontal"  id="frmRegister" method="post" action="users/signup">

						  <div class="form-group">
						    <label for="inputUsername" class="col-sm-2 control-label"><strong>อีเมล์ล๊อคอิน : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputUsername" name="username" placeholder="อีเมล์ล๊อคอิน" autocomplete="off" style="width:600px;" required>
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputUsername" class="col-sm-2 control-label"><strong>ชื่อในระบบ : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputdisplay" name="display" placeholder="ชื่อในระบบ" autocomplete="off" style="width:600px;" required>
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">พิมพ์รหัสผ่าน :<span class="TxtRed"> *</span></strong></label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" id="inputpassword" name="password" placeholder="password" autocomplete="off" style="width:600px;" required>
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>ยืนยันรหัสผ่าน : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" id="input_password" name="_password" placeholder="password" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">โทรศัพท์</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputtelephone" name="telephone" placeholder="โทรศัพท์" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">ประเภท</label>
						    <div class="col-sm-10">
						      <span style="padding-right:15px;">
		                        <input type="radio" name="level_id" value="5" checked="checked"/>
		                        ประชาชนทั่วไป
								<input type="radio" name="level_id" value="4" />
		                        เจ้าหน้าที่สำนักโรคติดต่อทั่วไป
		                        <input type="radio" name="level_id" value="7" />
		                        เจ้าหน้าที่สาธารณสุข
		                      </span>
						    </div>
						  </div>

						<div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>ชื่อ : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputfirst_name" name="first_name" placeholder="ชื่อ" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>

						    <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>นามสกุล : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputlast_name" name="last_name" placeholder="นามสกุล" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>

						  <div class="form-group" class="type3" style="display:none;">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>กลุ่มงาน : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <?php echo form_dropdown('group_id',get_option('id','name','groups','order by id asc')) ?>
						    </div>
						  </div>

						  <div class="form-group" class="type3" style="display:none;">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>รหัสเจ้าหน้าที่ : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputcode" name="code" placeholder="รหัสเจ้าหน้าที่" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>

						  <div class="form-group" class="type2" style="display:none;">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>ตำแหน่ง : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputposition" name="position" placeholder="ตำแหน่ง" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>


						  <div class="form-group" class="type2" style="display:none;">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>ระดับ : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputlevel" name="level" placeholder="ระดับ" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>

						  <div class="form-group" class="type2" style="display:none;">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>หน่วยงาน : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <?php echo form_dropdown('agency_id',get_option('id','name','agencies','order by id asc')) ?>
						    </div>
						  </div>


						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>เพศ : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
								<span style="padding-right:15px;">
							  		<input type="radio" name="gender" value="m" checked="checked" />
							  		<img src="themes/gcdnew/images/male.jpg" width="16" height="16" style="display:inline !important;" />
							  	</span>
								<span>
									<input type="radio" name="gender" value="f" />
									<img src="themes/gcdnew/images/female.jpg" width="16" height="16" style="display:inline !important;"/>
								</span>
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>วันเกิด : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputbirth_day" name="birth_day" placeholder="วันเกิด" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>บัตรประชาชน :</strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputidcard" name="idcard" placeholder="บัตรประชาชน" autocomplete="off" style="width:400px;" required maxlength="13">
						    </div>
						  </div>

						 <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>พิมพ์ตัวอักษรที่คุณเห็นในภาพ :</strong></label>
						    <div class="col-sm-10">

						      <img src="users/captcha" />
						      <Br>
						      <strong>พิมพ์ตัวอักษร</strong></span><strong> : <span class="TxtRed">*</span></strong>
						      <input type="text" class="form-control" id="inputcaptcha" name="captcha" placeholder="captcha" autocomplete="off" style="width:400px;">

						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>ช่องทางรับข่าวสาร :</strong></label>
						    <div class="col-sm-10">
						      <strong>เลือกข่าวสาร :</strong>
						      <?php echo modules::run("newsletters/inc_register"); ?>
						    </div>
						  </div>


						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
				            <a href="home/index">
								<button type="button" class="btn btn-red" >ยกเลิก</button>
                             </a>
						      <button type="submit" class="btn btn-primary">ตกลง</button>
						    </div>
						  </div>

					</form>
			</div>

</div>
