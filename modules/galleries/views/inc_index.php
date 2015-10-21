<div id="boxphoto" class="corner">
            <a href="galleries/index/<?php echo $group_id?>" class="moreright">more</a>
            <div class="topic"><img src="<?php echo topic("topic_gallery.png") ?>" width="200" height="25" /></div>
            <div class="box">
            	<div id="slider">
                	<ul>
                		<?php foreach($galleries as $key => $gallery):?>
						<?php if($key==0): ?>
                        <li>
						<?php elseif(($key%5)==0): ?>
                        </li><li>
                       	<?php endif; ?>
                        <div class="boximg"><a rel="lightbox[gallery]" href="uploads/galleries/<?php echo $gallery->image?>"><img src="uploads/galleries/<?php echo $gallery->image?>" width="83" height="71" title="<?php echo $gallery->title?>" class="imgtooltip" alt="<?php echo lang_decode($gallery->category->name,'')?> : <?php echo $gallery->title?>"/></a><span></span></div>	
						<?php endforeach;?>
						</li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>