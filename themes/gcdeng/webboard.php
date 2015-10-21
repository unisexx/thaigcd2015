<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo base_url(); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $template['title'] ?></title>
	<? include "_script.php";?>
	<?php echo $template['metadata'] ?>
</head>

<body>
<div id="wrapper">
<div id="header">
<? include "_header.php";?>
</div><!--header-->

<div id="main">
    <div id="dvright" class="right">
    	<div id="webboardpage" class="corner">
        	<?php echo $template["body"] ?>
		</div>
    </div><!--dvright-->
</div><!--main-->
<div class="clear"></div>
<div id="dvlink">
	<?php echo modules::run('weblinks/inc_home'); ?>
</div><!--dvlink-->
</div><!--wrapper-->
<div id="dvfooter">
	<? include "_footer.php";?>
</div><!--dvfooter-->
</body>
</html>
