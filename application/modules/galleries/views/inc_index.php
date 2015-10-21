<div id="boxphoto" class="corner">
            <a href="galleries/index/<?php echo $group_id?>" class="moreright" target="_self">more</a>
            <div class="topic"><img src="<?php echo topic("topic_gallery.png") ?>" width="200" height="25" alt="ภาพกิจกรรม"/></div>
            <div class="box">
            	<div id="slider">
                	<ul>
                		<?php foreach($galleries as $key => $gallery):?>
						<?php if($key==0): ?>
                        <li>
						<?php elseif(($key%5)==0): ?>
                        </li><li>
                       	<?php endif; ?>
                        <div class="boximg">
                        	<a rel="lightbox[gallery]" href="uploads/galleries/<?php echo $gallery->image?>" target="_self">
                        		<?=thumb("uploads/galleries/".$gallery->image,83,71,0)?>
                        		<!-- <img src="uploads/galleries/<?php echo $gallery->image?>" width="83" height="71" <?php echo ($gallery->title)?'title="'.$gallery->title.'" class="imgtooltip"':''?>  <?php echo ($gallery->title)?'alt="'.lang_decode($gallery->category->name).':'.$gallery->title.'"':''?> /> -->
							</a><span></span></div>	
						<?php endforeach;?>
						</li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>