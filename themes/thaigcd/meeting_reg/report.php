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
  <h1>รายงาน</h1>
จำนวนผู้อบรมภายใต้การประชุม | จำนวนผู้อบรบภายใต้หน่วยงาน

<br />
ค้นหา : หัวเรื่องประชุม
<input name="input" type="text" />

วันที่
<input name="input2" type="text" size="10" />
ถึง
<input name="input2" type="text" size="10" />
<input type="submit" name="Submit" value="ค้นหา" />
</div>

<table id="table" class="sortable">
<thead>
<tr>
  <th><h3>ลำดับ</h3></th>
  <th><h3>หัวเรื่องการประชุม</h3></th>
  <th><h3>วันที่</h3></th>
  <th><h3>พักค้าง</h3></th>
  <th><h3>ไม่พักค้าง</h3></th>
  <th><h3>จำนวนผู้อบรบ</h3></th>
</tr>
</thead>
<tr onclick="#'" style="cursor:pointer;">
  <td>1</td>
  <td>การประชุมเชิงปฎิบัติการสร้างความผาสุกในการทำงานและก่อนเกษียณอายุราชการ</td>
  <td>26/08/2553 - 28/08/2553</td>
  <td>97</td>
  <td>3</td>
  <td>100</td>
</tr>
<tr>
  <td>2</td>
  <td>การประเมินผลการปฏิบัติงานโดยหลักสมรรถนะ </td>
  <td>20/08/2553 - 22/08/2553</td>
  <td>30</td>
  <td>20</td>
  <td>50</td>
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
