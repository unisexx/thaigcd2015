<ul id="breadcrumb">
	<li>รายการเอกสารการประชุม</li>
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
</tr>
<?php foreach($documents as $document):?>
<tr <?php echo cycle()?>>
	<td><?php echo $document->title?></td>
	<td><?php echo $document->user->profile->first_name.' '.$document->user->profile->last_name ?></a></td>
	<td>
		<ul>
			<?php foreach($document->document_file->order_by('id','asc')->get() as $doc): ?>
			<li><a href="documents/publics/download/<?php echo $doc->id ?>"><span class="icon icon-page-save"></span> <?php echo $doc->name ?></a></li>
			<?php endforeach; ?>
		</ul>
	</td>
</tr>
<?php endforeach;?>

</table>
<?php echo $documents->pagination()?>

</div>