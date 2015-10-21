<ul id="breadcrumb">
	<li><a href="#" >ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="hosts" >ผู้จัด</a></li>
</ul>
<div id="content">
<div class="search">
<form method="get">
	<label>ชื่อผู้จัด: </label>
		<input type="text" size="60" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" />
		<input type="submit" value="ค้นหา" />
</form>
</div>
<?php echo $hosts->pagination()?>
<table class="list">
<tr>
	<th>รหัส </th><th>ชื่อผู้จัด</th><th>หน่วยงาน</th><th width="90"><a href="hosts/form" class="btn">เพิ่มรายการ</a></th>
</tr>
<?php foreach($hosts as $key => $host): ?>
<tr <?php echo cycle()?>>

  <td>H<?php echo substr('000'.$host->id,-3) ?></td>
  <td><?php echo $host->name ?></td>
  <td><?php echo $host->agency->name ?></td>
  <td>
		<a href="hosts/form/<?php echo $host->id?>" class="btn">แก้ไข</a>
		<a href="hosts/delete/<?php echo $host->id?>" class="btn" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')">ลบ</a>
  </td>
</tr>
<?php endforeach ?>

</table>
<?php echo $hosts->pagination()?>
</div>