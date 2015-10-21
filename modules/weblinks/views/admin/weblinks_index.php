<h1>เว็บลิ้งค์</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><th>หมวดหมู่</th><td><?php echo form_dropdown('category_id',$weblinks->category->get_option(),@$_POST['category_id'],'','ทั้งหมด') ?></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $weblinks->pagination()?>
<table class="list" id="weblinks-list">
	<tr>
		<th>โลโก้</th>
		<th>ชื่อเว็บ</th>
		<th>URL</th>
		<th>แอคชั่น</th>
		<th><a rel="lightbox" class="btn" href="categories/admin/categories/weblinks?iframe=true&width=90%&height=90%">หมวดหมู่</a></th>
		<th width="90"><a class="btn" href="weblinks/admin/weblinks/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach ($weblinks as $weblink):?>
	<tr <?php echo cycle()?>>
		<td><img src="uploads/weblinks/<?php echo $weblink->image?>"></th>
		<td><?php echo lang_decode($weblink->title)?></th>
		<td><?php echo $weblink->url?></td>
		<td><?php if($weblink->target == "_blank"):?>เปิดลิ้งค์ในหน้าต่างใหม่<?php else:?>เปิดลิ้งค์ในหน้าต่างเดิม<?php endif;?></td>
		<td><?php echo lang_decode($weblink->category->name,'') ?></td>
		<td>
			<a class="btn" href="weblinks/admin/weblinks/form/<?php echo $weblink->id?>" >แก้ไข</a> 
			<a class="btn" href="weblinks/admin/weblinks/delete/<?php echo $weblink->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $weblinks->pagination()?>