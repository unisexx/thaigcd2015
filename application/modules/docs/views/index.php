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
		<div class="search">
			<form method="get">
			<label>แบบสอบถาม: </label><input type="text" name="search" size="30" value="<?php echo @$_GET['search'] ?>" />
			<label> สถานะ: </label><?php echo form_dropdown('status',array(0=>'ปิด',1=>'เปิด'),@$_GET['status'],'',' ');?>
			<label> กลุ่มงาน: </label><?php echo form_dropdown('group_id',get_option('id','name','groups'),@$_GET['group_id'],'class="group_ddl"','ทุกกลุ่มงาน');?>
			<label> ตั้งแต่วันที่: </label><input class="datepicker" size="10" type="text" name="start" value="<?php echo @$_GET['start'] ?>" />
			<label> ถึง: </label><input class="datepicker" size="10" type="text" name="end" value="<?php echo @$_GET['end'] ?>" />
			<input type="submit" value="ค้นหา" />
			</form>
		</div>
		<table class="list">
			<tr>
				<th width="100" class="aligncenter">สถานะ</th>
				<th>แบบสอบถาม</th>
				<th>สร้างโดย</th>
				<th>กลุ่มงาน</th>
				<th>วันที่สร้าง</th>
				<th width="70"></th>
        <th width="100"></th>
				<th nowrap="nowrap"></th>
			</tr>
			<?php foreach($topics as $topic): ?>
			<tr <?php echo cycle() ?>>
				<td><input type="checkbox" name="status" value="<?php echo $topic->id ?>" <?php echo ($topic->status==1)?'checked="checked"':'' ?> /></td>
				<td><a href="docs/publics/questionaire/<?php echo $topic->id ?>" target="_blank"><?php echo $topic->title ?></a></td>
				<td><?php echo $topic->user->profile->first_name.' '.$topic->user->profile->last_name ?></a></td>
				<td><?php echo lang_decode($topic->user->group->name,'th') ?></a></td>
				<td><?php echo mysql_to_th($topic->created) ?></a></td>

				<td><a href="docs/report/<?php echo $topic->id ?>" ><span class="icon icon-chart-pie"></span> รายงาน</a></td>
        <td><a href="docs/list_report/<?php echo $topic->id ?>" ><img src="<?php echo base_url(); ?>themes/images/icon_print.jpg" width="35" height="39">ส่งออก</a></td>
				<td nowrap="nowrap">
					<a href="docs/answer_list/<?php echo $topic->id;?>" class="btn" alt="ดูรายการตอบแบบสอบถาม">
						<span class="icon icon-application-view-icons"></span>
						ดู (<?php $ans = new answer; ?><?php echo round($ans->select('user_id,session')->distinct()->where_related('questionaire','topic_id',$topic->id)->get()->result_count()) ?>)
					</a>&nbsp;
					<?php if(is_authen('questionaire','edit')): ?>
					<a href="docs/form/<?php echo $topic->id ?>" class="btn">
						<span class="icon icon-table-edit"></span> แก้ไข
					</a>&nbsp;
					<?php endif; ?>
					<?php if(is_authen('questionaire','delete')): ?>
					<a href="docs/delete/<?php echo $topic->id ?>"  class="btn"  onclick="return confirm('คุณต้องการลบแบบสอบถาม ?')" >
					<span class="icon icon-table-delete"></span> ลบ
					</a>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php echo $topics->pagination() ?>
	</div>
</div>
