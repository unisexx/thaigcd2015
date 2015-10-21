<ul id="breadcrumb">
	<li><a href="#" >ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="questions" >แบบสอบถามที่ประเมินแล้ว</a></li>
</ul>
<div id="content">
<div class="search">
<form method="get">
	<label>หัวเรื่องการประชุม: </label>
		<input type="text" size="60" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" />
		<input type="submit" value="ค้นหา" />
</form>
</div>
<?php echo $questions->pagination()?>
<table class="list">
<tr>
	<th>รหัส </th><th>ชื่อผู้พัก</th><th>หน่วยงาน</th><th>ค้างคืน</th><th>ชื่อการประชุม</th><th width="280"></th>
</tr>
<?php foreach($questions as $key => $question): ?>
<tr <?php echo cycle()?>>
	<td><?php echo $question->no ?></td>
	<td>
		<?php echo $question->user->profile->first_name.' '.$question->user->profile->last_name ?>
		<?php if($question->room_type==3): ?>
		<?php echo '<br />'.$question->r->profile->first_name.' '.$question->r->profile->last_name ?>
		<?php if($question->r_status=='confirm'): ?>
		 <span class="icon icon-tick"></span>
		<?php endif; ?>
		<?php elseif($question->room_type==4): ?>
		<?php echo '<br />'.$question->roommate.' ('.$question->relation.')' ?>
		<?php endif; ?>
	</td>
	<td><?php echo $question->user->profile->agency->name ?></td>
	<td><?php echo ($question->overnight==1)?'ใช่':'ไม่'; ?></td>
	<td><?php echo $question->meeting->name ?></td>
  	<td>
  		<?php if($this->session->userdata('id')==$question->user_id): ?>
			<?php if($question->r_status<>'confirm'): ?>
				<?php if(mysql_to_unix($question->meeting->close_date)>time()): ?>
				<a href="questions/form/<?php echo $question->meeting_id?>/<?php echo $question->id?>" class="btn">แก้ไข</a>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
		<?php if($this->session->userdata('id')==$question->r_id): ?>
			<?php if($question->r_status<>'confirm'): ?>
			<a href="questions/confirm/<?php echo $question->id?>" class="btn">ยืนยัน</a>
			<a href="questions/cancel/<?php echo $question->id?>" class="btn">ยกเลิก</a>
			<?php endif; ?>
		<?php endif; ?>
		<a href="questions/view/<?php echo $question->id?>" class="btn">ดูรายละเอียด</a>
  	</td>
</tr>
<?php endforeach ?>

</table>
<?php echo $questions->pagination()?>
</div>