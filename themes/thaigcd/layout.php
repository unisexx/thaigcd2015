<? include "include/config.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo base_url(); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$title; ?></title>
	<link rel="stylesheet" type="text/css" href="themes/thaigcd/css/template.css"/>
	<link type="text/css" href="themes/thaigcd/css/ui-lightness/jquery.ui.all.css" rel="stylesheet" />
	<link type="text/css" href="themes/thaigcd/css/ui-lightness/jquery.ui.tabs.css" rel="stylesheet" />
	<script type="text/javascript" src="themes/thaigcd/js/SWFSupport.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.min.js" ></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.ui.core.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.ui.tabs.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/easySlider1.5.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.marquee.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jquery.slideheader.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="themes/thaigcd/css/jScrollPane.css" />
	<script type="text/javascript" src="themes/thaigcd/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="themes/thaigcd/js/jScrollPane.js"></script>

<script type="text/javascript">
	$(function(){
		$(".corner").append('<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="shadow"></div>');
		$("#tabs,#tabs2").tabs();
		$('#pane3').jScrollPane();
		$('#pane4').jScrollPane({scrollbarOnLeft:true});
		$("#slider").easySlider();
		setInterval( "slideSwitch()", 4000 );
	});
</script>

</head>

<body>
<div id="wrapper">
<div id="header">
<? include "_header.php";?>
</div><!--header-->

<div id="main">
	<div id="dvleft">
	  <? include "_left.php";?>
	</div><!--dvleft-->
    
    <div id="dvright" class="right">
    	<div id="page" class="corner">
        	<?php echo $template["body"] ?>
		</div>
    </div><!--dvright-->
</div><!--main-->
<div class="clear"></div>
<div id="dvlink">
	<? include "_link.php";?>
</div><!--dvlink-->
</div><!--wrapper-->
<div id="dvfooter">
	<? include "_footer.php";?>
</div><!--dvfooter-->
</body>
</html>
