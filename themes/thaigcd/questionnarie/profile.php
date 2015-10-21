<?
	include "include/config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$bf_title;?></title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/layout.css"/>
<link rel="stylesheet" type="text/css" href="css/web.css"/>
<link rel="stylesheet" href="css/sort.css" />
</head>

<body>
<? include "_menu.php"?>

<div id="form">
  <h1>ประวัติส่วนตัว  </h1>
  <ul>
  	<li><label>ประเภทผู้ใช้งาน</label> <select name="">
  	  <option>Admin</option>
  	  <option>User</option>
  	</select></li>
    <li><label>ชื่อ - สกุล</label> <input type="text" size="50" /></li>
    <li><label>เพศ</label> <input name="" type="radio" value="" />ชาย <input name="" type="radio" value="" />หญิง</li>
    <li><label>ตำแหน่ง</label> </li>
    <li><label>ระดับ</label> </li>
    <li><label>หน่วยงาน</label> </li>
    <li><label>จังหวัด</label> </li>
    <li><label>โทรศัพท์</label> </li>
    <li><label>มือถือ</label> </li>
    <li><label>โทรสาร</label> </li>
    <li><label>อีเมล์</label> </li>
    <li><label>รหัสผ่าน</label> </li>
    <li><label>เปลี่ยนรหัสผ่าน</label> </li>
    <li><label>ยืนยันรหัสผ่าน</label> </li>
    <li><input type="button" value="บันทึก" /></li>
  </ul>
    
</div><!--form-->  

</body>
</html>
