<style type="text/css">
	.carousel-indicators{margin-bottom:-35px;}
	.carousel-indicators li{background-image: url(themes/thaigcd2015_template/images/run-reg.png);border:none;width:12px;height:12px;}
	.carousel-indicators .active{background-image: url(themes/thaigcd2015_template/images/run-hot.png);border:none;margin:1px;}
</style>


<div class="row" id="wrap-highlight">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <div id="run">
		  <ol class="carousel-indicators">
		  	<?php foreach($hilights as $key=>$hilight): ?>
		  		<li data-target="#carousel-example-generic" data-slide-to="<?=$key?>" <?if($key==0)echo'class="active"'?>></li>
		  	<?endforeach;?>
		  </ol>
	  </div>
	
	  <!-- Wrapper for slides -->
	  <div id="highlight"> 
		  <div class="carousel-inner" role="listbox">
		  	<?php foreach($hilights as $key=>$hilight): ?>
				<div class="item <?if($key==0)echo'active'?>">
			      <a href="<?php echo (is_file($hilight->pdf))?$hilight->pdf:$hilight->url?>" target="_blank"><img src="uploads/hilight/<?php echo $hilight->image ?>" alt="สำนักโรคติดต่อทั่วไป <?=lang_decode($hilight->title)?>" width="730" height="281" /></a>
			    </div>
			<?php endforeach; ?>
		  </div>
	  </div>
	
	  <!-- Controls -->
	  <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a> -->
	</div>
</div>
<br clear="all">
