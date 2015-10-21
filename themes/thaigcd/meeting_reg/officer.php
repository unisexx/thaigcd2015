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
<div id="title" class="left1">
  <h1>รายชื่อผู้อบรม</h1>
ค้นหา : ชื่อที่พัก
<input type="text" size="60" />
<input type="submit" name="button2" id="button2" value="ค้นหา" />
</div>
<div id="btnADD" class="right1"><input type="button" value="เพิ่มรายการ" class="btn_add"/></div>

<table id="table" class="sortable">
<thead>
<tr>
  <th width="7%"><h3>ลำดับ</h3></th>
  <th width="8%"><h3>รหัส </h3></th>
  <th width="22%"><h3>ชื่อ - สกุล</h3></th>
  <th width="20%"><h3>หน่วยงาน</h3></th>
  <th width="37%"><h3>ข้อมูลติดต่อ</h3></th>
  <th width="6%" class="nosort"><h3>ลบ</h3></th>
</tr>
</thead>
<tr onclick="window.location='#'" style="cursor:pointer;">
  <td>1</td>
  <td>T001</td>
  <td>&nbsp;</td>
  <td>aaa เชียงใหม่</td>
  <td>โทรศัพท์ : 02-222-2222 มือถือ : 089-999-9999</td>
  <td>x</td>
</tr>
<tr>
  <td>2</td>
  <td>T002</td>
  <td>&nbsp;</td>
  <td>bbb น่าน</td>
  <td>&nbsp;</td>
  <td>x</td>
</tr>
<tr>
  <td>3</td>
  <td>T003</td>
  <td>&nbsp;</td>
  <td>ccc กรุงเทพฯ</td>
  <td>&nbsp;</td>
  <td>x</td>
</tr>
</table>
<div id="controls">
<div id="perpage">
			<select onchange="sorter.size(this.value)">
			<option value="5">5</option>
				<option value="10" selected="selected">10</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
		  <span class="txtGray11">Entries Per Page</span>
	</div>
		<div id="navigation">
			<img src="images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
			<img src="images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
			<img src="images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
			<img src="images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
		</div>
	<div id="text" class="txtGray11">Displaying Page <span id="currentpage"></span>&nbsp; of <span id="pagelimit"></span></div>
  </div>

<div id="form">
  <h1>รายชื่อผู้อบรม (Add/Edit) </h1>
  <ul>
       	<li><label>ประเภทผู้ใช้งาน</label> <select name="">
  	  <option selected="selected"> ผู้ดูแลระบบ</option>
  	  <option>หัวหน้ากลุ่มงาน</option>
      <option>เจ้าหน้าที่พิเศษ</option>
      <option>เจ้าหน้าที่</option>


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

<script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript">
  var sorter = new TINY.table.sorter("sorter");
	sorter.head = "head";
	sorter.asc = "asc";
	sorter.desc = "desc";
	sorter.even = "evenrow";
	sorter.odd = "oddrow";
	sorter.evensel = "evenselected";
	sorter.oddsel = "oddselected";
	sorter.paginate = true;
	sorter.currentid = "currentpage";
	sorter.limitid = "pagelimit";
	sorter.init("table",0);
  </script>

</body>
</html>
