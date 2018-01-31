<script type="text/javascript">
$(function() {
	$(':checkbox').iphoneStyle({
  checkedLabel: 'เปิด',
  uncheckedLabel: 'ปิด'
});
$('input[type=checkbox]').change(function(){
	var status = 0;
	if(this.checked == true)status=1;
	$.post('docs/status',{'id':$(this).val(),'status':status});
})

});
</script>
<div id="container">
	<div id="content">
		<div id="print-header" class="command">
			<div class="left">
				<h1>รายการแบบสอบถาม - <?php echo $topic->title ?></h1>
			</div>
		</div>
		<br><br>
		<div class="clearfix"></div>
		<div class="search">
			<form method="get">
			<label> ตั้งแต่วันที่: </label><input class="datepicker" size="10" type="text" name="start" value="<?php echo @$_GET['start'] ?>" />
			<label> ถึง: </label><input class="datepicker" size="10" type="text" name="end" value="<?php echo @$_GET['end'] ?>" />
			<input type="submit" value="ค้นหา" />
			</form>
		</div>
		<div style="float:right;">
				<a href="docs/print_answer_all/<?php echo $topic_id; ?>?export_type=excel" target="_blank">
					<div style="border: 1px solid #CCCCCC;padding: 12px 20px;width: 70px;text-align: center;vertical-align: middle;">
					<img src="themes/images/icon_xls.png" width="35" height="39"><br>
					ส่งออก
					</div>
				</a>
		</div>
		<div style="float:right;">
				<a href="docs/print_answer_all/<?php echo $topic_id; ?>" target="_blank">
					<div style="border: 1px solid #CCCCCC;padding: 12px 20px;width: 70px;text-align: center;vertical-align: middle;">
					<img src="themes/images/icon_print.jpg" width="35" height="39"><br>
					พิมพ์ทั้งหมด
					</div>
				</a>
		</div>
		<table class="list">
			<tr>
				<th>ลำดับ</th>
				<th class="aligncenter">เวลาที่บันทึก</th>
				<th class="aligncenter">session_id</th>
				<th class="aligncenter">user_id</th>
				<th class="aligncenter">ip address</th>
				<th width="100"></th>
			</tr>
			<?php
		$no = 0;
		$_GET['page'] = (@$_GET['page']) ? $_GET['page'] : 1;
		foreach ($answer_list as $row) :
			$no++;
		?>
			<tr <?php echo cycle() ?>>
				<td><?php echo $no + ( ($_GET['page'] - 1) * 20) ?></td>
				<td class="aligncenter"><?php echo mysql_to_th($row->answer_date, 'S', true); ?></td>
				<td class="aligncenter"><?php echo $row->session; ?></td>
				<td class="aligncenter"><?php echo $row->user_id; ?></td>
				<td class="aligncenter"><?php echo $row->ipaddress; ?></td>
				<td class="aligncenter">
					<a href="docs/print_answer/<?php echo $topic_id; ?>?session=<?php echo $row->session; ?>&user_id=<?php echo $row->user_id; ?>" target="_blank"><img src="themes/images/icon_print.jpg" width="35" height="39"></a>

					<a href="docs/print_answer/<?php echo $topic_id; ?>?session=<?php echo $row->session; ?>&user_id=<?php echo $row->user_id; ?>&export_type=excel" target="_blank"><img src="themes/images/icon_xls.png" width="35" height="39"></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<div class="clearfix"></div>
		<br>
		<?php echo $answer_list->pagination() ?>
	</div>
</div>
