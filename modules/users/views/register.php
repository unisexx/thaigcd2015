<script type="text/javascript" src="themes/gcdnew/js/jquery.validate.min.js"></script>
<script language="javascript">
$(function(){
	$("input[name=type]").click(function(){
		if($(this).val()=="เจ้าหน้าที่สาธารณสุข")
		{
			$("tr.type2").show();
			$("input[name=position]").rules("add",{required: true,messages:{required: "กรุณากรอกตำแหน่งค่ะ"}});
			$("input[name=level]").rules("add",{required: true,messages:{required: "กรุณากรอกตำแหน่งค่ะ"}});
			$("select[name=dept]").rules("add",{required: true,messages:{required: "กรุณาเลือกหน่วยงานค่ะ"}});
			$("select[name=province]").rules("add",{required: true,messages:{required: "กรุณาเลือกจังหวัดค่ะ"}});
		}
		else
		{
			$("tr.type2").hide();
			$("input[name=position]").removeClass('error').rules("remove","required");
			$("input[name=level]").removeClass('error').rules("remove","required");
			$("select[name=dept]").removeClass('error').rules("remove","required");
			$("select[name=province]").removeClass('error').rules("remove","required");
		}
	})
	
	$("#frmRegister").validate({
	rules: 
	{
		email: 
		{ 
			required: true,
			email: true,
			remote: "users/check_email"
		},
		password: 
		{
			required: true,
			minlength: 8
		},
		_password:
		{
			equalTo: "#password"
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
		email: 
		{ 
			required: "กรุณากรอกอีเมล์ค่ะ",
			email: "กรุณากรอกอีเมล์ให้ถูกต้องค่ะ",
			remote: "อีเมล์นี้ไม่สามารถใช้งานได้"
		},
		password: 
		{
			required: "กรุณากรอกรหัสผ่านค่ะ",
			minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 8 ตัวอักษรค่ะ"
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
	<form id="frmRegister" action="users/signup" method="post">
	<table id="tbregmember">
		<tbody>
			<tr>
				<th colspan="2">สมัครสมาชิก ด้วยอีเมล์ที่ใช้ประจำ</th>
			</tr>
            <tr>
            	<td align="right"><strong>อีเมล์ล๊อคอิน : <span class="TxtRed">*</span></strong></td>
				<td><input type="text" size="40" class="textboxRegister" name="email" /></td>
			</tr>
			<tr>
				<td align="right"><strong>พิมพ์รหัสผ่าน :<span class="TxtRed"> *</span></strong></td>
				<td><input type="password" class="textboxRegister" name="password" id="password" /></td>
			</tr>
 			<tr>
				<td align="right"><strong>ยืนยันรหัสผ่าน : <span class="TxtRed">*</span></strong></td>
				<td><input type="password" class="textboxRegister" name="_password" /></td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			 <tr>
                      <th colspan="2" align="right">พิมพ์ข้อมูลส่วนตัว </th>
                    </tr>
                    <tr>
                      <td align="right"><strong>ประเภท : </strong></td>
                      <td><span style="padding-right:15px;">
                        <input type="radio" name="type" value="ประชาชนทั่วไป" checked="checked"/>
                        ประชาชนทั่วไป 
                        <input type="radio" name="type" value="เจ้าหน้าที่สาธารณสุข" />
                        เจ้าหน้าที่สาธารณสุข
                      </span></td>
                    </tr>
                    <tr>
		              <td align="right"><strong>ชื่อ : <span class="TxtRed">*</span></strong></td>
		              <td><input name="first_name" type="text" class="textboxRegister" size="50" /></td>
                    </tr>
                    <tr>
                      <td align="right"><strong>นามสกุล : <span class="TxtRed">*</span></strong></td>
                      <td><input name="last_name" type="text" class="textboxRegister" size="50" /></td>
                    </tr>
                    <tr class="type2" style="display:none;">
                      <td align="right"><strong>ตำแหน่ง : <span class="TxtRed">*</span></strong></td>
                      <td><input name="position" type="text" class="textboxRegister" size="50" /></td>
                    </tr>
                    <tr class="type2" style="display:none;">
                      <td align="right"><strong>ระดับ : <span class="TxtRed">*</span></strong></td>
                      <td><input name="level" type="text" class="textboxRegister" size="5" /></td>
                    </tr>
                    <tr class="type2" style="display:none;">
                      <td align="right"><strong>หน่วยงาน : <span class="TxtRed">*</span></strong></td>
                      <td><?php echo form_dropdown('agency_id',get_option('id','name','agencies','order by id asc')) ?></td>
                      </select></td>
                    </tr>
                    <tr class="type2" style="display:none;">
                      <td align="right"><strong>จังหวัด : <span class="TxtRed">*</span></strong></td>
                      <td><?php echo form_dropdown('province_id',get_option('id','name','provinces','order by id asc')) ?></td>
                    </tr>
                    <tr>
                      <td align="right"><span id="Label11"><strong>เพศ : <span class="TxtRed">*</span></strong></span></td>
                      <td>
                      	<span style="padding-right:15px;">
					  		<input type="radio" name="gender" value="m" checked="checked" /> 
					  		<img src="themes/gcdnew/images/male.jpg" width="16" height="16" />
					  	</span>
						<span>
							<input type="radio" name="gender" value="f" /> 
							<img src="themes/gcdnew/images/female.jpg" width="16" height="16" />
						</span>
					</td>
                    </tr>
                    <tr>
                      <td align="right"><span id="Label14"><strong>วันเกิด : <span class="TxtRed">*</span></strong></span></td>
                      <td><input name="birth_day" type="text" class="datepicker textboxRegister" size="20" /></td>
                    </tr>
                    <tr>
                      <td align="right"><strong>บัตรประชาชน :</strong></td>
                      <td><input name="idcard" type="text" class="textboxRegister" maxlength="13" /></td>
                    </tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<th colspan="2">พิมพ์ตัวอักษรที่คุณเห็นในภาพ</th>
			</tr>
			<tr>
				<td align="right"><strong>ภาพ :</strong></td>
				<td><img src="users/captcha" /></td>
			</tr>
			<tr>
				<td align="right"><span id="Label47"><strong>พิมพ์ตัวอักษร</strong></span><strong> : <span class="TxtRed">*</span></strong></td>
				<td><input type="text" class="textboxRegister" name="captcha"></td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<th colspan="2">ช่องทางรับข่าวสาร</th>
			</tr>
			<tr>
				<td align="right"><strong>เลือกข่าวสาร :</strong></td>
				<td>
					<?php echo modules::run("newsletters/inc_register"); ?>
				</td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<th colspan="2">กฎกติกาและข้อตกลง</th>
			</tr>
			<tr>
				<td valign="top" align="right"><strong>อ่านกฎติกา :</strong></td>
				<td><textarea rows="4" cols="50" name="input9">องเรือฟริเกตที่1 ได้จัดทำเว็บบอร์ดขึ้นจัดตามนโยบายของทางราชการ ที่กำหนดให้ทุกส่วนราชการจัดทำ เพื่อให้มีปฏิสัมพันธ์กับประชาชน และเพื่อเป็นการแลกเปลี่ยนข่าวสาร สอบถามปัญหา ทั้งภาคประชาชนและภาครัฐซึ่งจะทำให้ทั้งภาครัฐและภาคประชาชนเข้าใจกันมาก ขึ้น

กฎกติกาของเว็บบอร์ดของกองเรือฟริเกตที่ 1
1. ห้ามมิให้กล่าวพาดพึงไปถึงสถาบันชาติ ศาสนา และพระมหากษัตริย์ในทางที่เสื่อมเสีย
2. ห้ามตั้งกระทู้ที่ส่อไปในทางลามก อนาจาร หรือผิดศีลธรรม
3. ห้ามตั้งกระทู้ที่จะนำมาซึ่งความแตกแยกของสมาชิก หรือสร้างความปั่นป่วนขึ้นภายในเว็บบอร์ด
4. ห้ามใช้ข้อความไม่สุภาพ หยาบคาย หรือข้อความส่อเสียด กระทบกระเทียบให้ผู้อื่นได้รับความเสียหาย
5. ห้ามใช้นามแฝงอันเป็นชื่อจริงของผู้อื่น โดยมีเจตนาทำให้สาธารณะชนเข้าใจผิด และเจ้าของชื่อนั้นได้รับความเสียหาย
6. ห้ามโพสต์หมายเลขโทรศัพท์ และที่อยู่ อันเป็นข้อมูลส่วนตัวทั้งของท่านและของผู้อื่น บนเว็บบอร์ดโดยเด็ดขาด
7. การลบ User หรือแบนสมาชิก ให้อยู่ในการพิจารณาของเจ้าหน้าที่ดูแลเว็บบอร์ดโดยการตัดสินถือเป็นที่ยุติ

มารยาทในการใช้งานเว็บบอร์ด
 1. ในการตั้งกระทู้ หรือแสดงความคิดเห็นใดๆ กรุณาพิมพ์และใช้ภาษาไทยให้ถูกต้อง เพื่อร่วมกันอนุรักษ์ภาษาไทย และเพื่อเป็นบรรทัดฐานที่ดีสำหรับเยาวชนไทยสืบไป
 2. ใช้ข้อความที่สุภาพ อันแสดงถึงกิริยามารยาทที่ดีของสังคมไทย ในการตั้งกระทู้ หรือแสดงความคิดเห็นใดๆ
 3. การเสนอความคิดเห็นต่อกระทู้ใดๆ พึงระลึกเสมอว่า มีผู้อ่านที่แตกต่างกันทั้งวัยวุฒิ คุณวุฒิ และวุฒิภาวะ ดังนั้น จึงควรระมัดระวังในการใช้ข้อความ เช่น ข้อความที่อาจก่อให้เกิดความเข้าใจผิด ซึ่งอาจนำไปสู่การทะเลาะเบาะแว้ง ข้อความที่มีเนื้อหาขัดต่อกฏหมาย หรือศีลธรรมอันดีของสังคม ข้อความที่พาดพิงบุคคลที่สามในทางหมิ่นประมาท เป็นต้น
 4. พึงตระหนักอยู่เสมอว่า การเสนอคำถามหรือความคิดเห็น ควรจะมีความรับผิดชอบต่อทุกข้อความที่ได้เสนอไป เพื่อไม่ให้เกิดความเสียหายต่อบุคคลที่เกี่ยวข้อง
 5. ตั้งกระทู้ หรือโพสต์ข้อความให้ตรงกับหมวดหมู่ที่กำหนดไว้ ทางเว็บบอร์ดขอสงวนสิทธิ์ในการย้ายกระทู้ไปยังหมวดหมู่ที่ถูกต้อง โดยไม่แจ้งให้ทราบล่วงหน้า
 6. ใช้ฟังก์ชัน search เพื่อค้นหากระทู้ที่มีเนื้อหาไปในทิศทางเดียวกับเนื้อหาที่ต้องการ ก่อนที่จะตั้งกระทู้ใหม่ เพื่อไม่ให้เกิดการซ้ำซ้อน
 7. ตั้งชื่อหัวข้อกระทู้ให้สื่อถึงเรื่องราวภายในกระทู้อย่างชัดเจน รวมทั้งเนื้อหาภายในกระทู้ควรแจ้งรายละเอียดต่างๆให้มากที่สุด เพื่อความสะดวกของผู้ใช้งานทุกท่านในการที่จะเข้าไปช่วยเหลือ ตอบ หรือแสดงความคิดเห็น </textarea></td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
				<td><input type="checkbox" id="checkbox4" name="checkbox4">ยอมรับข้อตกลงในการใช้ิบริการของเว็บไซต์สำนักโรคติดต่อทั่วไป</td>
			</tr>
			<tr>
				<td width="30%" align="right">&nbsp;</td>
				<td width="70%"><input type="submit" value="&nbsp;&nbsp;สมัครสมาชิก&nbsp;&nbsp;" id="button2" class="f14 TxtBlue" name="button2"></td>
			</tr>
		</tbody>
	</table>
	</form>
</div>