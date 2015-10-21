<h1>แจ้งข่าวสารทางอีเมล์</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td><th>หมวดหมู่</th><td><?php echo form_dropdown('category_id',$newsletters->category->get_option(),@$_GET['category_id'],'','ทั้งหมด') ?></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php include "_menu.php";?>
<?php echo $newsletters->pagination()?>
<table class="list">
	<tr>
		<th>หัวข้อ</th>
		<th>โดย</th>
		<th><a rel="lightbox" class="btn" href="newsletters/admin/categories?iframe=true&width=90%&height=90%">หมวดหมู่</a></th>
		<th width="90"><a class="btn" href="newsletters/admin/newsletters/form">เพิ่มรายการ</a></th>
	</tr>
	
	<?php foreach($newsletters as $newsletter):?>
	<tr>
		<td><?php echo $newsletter->title?></td>
		<td><?php echo $newsletter->user->display?></td>
		<td><?php echo anchor('newsletters/admin/newsletters?category_id='.$newsletter->category_id,lang_decode($newsletter->category->name,''))?></td>
		<td>
			<a class="btn" href="newsletters/admin/newsletters/form/<?php echo $newsletter->id?>" >แก้ไข</a>
			<a class="btn" href="newsletters/admin/newsletters/delete/<?php echo $newsletter->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach;?>
	
</table>
<?php echo $newsletters->pagination()?>