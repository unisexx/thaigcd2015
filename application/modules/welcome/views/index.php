<?php
foreach($users as $user)
{
	echo $user->email.' | '.$user->level->level.br();
}
echo $users->pagination();
?>
<form method="post" action="<?php echo site_url('pages/form')?>" enctype="multipart/form-data">
	<input type="file" name="img" />
	<input type="submit" value="ok" />
</form>