<div class="topic"><img class="topic_notice" src="<?php echo topic("topic_notice.png") ?>" width="200" height="25"></div>
	<div id="data">
		<form action="" method="get">
		<p class="search">
		<span class="TxtGray4 B">หัวข้อ :</span>
		<!--<input name="textfield" id="textfield" size="10" type="text"><img src="themes/gcdnew/images/date.jpg" style="margin-bottom: -3px;" width="17" height="17">-->
		<input type="text" name="titlesearch">
		<span class="TxtGray4 B">ประเภท :</span>
		<?php echo form_dropdown('type',$notices->category->get_option(),@$_GET['type'],'class="TxtGray3"','ทุกประเภท');?>
		<!--<select name="select2" class="TxtGray3">
			<option>ทุกกลุ่มงาน</option>
			<option>กลุ่มโรคติดต่อป้องกันได้ด้วยวัคซีน</option>
			<option>กลุ่มโรคติดต่อระหว่างสัตว์และคน</option>
			<option>กลุ่มโรคติดต่อระหว่างประเทศ</option>
		</select>-->
		<input type="submit" value="ค้นหา">
		</p>
		</form>
		<?php echo $notices->pagination() ?>
		
		<?php foreach($notices as $notice): ?>
		<div class="box-notify <?php echo alternator('','alt');?>"> 
			<a href="#" class="thumb"><img src="<?php echo (is_file('uploads/notice/thumbnail/'.$notice->image))?'uploads/notice/thumbnail/'.$notice->image : 'themes/gcdnew/photo/nophoto.gif' ?>" class="photo" width="77" height="64"></a>
			<div class="box_info">
			<span><?php echo mysql_to_th($notice->start_date) ?></span>
			<a href="notices/view/<?php echo $notice->id ?>"><h3><?php echo lang_decode($notice->title) ?></h3></a><img src="themes/gcdnew/images/<?php echo $type[$notice->category->id] ?>" width="103" height="18">
			</div> 
		</div>
		<div class="clear"></div>
	 	<?php endforeach; ?>
		
		<?php echo $notices->pagination() ?>
	</div>
