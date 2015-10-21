<ul id="breadcrumb">
	<li><a href="#">ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="meetings">รายงาน</a></li>
	<li><a href="meetings/report/<?php echo $meeting->id ?>" ><?php echo $meeting->name ?></a></li>
</ul>
<div id="content">
	<h3 class="aligncenter">
	<?php echo $meeting->name ?><br />
ระหว่าง <?php echo mysql_to_th($meeting->start_date,'F') ?> ถึง <?php echo mysql_to_th($meeting->end_date,'F') ?><br />
ณ <?php echo $meeting->camp->name ?>
</h3>
<table class="list">
<tr>
	<th width="25%">วันที่ </th><th width="25%">ห้องพักเดี่ยว</th><th width="25%">ห้องพักคู่</th><th width="25%">รวม</th>
</tr>
<?php foreach($dates as $date): ?>
<tr <?php echo cycle()?>>
  	<td><?php echo mysql_to_th($date['check_in'])?></td>
  	<td><?php echo $meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('1','2'))->count() ?></td>
	<td><?php echo $meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('3','4'))->count() ?></td>
	<td><?php echo $meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('1','2','3','4'))->count() ?></td>
	<!--
		<td><?php echo mysql_to_th($date['check_in'])?></td>
  	<td><?php echo ($meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('1','2'))->count()<>0)?anchor('meetings/reportlist/'.$meeting->id.'/'.$date['check_in'].'/s',$meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('1','2'))->count()):0 ?></td>
	<td><?php echo ($meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('3','4'))->count()<>0)?anchor('meetings/reportlist/'.$meeting->id.'/'.$date['check_in'].'/t',$meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('3','4'))->count()):0 ?></td>
	<td><?php echo ($meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('1','2','3','4'))->count()<>0)?anchor('meetings/reportlist/'.$meeting->id.'/'.$date['check_in'],$meeting->question->where('meeting_id',$meeting->id)->where('check_in',$date['check_in'])->where_in('room_type',array('1','2','3','4'))->count()):0 ?></td>
	-->
</tr>
<?php endforeach ?>
<tr <?php echo cycle()?>>
  	<td><strong>รวมทั้งสิ้น</strong></td>
  	<td><?php echo $meeting->question->where('meeting_id',$meeting->id)->where_in('room_type',array('1','2'))->count() ?></td>
	<td><?php echo $meeting->question->where('meeting_id',$meeting->id)->where_in('room_type',array('3','4'))->count() ?></td>
	<td><?php echo $meeting->question->where('meeting_id',$meeting->id)->where_in('room_type',array('1','2','3','4'))->count() ?></td>
</tr>
</table>
<div class="alignright" style="padding:5px;">
	<a href="meetings/prints/<?php echo $meeting->id ?>/1"><span class="icon icon-disk"></span></a> <a href="meetings/prints/<?php echo $meeting->id ?>"><span class="icon icon-printer"></span></a>
</div>
</div>