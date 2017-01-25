<?if($this->uri->segment(3) == 58):?>
	<?if($_POST['p'] == 'gcddrivercar'):?>
		<div class="topic cufon">
		<span style="color:#8E4F3B;">
		<?php echo lang_decode($page->title); ?>
			
		</span>
		</div>
		<div id="data">
	<?php echo lang_decode($page->detail); ?>
	<?else:?>
	<div id="data">
	<center style="margin: 30px 0;">
		<form method="post">
			กรุณาใส่รหัสเข้าชม<br>
			<input type="password" name="p" value="">
			<input type="submit" value="submit">
		</form>
	</center>
	<?endif;?>

<?else:?>
	<?php echo lang_decode($page->detail); ?>
<?endif;?>

<?php if($page->slug == 'contactus'): ?>

<script type="text/javascript">
	$(function(){
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
				title: 
				{
					required: true
				},
				detail:
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
				title: 
				{ 
					required: "กรุณากรอกเรื่องที่ติดต่อค่ะ",
				},
				detail: 
				{ 
					required: "กรุณากรอกรายละเอียดค่ะ",
				}
			}
		});
	})
</script>
	
		<div class="contact_form">	
				
			<form class="form-horizontal"  id="boxform" method="post" action="pages/save">
						
						  <div class="form-group">
						    <label for="inputUsername" class="col-sm-2 control-label">กลุ่มงานที่ต้องการติดต่อ</label>
						    <div class="col-sm-10">
						    
								<?php echo form_dropdown('group_id',get_option('id','name','groups'),@$_GET['group_id'],'style="padding:5px;"') ?>
						      
						    </div>
						  </div>
						  						
						  <div class="form-group">
						    <label for="inputUsername" class="col-sm-2 control-label">ชื่อ-นามสกุล<span class="TxtRed"> *</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputUsername" name="name" placeholder="ชื่อของท่าน" autocomplete="off" style="width:600px;" required>
						    </div>
						  </div>
						
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">บริษัท</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputcompany" name="company" placeholder="บริษัท" autocomplete="off" style="width:600px;" required>
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">อีเมล์<span class="TxtRed"> *</span></label>
						    <div class="col-sm-10">
						      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="อีเมล" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">โทรศัพท์</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputtelephone" name="telephone" placeholder="โทรศัพท์" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">โทรสาร</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputfax" name="fax" placeholder="โทรสาร" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>
						  
						<div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">เรื่องที่ติดต่อ<span class="TxtRed"> *</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputtitle" name="title" placeholder="เรื่องที่ติดต่อ" autocomplete="off" style="width:400px;" required>
						    </div>
						  </div>
						  						  
						    <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">ความคิดเห็น</label>
						    <div class="col-sm-10">
						      <textarea name="detail" style="width:400px;" rows="5"></textarea>
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
	
	
	<?php endif; ?>