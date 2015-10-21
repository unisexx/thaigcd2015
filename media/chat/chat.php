<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$title?> [<?=$chat_title?>]</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$charset?>" />
<script language="javascript" type="text/javascript" src="js/ajax.js"></script>
<script language="javascript" type="text/javascript" src="js/cookie.js"></script>
<link rel="stylesheet" type="text/css" href="skin/chat.css" media="screen" />
<script language="javascript" type="text/javascript">
<?
	$ie = strstr( $_SERVER[HTTP_USER_AGENT] , "MSIE" );
	$data = implode('", "', $smile);
	echo 'var smile = new Array("'.$data.'")'."\n"; //ไอคอนยิ้ม
	$data = implode("/g, /", $smile);
	$data = eregi_replace ("[\(\)\$\#\*\^\+]", "\\\\0" , $data);
	echo "var smiles = new Array(/$data/g);\n"; //สัญลักษณ์ของไอคอนยิ้ม
	$data = implode('", "', $smileicon);
	echo 'var icons = new Array("'.$data.'")'.";\n"; //ชื่อไอคอนยิ้ม
	echo "var blockusers = new Array()\n"; //แอเรย์เก็บรายชื่อคนโดน block
	//ชื่อห้องเลือกห้องแรกเลย
	echo "var rooms = Array('".implode("', '", $rooms)."');\n";
	echo "var room = '$rooms[0]';\n";
	echo "var iconwidth = $iconwidth;\n";
	echo "var imagewidth = $imagewidth;\n";
	echo "var linecount = $linecount;\n";
	echo "var connector = '$alluser';\n";
	echo "var connectorname = '$alluser';\n";
	echo "var connectorcolor = '#000000';\n";
	echo "var smilepath = '$smilepath';\n";
	$_SESSION[chatid] =  getsessionid();
	echo "var id = '$_SESSION[chatid]';\n";
	//เวลาในการอัปเดทส่วนต่างๆ
	echo "var usertime = $usertime;\n";
	echo "var msgtime = $msgtime;\n";
	//ตัวแปรเก็บเวลาที่ปรับปรุงล่าสุด
	echo "var usercount = 0;\n";
	echo "var msgcount = 0;\n";
	//ตัวแปรข้อความทั่วไป
	echo "var alluser = '$alluser';\n";
	echo "var alluser_title = '$alluser_title';\n";
	echo "var welcome = '$welcome';\n";
	echo "var logout = '$logout';\n";
	echo "var pm_hint = '$pm_hint';\n";
	echo "var pm_to = '$pm_to';\n";
	echo "var pm_form = '$pm_form';\n";
	echo "var con_text = '$con_text';\n";
	echo "var newroom_hint = '$newroom_hint';\n";
	echo "var talk = '$talk';\n";
	echo "var blockhint = '$block_hint';\n";
?>
</script>
<script language="javascript" type="text/javascript" src="js/chat.js"></script>
</head>
<body>
<?include("skin/chat.php"); //แสดง chat room
if ( $ie ) //ยอมให้ใช้เสียงได้ถ้าเป็น IE
{
	echo "<object id=\"type\" classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\" width=\"0\" height=\"0\">\n";
	echo "<param name=\"URL\" value=\"skin/type.wav\" />\n";
	echo "<param name=\"autoStart\" value=\"false\" />\n";
	echo "</object>\n";
	echo "<object id=\"online\" classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\" width=\"0\" height=\"0\">\n";
	echo "<param name=\"URL\" value=\"skin/online.wav\" />\n";
	echo "<param name=\"autoStart\" value=\"false\" />\n";
	echo "</object>\n";
	echo "<object id=\"logout\" classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\" width=\"0\" height=\"0\">\n";
	echo "<param name=\"URL\" value=\"skin/logout.wav\" />\n";
	echo "<param name=\"autoStart\" value=\"false\" />\n";
	echo "</object>\n";
};
?>
</body>
</html>