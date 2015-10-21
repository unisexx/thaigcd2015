<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title><?php echo $template['title']; ?></title> 
		<script type="text/javascript" src="themes/gcdnew/js/jquery.min.js" ></script>	
		<link rel="stylesheet" href="media/css/reset.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="themes/meeting/css/default.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="media/css/icons.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="themes/meeting/css/pagination.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="themes/meeting/css/layout.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="themes/meeting/css/web.css" 	type="text/css" media="screen" charset="utf-8" />			
		<?php echo $template['metadata']; ?>
		<script type="text/javascript">
			$(function(){
				$('a[href=#]').click(function(){
					return false;
				})
			})
		</script>
	</head>
	<body> 
		<div id="wrapper">
			<div id="header"><?php include_once ('_header.inc.php'); ?></div> 
			<div id="menu"><?php  include_once '_menu.php'; ?></div> 
			<div class="clear"></div>
			<div id="container"><?php echo $template['body']; ?></div> 
			<div id="footer"></div> 
		</div> 
	</body>
</html>