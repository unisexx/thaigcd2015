<?
	include "include/config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title;?></title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/layout.css"/>
<link rel="stylesheet" type="text/css" href="css/web.css"/>

</head>

<body>
<div id="DvLogin">aRRomDEE  Hahaha | ออกจากระบบ</div>
<div id="DvNavi">
<div class="left1">
<input type="button" class="txtBlue121" value="Text" />
  <input type="button" class="txtBlue121" value="Paragraph Text" />
  <input type="button" class="txtBlue121" value="Multiple choice" />
  <input type="button" class="txtBlue121" value="Checkboxes" />
  <input type="button" class="txtBlue121" value="Scale" />
  <input type="button" class="txtBlue121" value="Grid" />
<input type="button" class="txtGray121" value="ดูรายงาน" />
<input type="button" class="txtGray121" value="ส่งอีเมล์" />
</div>
<div class="right1">
<input type="button" value="บันทึก"/>
</div>
</div>

<div id="DvSample">
ดูตัวอย่างได้ที่นี่  <a href="#">http://thaigcd.ddc.moph.go.th/viewform?form_create=4154h14575h71 </a></div>

<div id="DvForm" class="clear">
<form action="" method="post" name="frm" id="frm">
<div id="DvTopic">	
	<input type="text" class="txtboxTopic" id="topic" onmousedown="document.frm.topic.value=''" onk  value="หัวเรื่อง"/>
    <p></p>
    <textarea class="txtboxDetailTopic">เกริ่นนำ</textarea>
</div><!--DvTopic-->

<div id="DvText">

<table class="tb1">
<tr>
<td>
<span class="show">
<input type="image" src="images/ico_dup.png" alt="ก๊อปปี้รายการนี้" title="ก๊อปปี้รายการนี้" width="24" height="24"/>
<input type="image" src="images/ico_del.png"  alt="ลบรายการนี้" title="ลบรายการนี้" width="24" height="24"/>
</span>
</td>
<td></td>
</tr>
<tr>
<th width="13%">หัวข้อคำถาม</th>
<td width="87%"><input name="textfield" type="text" id="textfield" size="50" />
(Text)</td>
</tr>
<tr>
  <th>ข้อความ</th>
  <td><input name="textfield2" type="text" id="textfield2" size="50" /></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td><input name="textfield3" type="text" disabled="disabled" id="textfield3" value="คำตอบ" readonly="readonly" class="txtboxDis"/></td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="checkbox" id="checkbox" />
  คำถามที่จำเป็นต้องกรอก</td>
</tr>
</table>
</div><!--DvText-->

<div id="DvParagraphText">
<table class="tb1">
<tr>
<td>
<span class="show">
<input type="image" src="images/ico_dup.png" alt="ก๊อปปี้รายการนี้" title="ก๊อปปี้รายการนี้" width="24" height="24"/>
<input type="image" src="images/ico_del.png"  alt="ลบรายการนี้" title="ลบรายการนี้" width="24" height="24"/>
</span>
</td>
<td></td>
</tr>
<tr>
<th width="13%">หัวข้อคำถาม</th>
<td width="87%"><input name="textfield" type="text" id="textfield" size="50" />
(Paragraph Text)</td>
</tr>
<tr>
  <th>ข้อความ</th>
  <td><input name="textfield2" type="text" id="textfield2" size="50" /></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td><textarea name="textfield3" cols="50" rows="3" disabled="disabled" readonly="readonly" class="txtboxDis" id="textfield3">คำตอบแบบยาว</textarea></td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="checkbox" id="checkbox" />
  คำถามที่จำเป็นต้องกรอก</td>
</tr>
</table>
</div><!--DvParagraphText-->

<div id="DvMutipleChoice">
<table class="tb1">
<tr>
<td>
<span class="show">
<input type="image" src="images/ico_dup.png" alt="ก๊อปปี้รายการนี้" title="ก๊อปปี้รายการนี้" width="24" height="24"/>
<input type="image" src="images/ico_del.png"  alt="ลบรายการนี้" title="ลบรายการนี้" width="24" height="24"/>
</span>
</td>
<td></td>
</tr>
<tr>
<th width="13%">หัวข้อคำถาม</th>
<td width="87%"><input name="textfield" type="text" id="textfield" size="50" />
(Mutiple Choice)</td>
</tr>
<tr>
  <th>ข้อความ</th>
  <td><input name="textfield2" type="text" id="textfield2" size="50" /></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td>
  <input type="radio" name="radio" id="radio" value="radio" />
  <input type="text" name="textfield4" id="textfield4" />
  <a href="#"><img src="images/ico_delete.jpg" width="10" height="9" /></a>      
  <a href="#" class="more"> add More</a> or <a href="#" class="more">add Other</a>
  </td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td><input type="checkbox" name="checkbox" id="checkbox" />
    คำถามที่จำเป็นต้องกรอก</td>
