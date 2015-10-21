<script type="text/javascript">
	$(function(){
		$('select[name=province_id]').change(function(){
			var target = $(this);
			target.parent().parent().next().children('td').html('กำลังโหลด...');
			$('select[name=district_id]').remove();
			$.post('registers/ajax_amphur',{'id':$(this).val()},function(data){
				target.parent().parent().next().children('td').html(data);
				$("select[name=amphur_id]").rules("add",{required: true,messages:{required: "กรุณาเลือกเขต/อำเภอค่ะ"}});
			})
		})
		
		$('select[name=amphur_id]').live('change',function(){
			var target = $(this);
				target.parent().parent().next().children('td').html('กำลังโหลด...');
			$.post('registers/ajax_district',{'id':$(this).val()},function(data){
				target.parent().parent().next().children('td').html(data);
			})
		})
		
		$(".contact_form form").validate({
			rules: 
			{
				name: 
				{ 
					required: true
				},
				email: 
				{ 
					required: true,
					email: true
				},
				center: 
				{
					required: true
				},
				home_no:
				{
					required: true
				},
				moo: 
				{
					required: true
				},
				province_id:
				{
					required: true
				},
				position:
				{
					required: true
				},
				postcode:
				{
					required: true
				}
				
			},
			messages:
			{
				name: 
				{ 
					required: "กรุณากรอกชื่อและนามสกุลค่ะ"
				},
				email: 
				{ 
					required: "กรุณากรอกอีเมล์ค่ะ",
					email: "กรุณากรอกอีเมล์ให้ถูกต้องค่ะ"
				},
				center: 
				{ 
					required: "กรุณากรอกชื่อศูนย์เด็กเล็กค่ะ"
				},
				home_no: 
				{ 
					required: "กรุณากรอกเลขที่ค่ะ"
				},
				moo: 
				{
					required: "กรุณากรอกหมู่ค่ะ"
				},
				province_id:
				{
					required: "กรุณาเลือกจังหวัดค่ะ"
				},
				position:
				{
					required: "กรุณากรอกตำแหน่งค่ะ"
				},
				postcode:
				{
					required: "กรุณากรอกรหัสไปรษณีย์ค่ะ"
				}
			}
		});
	})
</script>
<div class="topic cufon" style="text-align:center; font-size:25px; line-height:40px;"><span style="color:#945946;">กรมควบคุมโรค  กระทรวงสาธารณสุข</span><br />
มีความยินดีขอเชิญ “ศูนย์เด็กเล็ก” ทั่วประเทศ เข้าร่วมโครงการ “ศูนย์เด็กเล็กปลอดโรค”<br />
ใบสมัครเข้าร่วมโครงการศูนย์เด็กเล็กปลอดโรค
</div>
<div id="data" class="contact_form">

		<form method="post" action="registers/save">
			<table class="form2"> 
				<tr>
					<th>ชื่อศูนย์เด็กเล็ก<span class="TxtRed"> *</span></th>
					<td><input class="text" type="text" name="center" value="" /></td>
				</tr>
				<tr>
					<th>เลขที่ <span class="TxtRed"> *</span></th>
					<td><input class="text" type="text" name="home_no" value="" /></td>
				</tr>
				<tr>
					<th>หมู่<span class="TxtRed"> *</span> </th>
					<td><input class="text" type="text" name="moo" value="" /></td>
				</tr>
				<tr>
					<th>จังหวัด<span class="TxtRed"> *</span> </th>
					<td><?php echo form_dropdown('province_id',get_option('id','name','provinces'),'','style="padding:5px;"','---กรุณาเลือกจังหวัด---') ?></td>
				</tr>
				<tr>
					<th>เขต/อำเภอ<span class="TxtRed"> *</span></th>
					<td></td>
				</tr>
				<tr>
					<th>แขวง/ตำบล<span class="TxtRed"> *</span></th>
					<td></td>
				</tr>
				<tr>
					<th>รหัสไปรษณีย์<span class="TxtRed"> *</span></th>
					<td><input class="text" type="text" name="postcode" value="" /></td>
				</tr>
				<tr>
					<th>โทรศัพท์</th>
					<td><input class="text" type="text" name="telephone" value="" /></td>
				</tr>
				<tr>
					<th>แฟกซ์</th>
					<td><input class="text" type="text" name="fax" value="" /></td>
				</tr>
				<tr>
					<th>อีเมล์<span class="TxtRed"> *</span></th>
					<td><input class="text" type="text" name="email" value="" /></td>
				</tr>
				<tr>
					<th>ชื่อผู้สมัคร<span class="TxtRed"> *</span></th>
					<td><input class="text" type="text" name="name" value="" /></td>
				</tr>
				<tr>
					<th>ตำแหน่ง<span class="TxtRed"> *</span></th>
					<td><input class="text" type="text" name="position" value="" /></td>
				</tr>
				<tr>
					<th></th>
					<td><input type="submit" value="สมัคร" style="padding-left:10px;padding-right:10px; " />  <strong>หรือสอบถามรายละเอียดเพิ่มเติมที่ 02-590-3196</strong></td>
				</tr>
				</table>
			</form>
			<div style="background:#FFF5CC; border:1px solid #F2DD8C; padding:10px; margin:10px 0 0;">
			
				<h2>สิทธิประโยชน์ที่ได้รับ</h2>
				<ol>
<li>ได้รับหนังสือแนวทางป้องกันควบคุมโรคติดต่อในศูนย์เด็กเล็ก , สื่อสิ่งพิมพ์ , ซีดีนิทาน , เพลง ฯลฯ</li>
<li>ได้รับคำแนะนำ / ปรึกษา จากผู้เชียวชาญด้านโรคติดต่อ</li>
<li>ได้รับเกียรติบัตร หากผ่านเกณฑ์การประเมิน <br />
              ----  ระดับดี -----     ----  ดีมาก -----     ----  ดีเยี่ยม -----</li>
<li>หากผ่านเกณฑ์การประเมินระดับดีเยี่ยมจะได้รับโลห์เกียรติคุณ</li>
</ol>
			</div>
			
</div>
