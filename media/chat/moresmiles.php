<?
$smileurl="skin/img/"; //path ของรูปไอคอนยิ้ม
$listperpage=21;
$iconstart=0;

include("config.php");

$page=$_GET[page];
if ( empty( $page ) )
{
	$page=1; //แสดงหน้าแรก
};

$totalicon=count( $smileicon ); //จำนวนไอคอนทั้งหมด
$count = $totalicon - $iconstart; //จำนวนไอคอนทั้งหมดที่จะแสดง
$pages = (int)( $count / $listperpage ); //จำนวนหน้าทั้งหมด
if ( $pages * $listperpage < $count )
{
	$pages++;
};
$start = $listperpage * ( $page - 1 );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
function SmileIT(smile){
	window.opener.document.forms['frmPost'].elements['text'].value = window.opener.document.forms['frmPost'].elements['text'].value + smile;
	window.opener.focus();
	window.opener.document.forms['frmPost'].elements['text'].focus();
}
</script>
<style type="text/css">
img {
	border:none;
}
table {
	border-left:1px solid #5566FF;
	border-top:1px solid #5566FF;
}
th {
	text-align:left;
	padding:7px;
	font-family:Tahoma;
	font-size:9pt;
	border-bottom:1px solid #5566FF;
	border-right:1px solid #5566FF;
}
td {
	padding:5px;
	text-align:center;
	border-right:1px solid #5566FF;
	border-bottom:1px solid #5566FF;
	background-color:#D3E4F5;
}
td.next {
	font-family:Tahoma;
	font-size:8pt;
	background-color:#ffffff;
	padding:10px;
}
a:link {
	color:maroon;
	text-decoration: none;
}
a:visited {
	color:maroon;
	text-decoration: none;
}
a:hover {
	color:#526AF9;
	text-decoration: none;
}
</style>
<title>Clickable Smilies</title>
</head>
<body>
<center>
<?
echo "<table cellpadding='0' cellspacing='0'><tr><th colspan='3'>More Icons</th></tr><tr>\n";
$n = -1;
$a = 0;
$full = false;
for ($i = $start; $a < $listperpage && !$full; $i++) {
	$q = $i + $iconstart;
	if ($n == 2) {
		if ($q >= $totalicon) $full = true;
		else {
			echo "</tr>\n<tr>\n";
			$n = 0;
		}
	} else $n++;
	if (!$full) {
		$a++;
		if ($q >= $totalicon) echo "<td>&nbsp;</td>";
		else echo "<td><a href=\"javascript:SmileIT('$smile[$q]')\" title=\"$smile[$q]\"><img src=\"$smileurl$smileicon[$q]\" alt=\"$smile[$q]\" /></a></td>\n";
	}
};
echo "</tr><tr><td class=\"next\" colspan=\"3\">\n";
echo "[ ";
for ($i=0;$i<$pages;$i++){
	$n=$i+1;
	if ($n==$page) echo "<b>$n</b> ";
	else echo "<a href=\"?page=$n\">$n</a> ";
};
echo "]";
echo "</td></tr></table>\n";
?>
</center>
</body>
</html>
