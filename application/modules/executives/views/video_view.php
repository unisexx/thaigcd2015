
	<?php echo youtube($video->url,'635','390')?>
  	
  	<div class="clear"></div>
	<hr style="margin:25px 0;">
	<h1 style="font-size: 18px; color:brown;">คลิปวิดีโอผู้บริหารทั้งหมด</h1>
	<div class="box-executive-news">
		<ul>
  		<?php foreach($videos as $video):?>
  			<li style="list-style-type: disc !important;"><a href="executives/video_view/<?php echo $video->id?>"><?php echo $video->title?></a></li>
  		<?php endforeach;?>
  		</ul>
	</div>
	