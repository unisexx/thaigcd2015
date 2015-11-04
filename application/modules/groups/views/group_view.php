<div id="page">
	<div id="breadcrumb"><a href="home">หน้าแรก</a> > ผู้บริหาร</div>
    <div id="page-content">
    <div class="title-page">ผู้บริหาร</div>
    
    

<?php if(is_file('uploads/group/'.$group->image)): ?><img src="uploads/group/<?php echo $group->image ?>" /><?php endif; ?>

<div class="topic cufon"><span style="color:#CC0000;">แนะนำ</span> <?php echo lang_decode($group->name) ?></div>
<div id="data">
	<?php echo lang_decode($group->aboutus) ?>
</div>


</div>
</div>