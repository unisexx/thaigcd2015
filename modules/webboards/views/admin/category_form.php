<div class="block">
<h1>ชื่อกระดานข่าว</h1>
<form method="post" action="webboards/admin/categories/save/<?php echo $category->id?>" enctype="multipart/form-data">
	<table class="form">
		<tr>
			<th>ชื่อ :</th>
			<td><input type="text" name="name[th]" value="<?php echo lang_decode($category->name,'th')?>" /></td>
		</tr>
		<tr>
			<th>รายละเอียด :</th>
			<td><input type="text" name="description" value="<?php echo $category->description?>" /></td>
		</tr>
		<tr>	
			<th></th>
			<td>
			<input type="hidden" name="parents" value="<?php echo $parent->id ?>"  />
			<input type="hidden" name="module" value="<?php echo $parent->module ?>"  />
			<input type="submit" value="บันทึก" class="submit small" />
			</td>
		</tr>
	</table>
</form>
</div>