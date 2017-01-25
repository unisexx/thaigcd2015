

<!-- Page breadcrumb -->
<ol class="breadcrumb">
	<li><a href="home/index">หน้าแรก</a></li>
	<li><a href="notices/index_type">ข่าว</a></li>
	<li class="active">ข่าวจัดซื้อ-จัดจ้าง</li>
</ol>

<form method="get" action="Notices/index_type">
	<p class="search" style="margin:5px 10px;">

		<label>หัวข้อ : </label>
		<input type="text" name="search" value="<?php echo @$_GET['search'] ?>" />
		<input type="submit" value="ค้นหา" />
	</p>
</form>

<?php echo $notices->pagination(); ?>

<div class="clear"></div>
<br>
<ul class="notice" style="list-style: none;margin-left:-30px;">
	<?php foreach($notices as $notice): ?>
		<li>
			<a class="thumb" href="notices/view_type/<?php echo $notice->id ?>" target="_self">
					<div style="width:77px">
					<img class="pull-left" width="77" src="<?php echo (is_file('uploads/notice/thumbnail/'.$notice->image))?'uploads/notice/thumbnail/'.$notice->image:'themes/thaigcd2015/images/logo.png' ?>" alt="<?=lang_decode($notice->title)?>" style="margin-right:5px;">
				  </div>
					<div style="float:left;width:80%;padding-left:20px;">
						<span class="pull-left" style="margin-top:10px;">
							<span class="date">
								<?php echo mysql_to_th($notice->start_date,'S',false)?>
							</span>
							<br>
							<?php echo lang_decode($notice->title) ?>
							<Br>
							<?php
								if($notice->category_id==7){
									echo '<img src="themes/thaigcd2015/images/ico_notify_03.png">';
								}elseif($notice->category_id==8){
									echo '<img src="themes/thaigcd2015/images/ico_notify_06.png">';
								}elseif($notice->category_id==9){
									echo '<img src="themes/thaigcd2015/images/ico_notify_08.png">';
								}

							?>
						</span>
				</div>
			</a>

			<br clear="all">

		</li>
	<?php endforeach; ?>
</ul>

	<br clear="all">

    <?php echo $notices->pagination(); ?>

<!--<a class="pull-right" href="notices/index_type">ดูทั้งหมด</a>-->
<br clear="all">
