<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$title?> [<?=$login_title?>]</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$charset?>" />
<script language="javascript" type="text/javascript" src="js/ajax.js"></script>
<script language="javascript" type="text/javascript" src="js/cookie.js"></script>
<script language="javascript" type="text/javascript" src="js/login.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
	/*$(document).ready(function(){
		$("#member").click(function(){
			$("#login").hide();
			$("#password").show();
			$("#passwd").removeAttr('disabled');
			$("#login").show();
		});
		$("#personal").click(function(){
			$("#login").hide();
			$("#password").hide();
			$("#passwd").attr('disabled', true);
			$("#login").show();
		});
		
	});*/
</script>
<link rel="stylesheet" type="text/css" href="skin/login.css" media="screen" />
<script type="text/javascript">
<?
	$data = implode( '", "' , $icon );
	echo 'var icon = new Array("'.$data.'")'.";\n"; //user icon
	echo "var login_error0 = '$login_error0';\n";
	echo "var login_error1 = '$login_error1';\n";
	echo "var login_error2 = '$login_error2';\n";
?>
</script>
</head>
<body>
<br /><br />
<h1><?=$login_logo?></h1>

<?php
	include "inc/connect.php";
	$sql = "SELECT * FROM chats WHERE id = 1";
	$query = mysql_query($sql); //query
	if ($query) {
		while($r = mysql_fetch_array($query)){
			$user_chat = $r['member_chat'];
		}
	}
?>

<?php if($user_chat == 0): //guest เท่านั้น?>
	<div align="center" style="font-size:larger; margin:10px 0;"><a id="personal" href="#"><?=$guest?></a></div>
	<div class="shadow">
<div class="shadowright">

<form name="login" id="login" method="post" action="index.php" onsubmit="return login_check()"">
<h2><?=$status?></h2>
<p><label for="user"><?=$login_label?></label><input type="text" name="user" id="user" value="<?=$user?>" /></p>
<p id="password" style="display:none;"><label for="passwd"><?=$password_label?></label><input type="password" name="passwd" id="passwd" value="<?=$passwd?>"/><?=$password_c_label?></p>
<p><label for="submit">&nbsp;</label><input type="submit" name="submit" id="submit" value="<?=$login_submit_value?>" /></p>
<h3><?=$login_style?></h3>
<p class="menu">
<?
	$chatcolor = $_COOKIE[chatcolor];
	for ( $i = 0 ; $i < count( $icon ) ; $i++ )
	{
		echo "<img id=\"icon$i\" src=\"skin/img/$icon[$i]\" alt=\"$i\" class=\"button\" />";
	};
	echo "<span id=\"colors\" title=\"$login_color_hint\" class=\"current\" onmouseover=\"this.className = 'hover'\" ";
	echo "onmouseout=\"this.className = 'current'\" onclick='popupwindow( \"colors.php\" , \"colors\" , 400 , 160 )'>";
	echo "<font id=\"btncolor\" style=\"background-color:$chatcolor\" ></font></span>";
?>
</p>


<input type="hidden" name="usercolor" id="usercolor" value="<?=$chatcolor?>" />
<input type="hidden" name="usericon" id="usericon" />
</form>


<?php elseif($user_chat == 1): //member เท่านั้น?>
	<div align="center" style="font-size:larger; margin:10px 0;"><a id="member" href="#"><?=$member?></a></div>
	<div class="shadow">
<div class="shadowright">

<form name="login" id="login" method="post" action="index.php" onsubmit="return login_check()"">
<h2><?=$status?></h2>


<p><label for="user"><?=$login_label?></label><input type="text" name="user" id="user" value="<?=$user?>" /></p>
<p id="password"><label for="passwd"><?=$password_label?></label><input type="password" maxlength="10" name="passwd" id="passwd" value="<?=$passwd?>"/></p>

