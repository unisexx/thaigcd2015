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
	<div id="dvleft">
	  <? include "_left_group.php";?>
	</div><!--dvleft-->
    
    <div id="dvright" class="right">
        <?php echo $template['body']; ?>
        <div class="paddtop20bot20"><span></span></div>
        
       	<div id="boxprnews" class="corner group">
		
			<div id="tabs">
				<ul>
					<li><a href="#tabs-1">ข่าวประชาสัมพันธ์</a></li>
					<li><a href="#tabs-2">ประกาศจัดซื้อ/จัดจ้าง</a></li>
				</ul>
				<div id="tabs-1">
					<?php echo modules::run('informations/inc_home',$group->id); ?>
					
				</div>
				<div id="tabs-2">
					<?php echo modules::run('notices/inc_home',$group->id); ?>
				</div>
			</div><!--tabs-->
	
	<div class="paddbot10"></div>
</div><!--boxprnews-->
        <div class="paddtop20bot20"><span></span></div>
        
        <?php echo modules::run('mediapublics/inc_home',$group->id); ?>
        
		<?php echo modules::run('calendars/inc_home',$group->id); ?> 
        
        <div class="clear"></div>
        <div class="paddtop20bot20"><span></span></div>
        
		<?php echo modules::run('galleries/inc_home',$group->id); ?>
        <!--boxphoto-->
        <div class="paddtop20bot20"><span></span></div>

	
        
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
