<script type="text/javascript">
	$(function(){
		$("#header #login-info").hide();
		

	});
</script>
<div id="login">
	<h1 class="corner-top">Login</h1>
	<div class="box form">
		<form method="post" action="users/admin/auth/signin">
			<table class="form">
				<tr><th style="width:100px;">E-mail :</th><td><input type="text" name="username" class="text" value="" /></td></tr>
				<tr><th>Password :</th><td><input type="password" name="password" class="text" value="" /></td></tr>
				<tr><th></th><td><input type="submit" class="button submit" value="Login" /></td></tr>
			</table>
		</form>
	</div>
</div>