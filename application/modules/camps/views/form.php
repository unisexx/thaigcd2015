<ul id="breadcrumb">
	<li><a href="#">ระบบลงทะเบียนการประชุม</a></li>
	<li><a href="camps">ข้อมูลที่พัก</a></li>
	<li><a href="camps/form/<?php echo $camp->id ?>" ><?php echo ($camp->id)?'แก้ไขข้อมูลที่พัก':'เพิ่มข้อมูลที่พัก' ?></a></li>
</ul>
<div id="content">
<form method="post" action="camps/save/<?php echo $camp->id?>" enctype="multipart/form-data" >
<table class="form tab">
	<?php if($camp->id): ?>
	<tr>
		<th>รหัส</th>
		<td>C<?php echo substr('000'.$camp->id,-3) ?></td>
	</tr>
	<?php endif; ?>
	<tr>
		<th>ชื่อที่พัก</th>
		<td><?php echo form_input('name',$camp->name,'class="full"')?></td>
	</tr>
	<tr>
		<th>ที่อยู่</th>
		<td><?php echo form_textarea('address',$camp->address,'class="full"')?></td>
	</tr>
	<tr>
		<th>แผนที่</th>
		<td><?php echo form_upload('map')?></td>
	</tr>
	<tr>
		<th>จังหวัด</th>
		<td><?php echo form_dropdown('province_id',get_option('id','name','provinces'),$camp->province_id) ?></td>
	</tr>
	<tr>
		<th></th>
		<td><?php echo form_submit('','บันทึก','class="button"')?></td>
	</tr>
</table>
</form>
</div>


