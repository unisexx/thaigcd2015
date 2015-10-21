<h1>หน่วยงาน</h1>
<form action="agencies/admin/agencies/save/<?php echo $agency->id ?>" method="post" enctype="multipart/form-data" >
<table class="form">
	<tr><th>ชื่อ :</th><td><input type="text" name="name" value="<?php echo $agency->name?>"/></td></tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>