<div class="corner" id="boxlogin">
	<div class="topic"><img width="200" height="25" alt="สมัครสมาชิก" src="<?php echo topic("topic_member.png")?>"></div>
	<div id="login">
		<form action="users/signin" method="post" >
			<label for="username" style="display: none;">username</label>
			<input type="text" class="usernamebox" name="username" id="username"> 
			<label for="password" style="display: none;">password</label>
			<input type="password" class="usernamebox" name="password" id="password">
			<a class="fotgot" href="users/forgot" target="_self">Forgot Password</a><a class="register" href="users/register" target="_self">Register</a>
			<input type="submit" class="btn_login" value="" id="button" name="button">
		</form>
	</div>   
</div>