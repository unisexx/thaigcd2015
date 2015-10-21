<div class="topic"><img class="topic_executives" src="<?php echo topic("topic_executives.png") ?>" height="25" width="200"></div>
<div id="data" class="dexclutive"> 
	<h1 style="font-size: 18px; color:brown;">ข่าวประชาสัมพันธ์</h1>
	<div class="box-executive-news">
		<ul>
  		<?php foreach($infos as $row):?>
  			<li>- <a href="executives/info_view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></li>
  		<?php endforeach;?>
  		</ul>
	</div>
	<hr>
	<h1 style="font-size: 18px; color:brown;">ข่าวสารผู้บริหาร</h1>
	<div class="box-executive-news">
		<ul>
  		<?php foreach($executives as $row):?>
  			<li>- <a href="executives/view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></li>
  		<?php endforeach;?>
  		</ul>
	</div>
	<hr>
	<h1 style="font-size: 18px; color:brown;">ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป</h1>
	<div class="box-executive-news">
		<ul>
  		<?php foreach($its as $row):?>
  			<li>- <a href="executives/it_view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></li>
  		<?php endforeach;?>
  		</ul>
	</div>
</div><!--data-->
