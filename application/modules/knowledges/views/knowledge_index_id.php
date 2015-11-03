<div id="page">
	<div id="breadcrumb"><a href="home">หน้าแรก</a> > คลังความรู้ ศูนย์รวมวิชาการ</div>
    <div id="page-content">
    <div class="title-page"><?php echo lang_decode($page->title) ?></div>



<div class="corner" id="boxknowledge">
	<div class="topic"><img width="200" height="25" src="<?php echo topic("topic_knowledge.png") ?>"></div>
	<div class="subtopic"> 
		<form method="get">
			<p class="search">
			<strong>หัวข้อ: </strong>
			<input type="text" id="textfield" name="search" value="<?php echo @$_GET['search'] ?>">
			<input type="submit" class="btn_search2" value="ค้นหา">
			</p>
		</form>
	</div>
	<div id="data">
		
		<div class="groupname"><?php echo lang_decode($category->name) ?></div>
		<?php if($category->id==17): ?>
		<div class="knowledage_label">
		<?php foreach ($category->knowledge->label() as $label): ?>
		<a href="knowledges/17?label=<?php echo $label ?>" <?php echo ($_GET['label']==$label)?'class="active"':'' ?> ><?php echo $label ?></a>
		<?php echo ($label=='ฮ')?'<br />':'' ?>
		<?php endforeach; ?>
		</div>
		<?php else: ?>
			<?php echo $category->knowledge->pagination() ?>
			<?php endif; ?>
			<?php foreach($category->knowledge as $knowledge): ?>
			<div class="box"> 
				<a class="thumb" href="knowledges/view/<?php echo $knowledge->id ?>"><img width="77" height="64" src="<?php echo (is_file('uploads/knowledge/thumbnail/'.$knowledge->image))? 'uploads/knowledge/thumbnail/'.$knowledge->image : 'themes/thaigcd/photo/nophoto.gif' ?>"></a>
				<div class="box_info">
					<span><?php echo mysql_to_th($knowledge->start_date)?></span>
	                <a href="knowledges/view/<?php echo $knowledge->id ?>"><h3><?php echo lang_decode($knowledge->title) ?></h3></a>
	                <p><?php echo lang_decode($knowledge->intro) ?></p>
				</div>   
			</div>
			<div class="clear"></div>
			<?php endforeach; ?>
			<?php echo $category->knowledge->pagination() ?>
	</div><!--data-->
</div>



	</div>
</div>