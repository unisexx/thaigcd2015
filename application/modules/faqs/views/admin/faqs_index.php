<h1>คำถามที่ถามบ่อย</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>คำถาม</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td>
			<th>หมวดหมู่</th><td><?php echo form_dropdown('category_id',$faqs->category->get_option(),@$_GET['category_id'],'','ทั้งหมด') ?></td>
			<td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php include "_menu.php";?>
<?php echo $faqs->pagination()?>
<form id="order" action="faqs/admin/faqs/save" method="post">
<table class="list">
	<tr>
		<th>แสดง</th>
		<th>ลำดับ</th>
		<th>คำถาม</th>
		<th>คำถามเด่น</th>
		<th><a rel="lightbox" class="btn" href="categories/admin/categories/faqs?iframe=true&width=90%&height=90%">หมวดหมู่</a></th>
		<th width="90"><a class="btn" href="faqs/admin/faqs/form">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach ($faqs as $faq):?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $faq->id ?>" <?php echo ($faq->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><input type="text" name="orderlist[]" size="3" value="<?php echo $faq->orderlist?>"><input type="hidden" name="orderid[]" value="<?php echo $faq->id ?>"></td>
		<td><?php echo lang_decode($faq->question,'');?></td>
		<td><?php echo (@$faq->hot == 0)?"ไม่ใช่":"ใช่"; ?></td>
		<td><?php echo  anchor('faqs/admin/faqs?category_id='.$faq->category_id,lang_decode($faq->category->name,'')) ?></td>
		<td>
			<a class="btn" href="faqs/admin/faqs/form/0/<?php echo $faq->id?>" >แก้ไข</a> 
			<a class="btn" href="faqs/admin/faqs/delete/<?php echo $faq->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<br>
<input type="submit" value="บันทึก">
</form>
<?php echo $faqs->pagination()?>