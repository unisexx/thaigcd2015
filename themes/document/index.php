<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $template['title']?></title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="themes/thaigcd/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="themes/thaigcd/css/layout.css"/>
<link rel="stylesheet" type="text/css" href="themes/thaigcd/css/web.css"/>
<link rel="stylesheet" type="text/css" href="themes/thaigcd/css/sort.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/pagination.css"  />


<?php echo $template['metadata']; ?>
</head>

<body>
<?php include_once('_header.inc.php'); ?>
<? include "_menu.php"?>
<?php echo $template['body']?>
</body>
</html>
