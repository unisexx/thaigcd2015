<div class="topic"><img class="topic_executives" src="<?php echo topic("topic_executives.png") ?>" height="25" width="200"></div>
<div id="data"> 
	<div class="clear"></div>
	<div class="box-executive-news">
  		<h3><?php echo lang_decode($executive->title) ?></h3>
		<?php echo lang_decode($executive->detail) ?>
	</div>
	
	
	<!-- <hr style="margin:25px 0;">
	<h1 style="font-size: 18px; color:brown;">ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป</h1>
	<div class="box-executive-news">
		<ul>
  		<?php foreach($executives as $row):?>
  			<li>- <a href="executives/it_view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></li>
  		<?php endforeach;?>
  		</ul>
	</div> -->
</div><!--data-->
