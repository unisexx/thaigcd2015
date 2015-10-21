<ul id="breadcrumb">
	<li><a href="#" >ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="meetings" >รายการการประชุม</a></li>
</ul>
<div id="content">
<div class="search">
<form method="get">
	<label>หัวเรื่องการประชุม: </label>
	<input type="text" size="60" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" />
	<input type="submit" value="ค้นหา" />
</form>
</div>
<?php echo $meetings->pagination()?>
<table class="list">
<tr>
	<th>หัวเรื่อง </th><th>สถานที่</th><th width="300">รายละเอียด</th><th width="150">เอกสาร</th><th width="90"><?php if(is_authen('admin_meetings','add')): ?><a href="meetings/form" class="btn">เพิ่มรายการ</a><?php endif; ?></th>
</tr>
<?php foreach($meetings as $meeting): ?>
<tr <?php echo cycle()?>>
  	<td><?php echo $meeting->name?></td>
  	<td><?php echo $meeting->camp->name ?></td>
  	<td>
  		<ul>
	 		<li><span class="icon icon-date"></span> <label>วันที่เริ่มประชุม:</label> <?php echo mysql_to_th($meeting->start_date) ?></li>
			<li><span class="icon icon-date"></span> <label>วันที่สิ้นสุดประชุม:</label> <?php echo mysql_to_th($meeting->end_date) ?></li>
			<li><span class="icon icon-date"></span> <label>วันปิดรับลงทะเบียน:</label> <?php echo mysql_to_th($meeting->close_date) ?></li>
		</ul>
	</td>
	<td>
 		<ul>
			<?php foreach($meeting->meeting_document->order_by('id','asc')->get() as $doc): ?>
			<li><a href="meetings/download/<?php echo $doc->id ?>"><span class="icon icon-page-save"></span> <?php echo $doc->name ?></a></li>
			<?php endforeach; ?>
		</ul>
	</td>
  <td>
		<?php if(is_authen('admin_meetings','edit')): ?>
		<a href="meetings/form/<?php echo $meeting->id?>" class="btn">แก้ไข</a>
		<?php endif; ?>
		<?php if(is_authen('admin_meetings','delete')): ?>
		<a href="meetings/delete/<?php echo $meeting->id?>" class="btn" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')">ลบ</a><br /><br />
		<?php endif; ?>
		<?php if(is_authen('admin_meetings')): ?>
		<a href="meetings/report/<?php echo $meeting->id?>" class="btn">ดูรายงาน</a><br /><br />
		<?php endif; ?>
		<?php if(mysql_to_unix($meeting->close_date)>time()): ?>
		<?php
			$question = new Question;
			$question->where('meeting_id',$meeting->id);
			$question->where('(user_id = '.$this->session->userdata('id').' or r_id = '.$this->session->userdata('id').')');
			$question->get();
			if(!$question->exists()):
		?>
		<a href="questions/form/<?php echo $meeting->id?>" class="btn">ลงทะเบียน</a>
			<?php endif; ?>
		<?php endif; ?>
  </td>
</tr>
<?php endforeach ?>

</table>
<?php echo $meetings->pagination()?>
</div>