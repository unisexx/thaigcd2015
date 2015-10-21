<?if($this->uri->segment(3) == 58):?>
	<?if($_POST['p'] == 'gcddrivercar'):?>
		<div class="topic cufon"><span style="color:#8E4F3B;"><?php echo lang_decode($page->title) ?></span></div>
		<div id="data">
	<?php echo lang_decode($page->detail) ?>
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
<div class="topic cufon"><span style="color:#8E4F3B;"><?php echo lang_decode($page->title) ?> <span class="f10 TxtGray2"> <?php echo mysql_to_th($page->created) ?> - <?php echo $page->counter ?> ครั้ง</span></span></div>
<div id="data">
	<?php echo lang_decode($page->detail) ?>
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
		<form method="post" >
			<table>
				<tr>
					<th>กลุ่มงานที่ต้องการติดต่อ</th>
					<td><?php echo form_dropdown('group_id',get_option('id','name','groups'),@$_GET['group_id'],'style="padding:5px;"') ?></td>
				</tr>
				<tr>
					<th>ชื่อ-นามสกุล<span class="TxtRed"> *</span></th>
					<td><input type="text" name="name" value="" class="text" /></td>
				</tr>
				<tr>
					<th>บริษัท</th>
					<td><input type="text" name="company" value="" class="text" /></td>
				</tr>
				<tr>
					<th>อีเมล์<span class="TxtRed"> *</span></th>
					<td><input type="text" name="email" value="" class="text" /></td>
				</tr>
				<tr>
					<th>โทรศัพท์</th>
					<td><input type="text" name="telephone" value="" class="text" /></td>
				</tr>
				<tr>
					<th>โทรสาร</th>
					<td><input type="text" name="fax" value="" class="text" /></td>
				</tr>
				<tr>
					<th>เรื่องที่ติดต่อ<span class="TxtRed"> *</span></th>
					<td><input type="text" name="title" value="" class="text" /></td>
				</tr>
				<tr>
					<th valign="top" >รายละเอียด<span class="TxtRed"> *</span></th>
					<td><textarea name="detail" class="text"></textarea></td>
				</tr>
				<tr>
					<th></th>
					<td><input type="submit" value="ตกลง" /></td>
				</tr>
			</table>
		</form>
	</div>
	<?php endif; ?>
	
</div><!--data-->
