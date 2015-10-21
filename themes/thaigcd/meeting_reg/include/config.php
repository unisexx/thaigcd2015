<link href="../css/text.css" rel="stylesheet" type="text/css" />
<? 
global $t_title;
$title = "ระบบลงทะเบียนการประชุม ThaiGCD";
$bf_title = "Administrator ระบบลงทะเบียนการประชุม ThaiGCD";
$footer = "&copy; Copyright  Co., Ltd.";


function db_connect()
{
$link = mysql_connect("localhost","meeting_reg_root","teerawat");
mysql_select_db("name_db",$link);
$charset = "SET NAMES 'utf8'";
mysql_query($charset);

}
?>

<? 
function db_close()
{
mysql_close();
}
?>

