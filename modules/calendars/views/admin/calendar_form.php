<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/tinymce.js"></script>
<h1>ปฎิทินกิจกกรม</h1>
		<form method="post" action="calendars/admin/calendars/save/<?php echo $calendar->id ?>">
			<table class="form"> 
				<? if(@$calendar->id): ?>
					<tr>
						<th></th><td><a href="calendars/admin/calendars/delete/<?php echo $calendar->id?>" class="btn" onclick="return confirm('ยืนยันการลบ')">ลบข้อมูลนี้</a></td>
					</tr>
				<? endif; ?>
					<tr>
						<th>ข้อความ</th>
						<td><input type="text" name="title" value="<?php echo $calendar->title?>" class="text small" /></td>
					</tr>
					<tr>
						<th>ประเภท</th>
						<td>
							<input type="radio" name="className" value="e-blue" <?php echo ($calendar->className=='e-blue' || !$calendar->className)?'checked':''?> /><span class="e-blue">&nbsp;ประชุม&nbsp;</span>
							&nbsp;&nbsp;&nbsp;<input type="radio" name="className" value="e-red" <?=($calendar->className=='e-red')?'checked':''?> /><span class="e-red">&nbsp;สัมนา&nbsp;</span>
							&nbsp;&nbsp;&nbsp;<input type="radio" name="className" value="e-green" <?=($calendar->className=='e-green')?'checked':''?> /><span class="e-green">&nbsp;อบรม&nbsp;</span>
							&nbsp;&nbsp;&nbsp;<input type="radio" name="className" value="e-violet" <?=($calendar->className=='e-violet')?'checked':''?> /><span class="e-violet">&nbsp;&nbsp;อื่นๆ&nbsp;&nbsp;</span>
						</td>
					</tr>
					<tr>
						<th>เริ่มวันที่</th>
						<td><input type="text" name="start" value="<?php echo ($calendar->start)?$calendar->start:@$_GET['date']; ?>" class="text datepicker" /></td>
					</tr>
					<tr>
						<th>ถึงวันที่</th>
						<td><input type="text" name="end" value="<?php echo ($calendar->end)?$calendar->end:@$_GET['date']; ?>" class="text datepicker" /></td>
					</tr>
					<tr>
						<th>รายละเอียด</th><td><textarea name="detail" class="full editor"><?php echo stripcslashes($calendar->detail)?></textarea></td>
					</tr>
					
					<tr>
						<th></th>
						<td>
							<input type="submit" name="submit" value="ตกลง" class="submit small" >
							<input type="button" name="cancel" value="ย้อนกลับ" onClick="window.location='calendars/admin/calendars' " class="submit small" >
						</td>
                    </tr>
				
				</table>
			</form>
			
</div>