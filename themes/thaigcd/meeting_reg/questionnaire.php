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
  <h1>แบบสอบถามการเข้าพัก</h1>
ค้นหา : รหัส / ชื่อ - สกุล / หัวเรื่องประชุม
<input name="" type="text" />
<select name="select" id="select">
  <option>เลือกหน่วยงาน</option>
</select>
วันที่
<input name="input" type="text" size="10" />
ถึง 
<input name="input2" type="text" size="10" />
<input type="submit" name="Submit" value="ค้นหา" />
</div>
<div id="btnADD" class="right1"><input type="button" value="เพิ่มรายการ" class="btn_add"/></div>

<table id="table" class="sortable">
<thead>
<tr>
  <th width="6%"><h3>ลำดับ</h3></th>
  <th width="7%"><h3>รหัส </h3></th>
  <th width="17%"><h3>ชื่อผู้พัก</h3></th>
  <th width="17%"><h3>หน่วยงาน</h3></th>
  <th width="38%"><h3>ชื่อการประชุม</h3></th>
  <th width="9%"><h3>เอกสาร</h3></th>
  <th width="9%"><h3>วันที่บันทึก</h3></th>
  <th width="6%" class="nosort"><h3>ลบ</h3></th>
</tr>
</thead>
<tr onclick="window.location='#'" style="cursor:pointer;">
  <td>1</td>
  <td>2010010</td>
  <td>นางทักษญา   พรหมรักษา</td>
  <td>aaa</td>
  <td><strong>การประชุมเชิงปฎิบัติการสร้างความผาสุกในการทำงานและก่อนเกษียณอายุราชการ</strong><br />
    โรงแรมการ์เด้น คลิฟ รีสอร์ทแอนด์สปา พัทยา</td>
  <td>&nbsp;</td>
  <td>08/06/2553</td>
  <td>x</td>
</tr>
<tr>
  <td>2</td>
  <td>2010009</td>
  <td>นางสาวอรวรรณ เชื้อบุญมี</td>
  <td>bbb</td>
  <td><strong>การประเมินผลการปฏิบัติงานโดยหลักสมรรถนะ </strong><br />
    โรงแรมปริ๊นซ์ พาเลซ (Prince Palace Hotel) <br /></td>
  <td>&nbsp;</td>
  <td>08/06/2553</td>
  <td>x</td>
</tr>
<tr>
  <td>3</td>
  <td>2010008</td>
  <td>นายปัญญา   ภักดีสาร</td>
  <td>ccc</td>
  <td><strong>การประชุมเชิงปฎิบัติการสร้างความผาสุกในการทำงานและก่อนเกษียณอายุราชการ</strong><br />
    โรงแรมการ์เด้น คลิฟ รีสอร์ทแอนด์สปา พัทยา</td>
  <td>&nbsp;</td>
  <td>07/06/2553</td>
  <td>x</td>
</tr>
<tr>
  <td>4</td>
  <td>2010</td>
  <td>นางสาวยุภาพร เสวิสิทธิ์ <br />
นางกัญญา   แกมขุนทด</td>
  <td>bbb</td>
  <td><strong>การประชุมเชิงปฎิบัติการสร้างความผาสุกในการทำงานและก่อนเกษียณอายุราชการ</strong><br />
โรงแรมการ์เด้น คลิฟ รีสอร์ทแอนด์สปา พัทยา</td>
  <td>&nbsp;</td>
  <td>05/06/2553</td>
  <td>x</td>
</tr>
<tr>
  <td>5</td>
  <td>2010</td>
  <td>นายเรืองเดช   ษรจันทร์</td>
  <td>aaa</td>
  <td><strong>การประชุมเชิงปฎิบัติการสร้างความผาสุกในการทำงานและก่อนเกษียณอายุราชการ</strong><br />
โรงแรมการ์เด้น คลิฟ รีสอร์ทแอนด์สปา พัทยา</td>
  <td>&nbsp;</td>
  <td>05/06/2553</td>
  <td>x</td>
</tr>
<tr>
  <td>6</td>
  <td>2010</td>
  <td>นายสากล   ร่วมธรรม</td>
  <td>aaa</td>
  <td><strong>การประเมินผลการปฏิบัติงานในภาคปฎิบัติ<br />
