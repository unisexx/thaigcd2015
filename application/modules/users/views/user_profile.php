<script type="text/javascript" src="themes/gcdnew/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/tinymce.js"></script>
<script type="text/javascript">
	$(function(){
		$('#sign_edit').click(function(){
			
			$('#show_signature').slideUp(function(){
				$('#sign_frm').slideDown();
			});
			return false;
		});
		
		$('.cancel').click(function(){
			
			$('#edit_profile_form').slideUp(function(){
				$('#profile_blog').slideDown();
			});
			return false;
		});
		
		$('#avatar_edit').click(function(){
			
			$('#profile_blog').slideUp(function(){
				$('#edit_profile_form').slideDown();
			});
			return false;
		});
		
		$("#edit_profile").validate({
			rules: 
			{
				image: 
				{ 
					accept: "png|jpe?g"
				}
			},
			messages:
			{
				image: 
				{ 
					accept: "อนุญาติเฉพาะไฟล์ jpg jpeg และ png เท่านั้นค่ะ",
				}
			}
		});
		
	});
</script>
<style type="text/css">
#edit_profile_form table.form{
	font-size:13px;
}
#edit_profile_form table.form th {
	font-weight:100;
}
</style>
<div id="profile">
	<h1>ข้อมูลส่วนตัว <a id="avatar_edit" href="#" style="color:#006699;"><?php if($this->session->userdata('id') == $user->id):?>[แก้ไขข้อมูลส่วนตัว]<?php endif;?></a></h1>
	<div id="profile_blog">
	<div class="profile_detail">
		<ul>
			<li>
				<em><b><?php echo $user->display?> (UID : <?php echo $user->id?>)</b></em>
				<a href="pms/index/<?php echo $user->id?>"><img src="themes/gcdnew/images/pmto.gif" title="ส่งข้อความส่วนตัว" alt="ส่งข้อความส่วนตัว" style="padding:4px 0 0 0;"></a>
			</li>
			<li>
				<em>กลุ่มสมาชิก</em>
				<?php echo $user->level->level?>
			</li>
			<li>
				<em>สังกัดกลุ่มงาน</em>
				<a href="groups/index/<?php echo $user->group->id?>"><?php echo lang_decode($user->group->name)?></a>
			</li>
			<li>
				<em>วันที่สมัครสมาชิก</em>
				<?php echo mysql_to_th($user->created,'S',TRUE)?>
			</li>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="profile_detail">
		<ul>
			<li>
				<em><b>เว็บบล็อก</b></em>
				&nbsp;
			</li>
			<li>
				<em>บทความทั้งหมด</em>
				<?php echo $user->blog->blogpost->result_count()?>
			</li>
			<li>
				<em>บทความล่าสุด</em>
				<a href="blogs/<?php echo $user->blog->id?>/<?php echo $user->blog->blogpost->order_by('id', 'desc')->limit(1)->get()->id?>"><?php echo $user->blog->blogpost->order_by('id', 'desc')->limit(1)->get()->title?></a> 
			</li>
			<li>
				<em>บทความยอดนิยม</em>
				<a href="blogs/<?php echo $user->blog->id?>/<?php echo $user->blog->blogpost->order_by('counter', 'desc')->limit(1)->get()->id?>"><?php echo $user->blog->blogpost->order_by("counter", "desc")->limit(1)->get()->title?></a> 
			</li>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="profile_detail">
		<ul>
			<li>
				<em><b>เว็บบอร์ด</b></em>
				&nbsp;
			</li>
			<li>
				<em>ตั้งกระทู้</em>
				<?php echo $user->webboard_quiz->result_count()?>
			</li>
			<li>
				<em>โพสต์</em>
				<?php echo $user->webboard_answer->result_count()?>
			</li>
			<li>
				<em>กลุ่มสมาชิก</em>
				<?php echo webboard_group($user->webboard_answer->result_count(),'name')?>
			</li>
			<li>
				<em>รูปภาพกลุ่ม</em>
				<img src="uploads/webboards/<?php echo webboard_group($user->webboard_answer->result_count(),'image')?>">
			</li>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="profile_detail">
		<ul>
			<li>
				<em><b>ลายเซ็นต์</b></em>
				<?php if($this->session->userdata('id') == $user->id):?><a id="sign_edit" href="#" style="color:#006699;">[แก้ไข]</a><?php endif;?>
			</li>
		</ul>
		<div id="show_signature"><?php echo $user->profile->signature?></div>
		<form id="sign_frm" name="signature" method="post" action="users/sig_save/<?php echo $this->session->userdata('id')?>" style="display:none;">
			<textarea class="editor[sig]" name="signature"><?php echo $user->profile->signature?></textarea>
			<input style="margin:5px 0 0 0;" type="submit" value="บันทึก">
		</form>
		<div class="clear"></div>
	</div>
	</div>
	
	<div id="edit_profile_form" style="display:none;">
	<br>
		<form id="edit_profile" method="post" action="users/profile_save/<?php echo $this->session->userdata('id')?>" enctype="multipart/form-data">
			<table class="form">
			<tr><th>รูปประจำตัว : </th><td><input type="file" name="image" /></td></tr>
			<tr><th>ชื่อ : </th><td><input type="text" class="text" name="first_name" value="<?php echo $user->profile->first_name?>" /></td></tr>
			<tr><th>นามสกุล : </th><td><input type="text" class="text" name="last_name" value="<?php echo $user->profile->last_name?>" /></td></tr>
			<tr><th>วันเกิด : </th><td><input type="text" name="birth_day" value="<?php echo DB2Date($user->profile->birth_day) ?>" class="text datepicker" /></td></tr>
			<tr><th>เพศ : </th><td><?php echo form_dropdown('gender', array('m'=>'ชาย', 'f'=>'หญิง'), $user->profile->gender,'class="text select"'); ?></td></tr>
		
			<tr><th>เบอร์โทรศัพท์ : </th><td><input type="text" class="text small" name="phone" value="<?php echo $user->profile->phone?>" /></td></tr>
			<tr><th>เบอร์โทรศัพท์มือถือ : </th><td><input type="text" class="text small" name="mobile" value="<?php echo $user->profile->mobile?>" /></td></tr>
			<tr><th>ที่อยู่ : </th><td><textarea name="address" class="textarea" ><?php echo $user->profile->address?></textarea></td></tr>
			<tr><th>รหัสไปรษณีย์ : </th><td><input type="text" class="text small" name="postcode" value="<?php echo $user->profile->postcode?>" /></td></tr>
			<tr><th></th><td><input type="submit" value="บันทึก" /> <input class="cancel" type="button" value="ยกเลิก" /></td></tr>
			</table>
		</form>
	</div>
</div>