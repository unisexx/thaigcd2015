<script type="text/javascript" src="themes/gcdnew/js/jquery.validate.min.js"></script>
<script language="javascript">
$(function(){
	$("#frmnewsletter").validate({
	rules: 
	{
		email: 
		{ 
			required: true,
			email: true,
			remote: "newsletters/check_email"
		}
	},
	messages:
	{
		email: 
		{ 
			required: "กรุณากรอกอีเมล์ค่ะ",
			email: "กรุณากรอกอีเมล์ให้ถูกต้องค่ะ",
			remote: "อีเมล์นี้ไม่สามารถใช้งานได้"
		}
	}
	});
});
</script>

<div id="boxnewsletter" class="corner">
        	<div class="topic"><img src="<?php echo topic("topic_newsletter.png") ?>" width="200" height="25" alt="ช่องทางรับข่าวสาร" /></div>

		<form id="frmnewsletter" method="post" action="newsletters/newsletter_mail_submit">
			<div id="newsletter">
				<label for="email" style="display: none;">email</label>
				<input id="email" type="text" name="email" class="textbox TxtGray" value="email address"/>
				<label for="btn_go" style="display: none;">btn_go</label>
				<input name="submit" type="submit" class="btn_go" id="btn_go" value="submit"/>
			</div>
		<div class="clear"></div>
		</form>