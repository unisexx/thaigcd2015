<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-64495915-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-64495915-1');
</script>

<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $template['title'] ?></title>
<link href="themes/thaigcd2015/css/template.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="themes/thaigcd2015/css/bootstrap.min.css">
<link rel="stylesheet" href="themes/thaigcd2015/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="themes/thaigcd2015/css/topmenu.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="media/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/thaigcd2015/js/domtab.js"></script>
	<script type="text/javascript">
		document.write('<style type="text/css">');    
		document.write('div.domtab div{display:none;}<');
		document.write('/s'+'tyle>');    
    </script>
    <script>
    	$(document).ready(function(){
    		$('#page img').addClass('img-responsive');
    	});
    </script>
<?php echo $template['metadata'] ?>
<? include "change_font.php";?>
<? include "change_page.php";?>

</head>

<body>
<div id="wrap1">
	<? include "_header.php";?>
	
		<div id="page">
			<? include "_breadcrumb.php";?>
			<?php echo $template["body"] ?>
		</div> 
	<!-- END <div id="page"> -->

	    <? //include "_footer.php";?>
        <?=modules::run('log/statvisits'); ?>
</div>
<!------------------------------------------------------------END Wrap1-----------------------------------------------------------> 
    <div class="clearfix">&nbsp;</div>




</body>
</html>
