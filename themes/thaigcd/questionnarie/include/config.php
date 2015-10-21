
<? 
global $t_title;
$title = "ระบบสร้างแบบสอบถาม ThaiGCD";
$bf_title = "Administrator ระบบสร้างแบบสอบถาม ThaiGCD";
$footer = "&copy; Copyright  Co., Ltd.";


function db_connect()
{
$link = mysql_connect("localhost","doc_storage_root","teerawat");
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

