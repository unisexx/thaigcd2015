<ul id="breadcrumb">
	<li><a href="#">ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="hosts">ผู้จัด</a></li>
	<li><a href="hosts/form/<?php echo $host->id ?>" ><?php echo ($host->id)?'แก้ไขผู้จัด':'เพิ่มผู้จัด' ?></a></li>
</ul>
<div id="content">
<form method="post" action="hosts/save/<?php echo $host->id?>" >
<table class="form tab">
	<?php if($host->id): ?>
	<tr>
		<th>รหัส</th>
		<td>H<?php echo substr('000'.$host->id,-3) ?></td>
	</tr>
	<?php endif; ?>
	<tr>
		<th>ชื่อผู้จัด</th>
		<td><?php echo form_input('name',$host->name,'class="full"')?></td>
	</tr>
	<tr>
		<th>หน่วยงาน</th>
		<td><?php echo form_dropdown('agency_id',get_option('id','name','agencies'),$host->agency_id) ?></td>
	</tr>
	<tr>
		<th></th>
		<td><?php echo form_submit('','บันทึก','class="button"')?></td>
	</tr>
</table>

</form>
</div>
