<script type="text/javascript">
	$(function() {
		
			if(<?php echo ($question->overnight==1)?1:0 ?>==1){
				$(".type2").show();
			}else{
				$(".type2").hide();
			}

		if ($('input[name=overnight]:checked').val() == 1) {
			$(".type2").show();
		}
	});
</script> 
<ul id="breadcrumb">
	<li><a href="#">ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="meetings">แบบสอบถาม</a></li>
	<li>ดูรายละเอียด</li>
</ul>
<div id="content">
<script type="text/javascript">
	function lightbox_close()
	{
		$.prettyPhoto.close();
	}
</script>
<form method="post" action="questions/save/<?php echo $meeting->id?>/<?php echo $question->id ?>" enctype="multipart/form-data" >
<table class="form tab">
	<tr>
		<th>หัวเรื่องการประชุม</th>
		<td><?php echo $meeting->name ?></td>
	</tr>
	<tr>
		<th>ที่พัก</th>
		<td><?php echo $meeting->camp->name ?></td>
	</tr>
	<tr>
		<th>ผู้เข้าพัก</th>
		<td><?php echo $question->user->profile->first_name.' '.$question->user->profile->last_name ?></td>
	</tr>
	<tr>
		<th>ผู้จัด</th>
		<td><?php echo $meeting->host->name ?></td>
	</tr>
	<tr>
		<th>จำนวนเงินส่วนต่าง</th>
		<td><?php echo $meeting->money ?> บาท</td>
	</tr>
	<tr>
		<th>วันที่เริ่มประชุม</th>
		<td><?php echo mysql_to_th($meeting->start_date,'F') ?></td>
	</tr>
	<tr>
		<th>วันที่สิ้นสุดประชุม</th>
		<td><?php echo mysql_to_th($meeting->end_date,'F') ?></td>
	</tr>
	<tr>
		<th>ปิดระบบลงทะเบียน</th>
		<td><?php echo mysql_to_th($meeting->close_date,'F') ?></td>
	</tr>
	<tr>
		<th style="vertical-align:top; padding:8px 5px 5px;">เอกสาร</th>
		<td>
			<ul>
				<?php foreach($meeting->meeting_document->order_by('id','asc')->get() as $doc): ?>
				<li><a href="meetings/download/<?php echo $doc->id ?>"><span class="icon icon-page-save"></span> <?php echo $doc->name ?></a></li>
				<?php endforeach; ?>
			</ul>
		</td>
	</tr>
	<tr>
		<th style="vertical-align:top; padding:8px 5px 5px;">ค้างคืน</th>
		<td>
			 <?php echo ($question->overnight==1)?'ใช่':'ไม่' ?>
		</td>
	</tr>
	<tr class="type2" style="display:none;">
		<th>เข้าพักวันที่</th>
		<td>
			<?php echo mysql_to_th($question->check_in,'F') ?>
		</td>
	</tr>
	<tr class="type2" style="display:none;">
		<th>ออกจากที่พักวันที่</th>
		<td>
			<?php echo mysql_to_th($question->check_out,'F') ?>
		</td>
	</tr>
	<tr class="type2" style="display:none;">
		<th style="vertical-align:top; padding:8px 5px 5px;">ห้องพัก</th>
		<td>
			<?php echo $room_type[$question->room_type]?>
			<?php if(($question->r_status=='confirm')&&($question->room_type==3)): ?>
		 	 <span class="icon icon-tick"></span>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<th style="vertical-align:top;; padding:8px 5px 5px;">การรับประทานอาหาร</th>
		<td><?php echo $meal_type[$question->meal_type] ?>
		</td>
	</tr>
</table>
</form>
</div>


