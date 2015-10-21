
	<h3 style="text-align:center; line-height:20px;">
	<?php echo $meeting->name ?><br />
ระหว่าง <?php echo mysql_to_th($meeting->start_date,'F') ?> ถึง <?php echo mysql_to_th($meeting->end_date,'F') ?><br />
ณ <?php echo $meeting->camp->name ?>
</h3>
<table style="width=100%;padding:5px 5px" border="1%">
<tr  style="text-align:center;font-weight:bold">
	<th width="25%">วันที่ </th><th width="25%">ห้องพักเดี่ยว</th><th width="25%">ห้องพักคู่</th><th width="25%">รวม</th>
</tr>
<?php foreach($dates as $date): ?>
<tr <?php echo cycle()?>>
  	<td style="text-align:center;"><?php echo mysql_to_th($date['check_in'])?></td>
  	<td style="text-align:center;"><?php echo $meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('1','2'))->count() ?></td>
	<td style="text-align:center;"><?php echo $meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('3','4'))->count() ?></td>
	<td style="text-align:center;"><?php echo $meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('1','2','3','4'))->count() ?></td>
</tr>
<?php endforeach ?>
<tr <?php echo cycle()?>>
  	<td style="text-align:center;"><strong>รวมทั้งสิ้น</strong></td>
  	<td style="text-align:center;"><?php echo $meeting->question->where('meeting_id',$meeting->id)->where_in('room_type',array('1','2'))->count() ?></td>
	<td style="text-align:center;"><?php echo $meeting->question->where('meeting_id',$meeting->id)->where_in('room_type',array('3','4'))->count() ?></td>
	<td style="text-align:center;"><?php echo $meeting->question->where('meeting_id',$meeting->id)->where_in('room_type',array('1','2','3','4'))->count() ?></td>
</tr>
</table>
