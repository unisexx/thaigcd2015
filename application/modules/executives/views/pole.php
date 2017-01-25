


<h1 style="font-size: 18px; color:brown;">รับเรื่องร้องเรียน</h1>

<br />

<div id="data">

	
	<div class="contact_form">	
				
			<form class="form-horizontal"  id="frmRegister" method="post" action="executives/save_pole" onsubmit="return check_form(this);">
						
						  
						<div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>ชื่อ : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="ชื่อ" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>
						  						  
						    <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>นามสกุล : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="นามสกุล" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>
						
						  
						    <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>อีเมล์ : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="email" name="email" placeholder="อีเมล์" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>
                          
                          
						    <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>รายละเอียด : <span class="TxtRed">*</span></strong></label>
						    <div class="col-sm-10">
<!--						      <input type="text" class="form-control" id="details" name="details" placeholder="รายละเอียด" autocomplete="off" style="width:400px;" required>-->
                              <textarea id="details" name="details" cols="4" rows="4" class="form-control" style="width:400px;" required></textarea>
                              
						    </div>
						  </div>						  
						  
						 <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"><strong>พิมพ์ตัวอักษรที่คุณเห็นในภาพ :</strong></label>
						    <div class="col-sm-10">
						    
						      <img src="users/captcha" />
						      <Br>
						      <strong>พิมพ์ตัวอักษร</strong></span><strong> : <span class="TxtRed">*</span></strong>
						      <input type="text" class="form-control" id="captcha" name="captcha" placeholder="captcha" autocomplete="off" style="width:400px;">
						      
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


<script type="text/javascript">

  

  	function check_form(frm)
    {

				

			if (frm.first_name.value==null || frm.first_name.value==""){

			alert("กรุณากรอกชื่อ !!")

			frm.first_name.focus();

			return false;

			}

			if (frm.last_name.value==null || frm.last_name.value==""){

			alert("กรุณากรอก นามสกุล !!")

			frm.last_name.focus();

			return false;

			}			

	

			if (frm.email.value==null || frm.email.value==""){

			alert("กรุณากรอก อีเมล์ !!")

			frm.email.focus();

			return false;

			}

			

			if (frm.details.value==null || frm.details.value==""){

			alert("กรุณากรอก ข้อความ !!")

			frm.details.focus();

			return false;

			}

			
			if (frm.captcha.value==null || frm.captcha.value==""){

			alert("กรุณากรอก รหัสความปลอดภัย !!")

			frm.captcha.focus();

			return false;

			}
			

			

			return true;

	}

	

  

  </script>