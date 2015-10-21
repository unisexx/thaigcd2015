<ul id="breadcrumb">
	<li><a href="#" >ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="camps" >ข้อมูลที่พัก</a></li>
</ul>
<div id="content">
<div class="search">
<form method="get">
	<label>ชื่อที่พัก: </label>
		<input type="text" size="60" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" />
		<input type="submit" value="ค้นหา" />
</form>
</div>
<?php echo $camps->pagination()?>
<table class="list">
<tr>
	<th>รหัส </th><th>ชื่อที่พัก</th><th>สถานที่</th><th></th><th width="90"><a href="camps/form" class="btn">เพิ่มรายการ</a></th>
</tr>
<?php foreach($camps as $key => $camp): ?>
<tr <?php echo cycle()?>>
	<td>C<?php echo substr('000'.$camp->id,-3) ?></td>
	<td><?php echo $camp->name ?></td>
	<td><?php echo $camp->address ?></td>
	<td>
		<?php if(is_file('uploads/camp/'.$camp->map)): ?>
  		<a rel="lightbox" href="uploads/camp/<?php echo $camp->map ?>"><span class="icon icon-map"></span> แผนที่</a>
		<?php endif; ?>
	</td>
  	<td>
		<a href="camps/form/<?php echo $camp->id?>" class="btn">แก้ไข</a>
		<a href="camps/delete/<?php echo $camp->id?>" class="btn" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')">ลบ</a>
  	</td>
</tr>
<?php endforeach ?>

</table>
<?php echo $camps->pagination()?>
</div>