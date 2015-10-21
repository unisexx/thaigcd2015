<script type="text/javascript">
	$(function(){
		$(".detail").hide();
		$(".groupname").click(function(){
			$(this).parent().toggleClass('active').find(".detail").slideToggle();
		});
	})
</script>
<div class="corner" id="boxknowledge">
	<div class="topic"><img width="200" height="25" src="<?php echo topic("topic_knowledge.png") ?>"></div>
	
	<div id="data">
		<ul>
		<?php foreach($categories as $category): ?>
		<li style="position:relative;">
		<div class="groupname"><?php echo lang_decode($category->name) ?> (<?php echo $category->knowledge->where("status = 'approve'")->limit(5)->get()->result_count();?>)<span class="toggle"></span></div>
		<div class="detail">
			<?php foreach($category->knowledge->where("status = 'approve'")->order_by('id','desc')->limit(5)->get() as $knowledge): ?>
			
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
			<div class="paddtop20bot20"><span></span></div>
			<a href="knowledges/<?php echo $category->id?>" class="more-rb">more</a>
			</div>
		</li>
		<?php endforeach; ?>
		</ul>
	</div><!--data-->
</div>