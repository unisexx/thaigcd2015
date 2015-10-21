<h1>เว็บลิ้งค์</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td>
			<th>หมวดหมู่</th><td><?php echo form_dropdown('category_id',$weblinks->category->get_option(),@$_GET['category_id'],'','ทั้งหมด') ?></td>
			<td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $weblinks->pagination()?>
<table class="list" id="weblinks-list">
	<tr>
		<th>โลโก้</th>
		<th>ชื่อเว็บ</th>
		<th>URL</th>
		<th><a rel="lightbox" class="btn" href="categories/admin/categories/weblinks?iframe=true&width=90%&height=90%">หมวดหมู่</a></th>
		<th width="90"><a class="btn" href="weblinks/admin/weblinks/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach ($weblinks as $weblink):?>
	<tr <?php echo cycle()?>>
		<td>
			<?php if(is_file('uploads/weblinks/'.$weblink->image)): ?>
			<img src="uploads/weblinks/<?php echo $weblink->image?>" />
			<?php else: ?>
			<img src="media/images/98x90.gif" />
			<?php endif; ?>
		</th>
		<td><?php echo lang_decode($weblink->title)?></th>
		<td><?php echo $weblink->url?></td>
		<td><?php echo anchor('weblinks/admin/weblinks?category_id='.$weblink->category_id,lang_decode($weblink->category->name,'')) ?></td>
		<td>
			<a class="btn" href="weblinks/admin/weblinks/form/<?php echo $weblink->id?>" >แก้ไข</a> 
			<a class="btn" href="weblinks/admin/weblinks/delete/<?php echo $weblink->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $weblinks->pagination()?>