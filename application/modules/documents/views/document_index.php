<ul id="breadcrumb">
	<li>อัพโหลดเอกสารการประชุม</li>
</ul>
<div id="content">
<div class="search">
<form method="get">
	<label>หัวเรื่อง: </label>
	<input type="text" size="60" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" />
	<input type="submit" value="ค้นหา" />
</form>
</div>
<?php echo $documents->pagination()?>
<table class="list">
<tr>
	<th>หัวเรื่อง </th>
	<th>โดย</th>
	<th width="150">เอกสาร</th>
	<th width="90"><?php if(is_authen('documents','add')): ?><a href="documents/form" class="btn">เพิ่มรายการ</a><?php endif; ?></th>
</tr>
<?php foreach($documents as $document):?>
<tr <?php echo cycle()?>>
	<td><?php echo $document->title?></td>
	<td><?php echo $document->user->profile->first_name.' '.$document->user->profile->last_name ?></a></td>
	<td>
		<ul>
			<?php foreach($document->document_file->order_by('id','asc')->get() as $doc): ?>
			<li><a href="documents/download/<?php echo $doc->id ?>"><span class="icon icon-page-save"></span> <?php echo $doc->name ?></a></li>
			<?php endforeach; ?>
		</ul>
	</td>
	<td>
			<?php if(is_authen('documents','edit')): ?>
			<a href="documents/form/<?php echo $document->id?>" class="btn">แก้ไข</a>
			<?php endif; ?>
			<?php if(is_authen('documents','delete')): ?>
			<a href="documents/delete/<?php echo $document->id?>" class="btn" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')">ลบ</a>
			<?php endif; ?>
	</td>
</tr>
<?php endforeach;?>

</table>
<?php echo $documents->pagination()?>

</div>