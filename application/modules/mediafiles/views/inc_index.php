<script type="text/javascript">
	$(function(){
		$("a[rel='ajax']").click(function(){
			var link = $(this).attr('href');
			//alert(link);
			$.get("mediafiles/ajax_show/" + link, function(data) {
				$("#player").html(data);
			});
			return false;
		});
	});
</script>

<div class="corner" id="boxvdosound">
            <div id="player">
            	<?php if(!empty($mediafiles->embed)):?>
						<?php echo $mediafiles->embed?>
				<?php else:?>
					<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="300" height="245">
						<param name="movie" value="media/jwplayer/player.swf" />
						<param name="allowfullscreen" value="true" />
						<param name="allowscriptaccess" value="always" />
						<param name="flashvars" value="file=<?php echo base_url().$mediafiles->file?>&image=<?php echo $mediafiles->image?>" />
						<embed
							type="application/x-shockwave-flash"
							id="player2"
							name="player2"
							src="media/jwplayer/player.swf"
							width="300" 
							height="245"
							allowscriptaccess="always" 
							allowfullscreen="true"
							flashvars="file=<?php echo base_url().$mediafiles->file?>&image=uploads/mediafiles/<?php echo $mediafiles->image?>" 
						/>
					</object>
				<?php endif;?>
			</div>
             <div> 
             	<div style="width: 310px;" class="holder">
	           
						<div class="scroll-pane" id="pane3" >
		                   
						   <?php foreach($mediafiles_list as $mediafile):?>
						    <div class="box <?php echo alternator('','alt')?>"> 
		                        <div class="box_info">
		                        <span><?php echo $mediafile->created?></span>
		                        <?php if($mediafile->category->id == 39):?>
								<img width="14" height="11" src="themes/gcdnew/images/ico_vdo.png" alt="วิดีโอคลิป" />
								<?php else:?>
								<img width="20" height="10" src="themes/gcdnew/images/ico_mp3.png" alt="เสียง" />
								<?php endif;?>
								<a rel='ajax' href="<?php echo $mediafile->id?>"><h3><?php echo lang_decode($mediafile->title)?></h3></a>
		                      </div>  
		                    </div>
							<?php endforeach;?>
							
		                </div>
						
					</div>
                </div><!--holder-->
                <a class="moreright2" href="mediafiles">more</a>
		
  </div>