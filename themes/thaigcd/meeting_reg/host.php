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
  <h1>ผู้จัด</h1>
ค้นหา : ชื่อผู้จัด
<input type="text" size="60" />
<input type="submit" name="button2" id="button2" value="ค้นหา" />
</div>
<div id="btnADD" class="right1"><input type="button" value="เพิ่มรายการ" class="btn_add"/></div>

<table id="table" class="sortable">
<thead>
<tr>
  <th width="7%"><h3>ลำดับ</h3></th>
  <th width="8%"><h3>รหัส </h3></th>
  <th width="22%"><h3>ชื่อผู้จัด</h3></th>
  <th width="20%"><h3>หน่วยงาน</h3></th>
  <th width="6%" class="nosort"><h3>ลบ</h3></th>
</tr>
</thead>
<tr onclick="window.location='#'" style="cursor:pointer;">
  <td>1</td>
  <td>H001</td>
  <td>สสว</td>
  <td>aaa เชียงใหม่</td>
  <td>x</td>
</tr>
<tr>
  <td>2</td>
  <td>H002</td>
  <td>สสส</td>
  <td>bbb น่าน</td>
  <td>x</td>
</tr>
<tr>
  <td>3</td>
  <td>H003</td>
  <td>สสก</td>
  <td>ccc กรุงเทพฯ</td>
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
  <h1>ผู้จัด (Add/Edit) </h1>
  <ul>
    <li>
      <label>ชื่อผู้จัด</label> <input type="text" size="50" /></li>
    <li>
      <label>หน่วยงาน</label>
    </li>
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
