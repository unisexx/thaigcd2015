<script type="text/javascript">
	$(function(){
		$("input[type=button]").live('click',function(){
			$(this).parent().parent().after(
			'<tr>' +
			'<th>ชื่อเอกสาร</th>' +
			'<td><?php echo form_input('doc[]')?> ไฟล์เอกสาร: <?php echo form_upload('file[]')?> <input type="button" value="เพิ่ม" /></td>' +
			'</tr>'
			);
		})
	})
</script>
<ul id="breadcrumb">
	<li><a href="#">ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="meetings">รายการการประชุม</a></li>
	<li><a href="meetings/form/<?php echo $meeting->id ?>" ><?php echo ($meeting->id)?'แก้ไขรายการการประชุม':'เพิ่มหัวรายการการประชุม' ?></a></li>
</ul>
<div id="content">
<form method="post" action="meetings/save/<?php echo $meeting->id?>" enctype="multipart/form-data" >
<table class="form tab">
	<tr>
		<th>หัวเรื่อง</th>
		<td><?php echo form_input('name',$meeting->name,'class="full"')?></td>
	</tr>
	<tr>
		<th>ที่พัก</th>
		<td><?php echo form_dropdown('camp_id',get_option('id','name','meeting_camps','order by id asc'),$meeting->camp_id) ?></td>
	</tr>
	<tr>
		<th>ผู้จัด</th>
		<td><?php echo form_dropdown('host_id',get_option('id','name','meeting_hosts','order by id asc'),$meeting->host_id) ?></td>
	</tr>
	<tr>
		<th>จำนวนเงินส่วนต่าง</th>
		<td><?php echo form_input('money',$meeting->money)?></td>
	</tr>
	<tr>
		<th>วันที่เริ่มประชุม</th>
		<td><?php echo form_input('start_date',DB2Date($meeting->start_date),'class="datepicker"')?></td>
	</tr>
	<tr>
		<th>วันที่สิ้นสุดประชุม</th>
		<td><?php echo form_input('end_date',DB2Date($meeting->end_date),'class="datepicker"')?></td>
	</tr>
	<tr>
		<th>วันปิดรับลงทะเบียน</th>
		<td><?php echo form_input('close_date',DB2Date($meeting->close_date),'class="datepicker"')?></td>
	</tr>
	<?php foreach($meeting->meeting_document->order_by('id','asc')->get() as $doc): ?>
	<tr>
		<th style="vertical-align:top;">เอกสาร</th>
		<td>	
			<?php echo form_input('doc[]',$doc->name)?> ไฟล์เอกสาร: 
			<?php echo form_upload('file[]')?> 
			<a href="meetings/download/<?php echo $doc->id ?>"><span class="icon icon-page-save"></span></a> 
			<a href="meetings/document_delete/<?php echo $doc->id ?>" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')"><span class="icon icon-delete"></span></a>
			<?php echo form_hidden('doc_id[]',$doc->id)?>
			</ul>
		</td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<th>ชื่อเอกสาร</th>
		<td><?php echo form_input('doc[]')?>  ไฟล์เอกสาร: <?php echo form_upload('file[]')?> <input type="button" value="เพิ่ม" /></td>
	</tr>
	<tr>
		<th></th>
		<td><?php echo form_submit('','บันทึก','class="button"')?></td>
	</tr>
</table>
</form>
</div>