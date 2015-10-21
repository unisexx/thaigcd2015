<script type="text/javascript">
	$(function(){
		$("input[type=button]").live('click',function(){
			$(this).parent().parent().after(
			'<tr>' +
			'<th>ชื่อเอกสาร:</th>' +
			'<td><?php echo form_input('doc[]')?> อัพโหลดไฟล์: <?php echo form_upload('file[]')?> <input type="button" value="เพิ่ม" /></td>' +
			'</tr>'
			);
		})
	})
</script>
<ul id="breadcrumb">
	<li><a href="documents">อัพโหลดเอกสารการประชุม</a></li>
	<li><?php echo ($document->id)?'แก้ไขเอกสารการประชุม':'เพิ่มเอกสารการประชุม'?></li>
</ul>

<div id="content">
<form method="post" action="documents/save/<?php echo $document->id?>" enctype="multipart/form-data" >
<table class="form tab">
	<tr>
		<th>วันที่:</th>
		<td><?php echo form_input('start_date',DB2Date($document->start_date),'class="datepicker"')?></td>
	</tr>
	<tr>
		<th>หัวเรื่อง:</th>
		<td><?php echo form_input('title',$document->title,'class="full"')?></td>
	</tr>
	<tr>
		<th>ผู้จัดการประชุม:</th>
		<td><?php echo form_input('host',$document->host,'class="full"')?></td>
	</tr>
	<?php foreach($document->document_file->order_by('id','asc')->get() as $doc): ?>
	<tr>
		<th style="vertical-align:top;">ชื่อเอกสาร:</th>
		<td>	
			<?php echo form_input('doc[]',$doc->name)?> อัพโหลดไฟล์: 
			<?php echo form_upload('file[]')?> 
			<a href="documents/download/<?php echo $doc->id ?>"><span class="icon icon-page-save"></span></a> 
			<a href="documents/document_delete/<?php echo $doc->id ?>" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')"><span class="icon icon-delete"></span></a>
			<?php echo form_hidden('doc_id[]',$doc->id)?>
			</ul>
		</td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<th>ชื่อเอกสาร:</th>
		<td><?php echo form_input('doc[]')?> อัพโหลดไฟล์: <?php echo form_upload('file[]')?> <input type="button" value="เพิ่ม" /></td>
	</tr>
	<tr>
		<th></th>
		<td><?php echo form_submit('','บันทึก','class="button"')?></td>
	</tr>
</table>
</form>
</div>