<div class="topic"><img src="<?php echo topic("topic_knowledge.png") ?>" height="25" width="200"></div>
<div id="data">
	<h2><?php echo lang_decode($knowledge->title) ?><span class="f10 TxtGray2"> <?php echo mysql_to_th($knowledge->start_date) ?> - <?php echo $knowledge->counter ?> ครั้ง</span></h2>
    <?php echo lang_decode($knowledge->detail) ?>
		
	<div class="download-box-list">
		<h2>ไฟล์ดาวน์โหลด</h2>
		<ol>
		<?php foreach($knowledge->knowledge_file->order_by('id','asc')->get() as $doc): ?>
			<li><a href="knowledges/download/<?php echo $doc->id ?>"><?php echo $doc->name ?></a> 
			<a href="knowledges/download/<?php echo $doc->id ?>"><span class="icon icon-page-save"></span></a> 
			<small>(ดาวน์โหลดทั้งสิ้น <?php echo $doc->counter ?> ครั้ง)</small> </li>
		<?php endforeach; ?>
		</ol>
	</div>

    <div class="ref"><strong>Credit by </strong> <span>คุณ <?php echo $knowledge->user->profile->first_name.' '.$knowledge->user->profile->last_name.' '.$knowledge->user->profile->position ?> </span></div>     
	<?php if($knowledge->tag): ?>
	<div class="tag"><strong>TAG :</strong> <span><?php echo tag_decode($knowledge->tag) ?></span></div>
	<?php endif; ?>
</div><!--data-->
