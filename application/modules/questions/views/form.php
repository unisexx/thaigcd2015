<script type="text/javascript">
	$(function() {
		$('input[name=overnight]').click(function(){
			if($(this).val()==1){
				$(".type2").show();
			}else{
				$(".type2").hide();
			}
		})
		if ($('input[name=overnight]:checked').val() == 1) {
			$(".type2").show();
		}
	});
</script> 
<ul id="breadcrumb">
	<li><a href="#">ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="meetings">รายการการประชุม</a></li>
	<li><a href="questions/form/<?php echo $meeting->id ?>/<?php echo $question->id ?>" ><?php echo ($question->id)?'แก้ไขการลงทะเบียน '.$meeting->name:'ลงทะเบียน '.$meeting->name ?></a></li>
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
			<ul>
				<li><input type="radio" name="overnight" value="0" <?php echo (($question->overnight==0)||(!$question->overnight))?'checked="checked"':'' ?> /> ไม่</li>
				<li><input type="radio" name="overnight" value="1" <?php echo ($question->overnight==1)?'checked="checked"':'' ?> /> ใช่</li>
			</ul>
		</td>
	</tr>
	<tr class="type2" style="display:none;">
		<th>เข้าพักวันที่</th>
		<td>
			<?php echo form_input('check_in',DB2Date($question->check_in),'class="datepicker"') ?>
		</td>
	</tr>
	<tr class="type2" style="display:none;">
		<th>ออกจากที่พักวันที่</th>
		<td>
			<?php echo form_input('check_out',DB2Date($question->check_out),'class="datepicker"') ?>
		</td>
	</tr>
	<tr class="type2" style="display:none;">
		<th style="vertical-align:top; padding:8px 5px 5px;">ห้องพัก</th>
		<td><ul>
				<li><input type="radio" name="room_type" value="1" <?php echo ($question->room_type==1)?'checked="checked"':'' ?> /> ห้องพักเดี่ยวระดับ 9 และระดับ 8 ผู้อำนวยการเท่านั้น</li>
				<li><input type="radio" name="room_type" value="2" <?php echo ($question->room_type==2)?'checked="checked"':'' ?> /> ต้องการพักห้องเดี่ยว กรณีไม่มีสิทธิพักเดี่ยวต้องเสียส่วนเกินเอง คืนละ <?php echo $meeting->money ?> บาท</li>
				<li><input type="radio" name="room_type" value="3" <?php echo ($question->room_type==3)?'checked="checked"':'' ?> /> ต้องการพักห้องคู่ โดย พักคู่กับ  
				<a href="officer/roommate/<?php echo $meeting->id ?>?iframe=true&width=90%&height=90%" rel="lightbox" class="roommate_name" ><span class="icon icon-group"></span> <?php echo ($question->r_id)? $question->r->profile->first_name.' '.$question->r->profile->last_name:'ค้นหา' ?></a><input type="hidden" name="roommate_id" value="<?php echo $question->r_id ?>" /></li>
				<li><input type="radio" name="room_type" value="4" <?php echo ($question->room_type==4)?'checked="checked"':'' ?> /> ต้องการพักห้องคู่ กรณีมีผู้ติดตาม  โปรดระบุ
				<label>ชื่อ-สกุล </label><?php echo form_input('roommate',$question->roommate) ?>
				</li>
				<li><input type="radio" name="room_type" value="5" <?php echo (($question->room_type==5)||(!$question->room_type))?'checked="checked"':'' ?> /> ให้คณะผู้ดำเนินการจัดให้</li>
			</ul>
		</td>
	</tr>
	<tr>
		<th style="vertical-align:top;; padding:8px 5px 5px;">การรับประทานอาหาร</th>
		<td><ul>
				<li><input type="radio" name="meal_type" value="1" <?php echo (($question->meal_type==1)||(!$question->meal_type))?'checked="checked"':'' ?> /> ตามที่คณะคำเนินการจัดให้</li>
				<li><input type="radio" name="meal_type" value="2" <?php echo ($question->meal_type==2)?'checked="checked"':'' ?> /> อิสลาม</li>
				<li><input type="radio" name="meal_type" value="3" <?php echo ($question->meal_type==3)?'checked="checked"':'' ?> /> มังสะวิรัต</li>
			</ul>
		</td>
	</tr>
	<tr>
		<th></th>
		<td><?php echo form_submit('','บันทึก','class="button"')?></td>
	</tr>
</table>
</form>
</div>


