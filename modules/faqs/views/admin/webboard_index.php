<h1>คำถามที่ถามบ่อย</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>ค้นหาตามหมวดหมู่</th><td><?php echo form_dropdown('category_id',$webboard_quizs->category->get_option(),@$_POST['category_id'],'','ทั้งหมด');?></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php include "_menu.php";?>
<br>
			<?php echo $webboard_quizs->pagination()?>
			<table class="list" id="weblinks-list">
				<tr>
					<th>หัวข้อ</th>
					<th>หมวดหมู่</th>
					<th width="130"></th>
				</tr>
				
				<?php foreach ($webboard_quizs as $webboard_quiz):?>
				<tr <?php echo cycle()?>>
					<td><?php echo $webboard_quiz->title ?></td>
					<td><?php echo lang_decode($webboard_quiz->category->name,'th') ?></td>
					<td><a href="faqs/admin/faqs/form/<?php echo $webboard_quiz->id?>">ส่งไปยังรายการคำถาม</a></div>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			<?php echo $webboard_quizs->pagination()?>