</strong>Sofitel Centara Grand Resort &amp; Villas </td>
  <td>&nbsp;</td>
  <td>04/06/2553</td>
  <td>x</td>
</tr>
<tr>
  <td>7</td>
  <td>2010</td>
  <td>นายวัฒนพงษ์   สุทธิ<br />
    นายบุญหลาย   แสนประสิทธิ์</td>
  <td>ccc</td>
  <td><strong>การประเมินผลการปฏิบัติงานในภาคปฎิบัติ<br />
    </strong>Sofitel Centara Grand Resort &amp; Villas </td>
  <td>&nbsp;</td>
  <td>01/06/2553</td>
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
  <h1>แบบสอบถามการเข้าพัก (Add/Edit)</h1>
  <div id="SearchMeeting"><label>ค้นหาหัวเรื่องการประชุม</label><input type="text" size="60" /> 
    วันที่
    <input name="input" type="text" size="10" />
ถึง
<input name="input2" type="text" size="10" /> 
ผู้จัด
<select name="select">
</select> 
<input type="submit" name="button" id="button" value="ค้นหา" /></div>
      <h2>การประชุมเชิงปฎิบัติการสร้างความผาสุกในการทำงานและก่อนเกษียณอายุราชการ<br />
  ระหว่างวันที่ 26-28 สิงหาคม 2553<br />
  โรงแรมการ์เด้น คลิฟ รีสอร์ทแอนด์สปา พัทยา จังหวัดชลบุรี<br />
  222/20 Soi 16 Naklua Pattaya Naklua Road Tambol Naklua Amphur Banglamung 038-222-2222

</h2>
  ภายในวันที่ 23 กรกฎาคม 2553 (ถ้าเกินกำหนดจะไม่สามารถจัดหาที่พักให้)
	<ul>
   	  <li><h2>1. การเข้าพักผู้จัดได้จัดไว้ที่ โรงแรมการ์เด้น คลิฟ รีสอร์ทแอนด์สปา พัทยา จังหวัดชลบุรี</h2></li>
        <li><input name="" type="radio" value="" /><label>ไม่ค้างคืน</label></li>
        <li><input name="" type="radio" value="" /><label>พักค้างคืน</label>
        
  <ul id="yes">    
        <li><label>เข้าพักวันที่</label> <input name="" type="text" /> <label>เวลา</label> <input name="input3" type="text" /></li>
        <li><label>ออกจากที่พักวันที่</label> <input name="input4" type="text" /> <label>เวลา</label> <input name="input4" type="text" /></li>
		<li><input name="" type="radio" value="" /> ห้องพักเดี่ยวระดับ 9 และระดับ 8 ผู้อำนวยการเท่านั้น</li>
        <li><input name="" type="radio" value="" /> ต้องการพักห้องเดี่ยว กรณีไม่มีสิทธิพักเดี่ยวกต้องเสียส่วนเกินสิทธิเอง คืนละ 750.- บาท</li>
        <li><input name="" type="radio" value="" /> ต้องการพักห้องคู่ โดย 
		<ul>
		
		 <li><input name="" type="radio" value="" />พักคู่กับ <input name="input5" type="text" /></li>
        <span style="background-color:#FCC; padding:2px 5px;"> กรณีหาคู่ไม่เจอพิมพ์ด้านล่าง </span>
        <li><label>ชื่อ</label><input name="" type="text" /><label>นามสกุล</label><input name="" type="text" /></li>
        <li><label>ตำแหน่ง</label><input name="" type="text" /><label>ระดับ</label><input name="" type="text" /></li>
        <li><label>กลุ่ม / ฝ่าย</label><input name="" type="text" /></li>
      	<li><input name="" type="radio" value="" /><label>ให้คณะผู้ดำเนินการจัดให้</label></li>
		
		</ul>
		
		</li>
       
    </ul>      
      </li>
  </ul>
<ul>
        <li><h2>2. การรับประทานอาหาร</h2></li>
        <li><input name="" type="radio" value="" /><label>ตามที่คณะคำเนินการจัดให้</label><input name="" type="radio" value="" /><label>อิสลาม</label><input name="" type="radio" value="" />
        <label>มังสะวิรัต</label></li>
  </ul>
    <ul>
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