</tr>
</table>
</div><!--DvMutipleChoice-->

<div id="DvCheckboxes">
<table class="tb1">
<tr>
<td>
<span class="show">
<input type="image" src="images/ico_dup.png" alt="ก๊อปปี้รายการนี้" title="ก๊อปปี้รายการนี้" width="24" height="24"/>
<input type="image" src="images/ico_del.png"  alt="ลบรายการนี้" title="ลบรายการนี้" width="24" height="24"/>
</span>
</td>
<td></td>
</tr>
<tr>
<th width="13%">หัวข้อคำถาม</th>
<td width="87%"><input name="textfield" type="text" id="textfield" size="50" />
(Checkboxes)</td>
</tr>
<tr>
  <th>ข้อความ</th>
  <td><input name="textfield2" type="text" id="textfield2" size="50" /></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td><input type="checkbox" name="checkbox" id="checkbox" value="checkbox" />
    <input type="text" name="textfield7" id="textfield7" />
    <a href="#"><img src="images/ico_delete.jpg" width="10" height="9" /></a> <a href="#" class="more"> add More</a> or <a href="#" class="more">add Other</a></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td><input type="checkbox" name="checkbox" id="checkbox" />
    คำถามที่จำเป็นต้องกรอก</td>
</tr>
</table>
</div><!--DvCheckboxes-->

<div id="DvScale">
<table class="tb1">
<tr>
<td>
<span class="show">
<input type="image" src="images/ico_dup.png" alt="ก๊อปปี้รายการนี้" title="ก๊อปปี้รายการนี้" width="24" height="24"/>
<input type="image" src="images/ico_del.png"  alt="ลบรายการนี้" title="ลบรายการนี้" width="24" height="24"/>
</span>
</td>
<td></td>
</tr>
<tr>
<th width="13%">หัวข้อคำถาม</th>
<td width="87%"><input name="textfield" type="text" id="textfield" size="50" />
(Scale)</td>
</tr>
<tr>
  <th>ข้อความ</th>
  <td><input name="textfield2" type="text" id="textfield2" size="50" /></td>
</tr>
<tr>
  <th>ระดับ</th>
  <td><select name="select" id="select">
    <option>0</option>
    <option>1</option>
  </select>
ถึง
<select name="select2" id="select2">
  <option>3</option>
  <option>4</option>
  <option selected="selected">5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
</select></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td>0 :
    <input name="textfield5" type="text" id="textfield5" size="10" /></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td>5 :
    <input name="textfield6" type="text" id="textfield6" size="10" /></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td><input type="checkbox" name="checkbox" id="checkbox" />
    คำถามที่จำเป็นต้องกรอก</td>
</tr>
</table>
</div><!--DvScale-->

<div id="DvGrid">
<table class="tb1">
<tr>
<td>
<span class="show">
<input type="image" src="images/ico_dup.png" alt="ก๊อปปี้รายการนี้" title="ก๊อปปี้รายการนี้" width="24" height="24"/>
<input type="image" src="images/ico_del.png"  alt="ลบรายการนี้" title="ลบรายการนี้" width="24" height="24"/>
</span>
</td>
<td></td>
</tr>
<tr>
<th width="18%">หัวข้อคำถาม</th>
<td width="82%"><input name="textfield" type="text" id="textfield" size="50" />
(Grid)</td>
</tr>
<tr>
  <th>ข้อความ</th>
  <td><input name="textfield2" type="text" id="textfield2" size="50" /></td>
</tr>
<tr>
  <th>จำนวนแนวตั้ง</th>
  <td><select name="select3" id="select3">
    <option>1</option>
    <option>2</option>
    <option selected="selected">3</option>
    <option>4</option>
    <option>5</option>
  </select></td>
</tr>
<tr>
  <th>ข้อความแนวตั้งที่ 1</th>
  <td><input name="textfield8" type="text" id="textfield8" size="20" /></td>
</tr>
<tr>
  <th>ข้อความแนวตั้งที่ 2</th>
  <td><input name="textfield9" type="text" id="textfield9" size="20" /></td>
</tr>
<tr>
  <th>ข้อความแนวตั้งที่ 3</th>
  <td><input name="textfield10" type="text" id="textfield10" size="20" /></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td>&nbsp;</td>
</tr>
<tr>
  <th>ข้อความแนวนอนที่ 1</th>
  <td><input type="text" name="textfield11" id="textfield11" />
    <a href="#"><img src="images/ico_delete.jpg" width="10" height="9" /> add More</a></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td>&nbsp;</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="checkbox" id="checkbox" />
  คำถามที่จำเป็นต้องกรอก</td>
</tr>
</table>
</div><!--DvGrid-->

</form>
</div><!--form-->
</body>
</html>
