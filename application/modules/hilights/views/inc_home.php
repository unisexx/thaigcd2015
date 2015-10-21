<script type="text/javascript" src="themes/gcdnew/js/jquery.jshowoff.min.js"></script>
<link rel="stylesheet" href="themes/gcdnew/css/jshowoff.css" type="text/css" media="screen, projection" />
<style type="text/css">
<?php foreach($hilights as $key => $hilight): ?>
	.thumbFeatures .jshowoff-slidelink-<?php echo $key ?>{
		background-image: url(uploads/hilight/thumbnail/<?php echo $hilight->image ?>);
	}
<?php endforeach; ?>
</style>

<div id="boxheadpic" class="corner">
            <!--<div id="slideshow">
            	<?php foreach($hilights as $key => $hilight): ?>
                <img src="uploads/hilight/thumbnail/<?php echo $hilight->image ?>" width="656" height="253" <?php echo ($key==0)?'class="active"':''?> />
                <?php endforeach; ?>
            </div>-->

			<div id="thumbFeatures">
				<?php foreach($hilights as $hilight): ?>
					<div>
						<a href="<?php echo (is_file($hilight->pdf))?$hilight->pdf:$hilight->url?>" target="_blank"><img src="uploads/hilight/<?php echo $hilight->image ?>" alt="สำนักโรคติดต่อทั่วไป <?=lang_decode($hilight->title)?>" /></a>
					</div>
				<?php endforeach; ?>
			</div>
			<script type="text/javascript">		
				$(document).ready(function(){ $('#thumbFeatures').jshowoff({ 
					effect: 'slideLeft',
					speed: 5000
				}); });
			</script>
			
</div><!--boxheadpic-->
<div class="paddtop20bot20"><span></span></div>