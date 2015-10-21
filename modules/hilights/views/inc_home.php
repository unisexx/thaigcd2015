<div id="boxheadpic" class="corner">
            <div id="slideshow">
            	<?php foreach($hilights as $key => $hilight): ?>
                <img src="<?php echo $hilight->image ?>" width="656" height="253" <?php echo ($key==0)?'class="active"':''?> />
                <?php endforeach; ?>
            </div>
        </div><!--boxheadpic-->
        <div class="paddtop20bot20"><span></span></div>