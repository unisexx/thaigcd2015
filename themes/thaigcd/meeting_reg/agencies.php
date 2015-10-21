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
  <h1>หน่วยงาน</h1>
ค้นหา : ชื่อที่หน่วยงาน
<input type="text" size="60" />
<input type="submit" name="button2" id="button2" value="ค้นหา" />
</div>
<div id="btnADD" class="right1"><input type="button" value="เพิ่มรายการ" class="btn_add"/></div>

<table id="table" class="sortable">
<thead>
<tr>
  <th width="7%"><h3>ลำดับ</h3></th>
  <th width="9%"><h3>รหัส </h3></th>
  <th width="35%"><h3>ชื่อหน่วยงาน</h3></th>
  <th width="39%"><h3>จังหวัด</h3></th>
  <th width="10%" class="nosort"><h3>ลบ</h3></th>
</tr>
</thead>
<tr onclick="#'" style="cursor:pointer;">
  <td>1</td>
  <td>A001</td>
  <td>aaa</td>
  <td>&nbsp;</td>
  <td>x</td>
</tr>
<tr>
  <td>2</td>
  <td>A002</td>
  <td>bbb</td>
  <td>&nbsp;</td>
  <td>x</td>
</tr>
<tr>
  <td>3</td>
  <td>A003</td>
  <td><span id="ctl00_ctl00_MainContent_ContentMain_hotelheader1_lblHotelName">ccc</span></td>
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
  <h1>หน่วยงาน (Add/Edit) </h1>
  <ul>
<li><label>รหัส</label> ระบบจะกำหนดให้อัตโนมัติ</li>
        <li>
    <label>ชื่อหน่วยงาน</label> <input type="text" size="50" /></li>
        <li>
         <label>จังหวัด</label> <select name="">
          <option>เลือกจังหวัด</option>
        </select>
        </li>
    <li><input type="button" value="บัีนทึก" /></li>
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
