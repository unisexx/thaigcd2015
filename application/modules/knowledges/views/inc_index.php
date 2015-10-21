<div id="boxknow" class="corner TxtGray3 B">
	<a href="knowledges" class="moreleft" target="_self">more</a>
	<div class="topic"><img src="<?php echo topic("topic_know.png") ?>" width="200" height="25" alt="ความรู้วิชาการ" /></div>
	
	

		<ul class="paddleft15">
<?php foreach($categories as $key => $category): ?>
			<li><a href="knowledges/<?php echo $category->id?>" target="_self"><?php echo lang_decode($category->name) ?></a></li>
	<?php endforeach; ?>
			<li><a href="http://thaigcd.ddc.moph.go.th/laws" target="_self">กฏหมายที่เกี่ยวข้อง</a></li>
		</ul>
	<div class="clear"></div>
</div><!--boxknow-->