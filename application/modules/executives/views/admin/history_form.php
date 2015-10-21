<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript" src="themes/gcdnew/js/jquery.validate.min.js"></script>
<script type="text/javascript">
	tiny('long_history[th],long_history[en]');
	$(function(){
			$("[rel=en]").hide();
			$(".lang a").click(function(){
				$("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
				$(this).addClass('active').siblings().removeClass('active');
				return false;
			});
	})
</script>
<h1>ประวัติผู้บริหาร</h1>

<?php include('_menu.php');?>
<br>
<form id="frmMain" action="executives/admin/histories/save/<?php echo $execusive_user->id ?>" method="post" >
<table class="form">
	<tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<tr>
		<th></th>
		<td><?php echo $execusive_user->profile->first_name?> <?php echo $execusive_user->profile->last_name?></td>
	</tr>
	<tr>
		<th>ประวัติพอสังเขป :</th>
		<td>
			<textarea name="short_history[th]" id="intro" class="full" rel="th"><?php echo lang_decode($execusive_user->profile->short_history,'th')?></textarea>
			<textarea name="short_history[en]" id="intro" class="full" rel="en"><?php echo lang_decode($execusive_user->profile->short_history,'en')?></textarea>
		</td>
	</tr>
	<tr>
		<th>ประวัติเต็ม :</th>
		<td>
			<div rel="th"><textarea name="long_history[th]" class="full tinymce"><?php echo lang_decode($execusive_user->profile->long_history,'th')?></textarea></div>
			<div rel="en"><textarea name="long_history[en]" class="full tinymce"><?php echo lang_decode($execusive_user->profile->long_history,'en')?></textarea></div>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /></td></tr>
</table>
</form>