<p><label for="submit">&nbsp;</label><input type="submit" name="submit" id="submit" value="<?=$login_submit_value?>" /></p>
<h3><?=$login_style?></h3>
<p class="menu">
<?
	if(isset($_COOKIE['chatcolor'])){$chatcolor = $_COOKIE['chatcolor'];}else{$chatcolor = '';}
	for ( $i = 0 ; $i < count( $icon ) ; $i++ )
	{
		echo "<img id=\"icon$i\" src=\"skin/img/$icon[$i]\" alt=\"$i\" class=\"button\" />";
	};
	echo "<span id=\"colors\" title=\"$login_color_hint\" class=\"current\" onmouseover=\"this.className = 'hover'\" ";
	echo "onmouseout=\"this.className = 'current'\" onclick='popupwindow( \"colors.php\" , \"colors\" , 400 , 160 )'>";
	echo "<font id=\"btncolor\" style=\"background-color:$chatcolor\" ></font></span>";
?>
</p>


<input type="hidden" name="usercolor" id="usercolor" value="<?=$chatcolor?>" />
<input type="hidden" name="usericon" id="usericon" />
</form>


<?php else: //เข้าได้ทั้ง guest และ member?>
	<div align="center" style="font-size:larger; margin:10px 0;"><a id="personal" href="#"><?=$guest?></a> | <a id="member" href="#"><?=$member?></a></div>
	<div class="shadow">
<div class="shadowright">

<form name="login" id="login" method="post" action="index.php" onsubmit="return login_check()"">
<h2><?=$status?></h2>
<p><label for="user"><?=$login_label?></label><input type="text" name="user" id="user" value="<?=$user?>" /></p>
<p id="password"><label for="passwd"><?=$password_label?></label><input type="password" name="passwd" id="passwd" value="<?=$passwd?>"/><?=$password_c_label?></p>
<p><label for="submit">&nbsp;</label><input type="submit" name="submit" id="submit" value="<?=$login_submit_value?>" /></p>
<h3><?=$login_style?></h3>
<p class="menu">
<?
	$chatcolor = $_COOKIE[chatcolor];
	for ( $i = 0 ; $i < count( $icon ) ; $i++ )
	{
		echo "<img id=\"icon$i\" src=\"skin/img/$icon[$i]\" alt=\"$i\" class=\"button\" />";
	};
	echo "<span id=\"colors\" title=\"$login_color_hint\" class=\"current\" onmouseover=\"this.className = 'hover'\" ";
	echo "onmouseout=\"this.className = 'current'\" onclick='popupwindow( \"colors.php\" , \"colors\" , 400 , 160 )'>";
	echo "<font id=\"btncolor\" style=\"background-color:$chatcolor\" ></font></span>";
?>
</p>


<input type="hidden" name="usercolor" id="usercolor" value="<?=$chatcolor?>" />
<input type="hidden" name="usericon" id="usericon" />
</form>
<?php endif;?>


</div>
</div>
<br />
<p class="menu">
<?
	foreach( $language as $name => $val )
	{
		echo "<a href=\"index.php?lang=$name\"><img src=\"skin/img/$name.png\" alt=\"$val\" title=\"$val\" /></a>";
	};
?>
</p>
<ol class="menu">
<li class="button" onmouseover="this.className='hover'" onmouseout="this.className='button'" title="<?=$btnfont_hint?>" onclick="setfontsize('8pt')"><span style="font-size:8pt;">A</span></li>
<li class="button" onmouseover="this.className='hover'" onmouseout="this.className='button'" title="<?=$btnfont_hint?>" onclick="setfontsize('9pt')"><span style="font-size:9pt">A</span></li>
<li class="button" onmouseover="this.className='hover'" onmouseout="this.className='button'" title="<?=$btnfont_hint?>" onclick="setfontsize('10pt')"><span style="font-size:10pt">A</span></li>
<li class="button" onmouseover="this.className='hover'" onmouseout="this.className='button'" title="<?=$btnfont_hint?>" onclick="setfontsize('11pt')"><span style="font-size:11pt">A</span></li>
</ol>
<p class="footer"><?=@$login_footer?></p>
</body>
</html>