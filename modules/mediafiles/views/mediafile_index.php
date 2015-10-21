<div class="corner" id="boxvdosound-page">
   	    	<div class="topic"><img width="200" height="25" src="themes/gcdnew/images/topic_vdo.png"></div>
            <div id="data">
            	<div>
            		<?php if(!empty($mediafiles->embed)):?>
						<?php echo $mediafiles->embed?>
					<?php else:?>
            	  	<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="100%" height="385">
						<param name="movie" value="media/jwplayer/player.swf" />
						<param name="allowfullscreen" value="true" />
						<param name="allowscriptaccess" value="always" />
						<param name="flashvars" value="file=<?php echo $mediafiles->file?>&image=<?php echo $mediafiles->image?>" />
						<embed
							type="application/x-shockwave-flash"
							id="player2"
							name="player2"
							src="media/jwplayer/player.swf"
							width="100%" 
							height="385"
							allowscriptaccess="always" 
							allowfullscreen="true"
							flashvars="file=<?php echo $mediafiles->file?>&image=uploads/mediafiles/<?php echo $mediafiles->image?>" 
						/>
					</object>
					<?php endif;?>
            	</div>
				<form action="mediafiles" name="mediafile_sort" method="post">
                <div style="padding: 10px 0pt;"><span class="TxtGray4 B">ค้นหา :</span>
                  <input type="text" size="25" id="textfield" name="textsearch" value="<?php echo @$_POST['textsearch']?>">
                  <?php echo form_dropdown('category_id',$mediafiles->category->get_option(),@$_POST['category_id'],'','ทั้งหมด');?>
				  <?php echo form_dropdown('groups',get_option('id','name','groups'),@$_POST['groups'],'','ทุกกลุ่มงาน');?>
                  <input type="submit" class="btn_search2" value="Submit" id="button2" name="button2">
				</form>
                </div>
			
			<?php foreach ($mediafiles_list as $mediafile):?>
              <div class="box <?php echo alternator('','alt')?>"> 
              <a class="thumb" href="mediafiles/view/<?php echo $mediafile->id?>"><img width="77" height="64" class="photo" src="<?php echo ($mediafile->image)?'uploads/mediafiles/'.$mediafile->image:'themes/gcdnew/photo/nophoto.gif'?>"></a>
                    <div class="box_info">
                    <span><?php echo $mediafile->created?> - view:<?php echo $mediafile->counter?> </span> 
					<?php if($mediafile->category->id == 39):?>
					<img width="14" height="11" src="themes/gcdnew/images/ico_vdo.png">
					<?php else:?>
					<img width="20" height="10" src="themes/gcdnew/images/ico_mp3.png">
					<?php endif;?>
                    <div class="right"><a href="<?php echo $mediafile->file?>"><img width="16" height="16" title="download" alt="download" style="padding-right: 10px;" src="themes/gcdnew/images/save.png"></a></div>
                    <a href="mediafiles/view/<?php echo $mediafile->id?>"><h3><?php echo $mediafile->title?></h3></a>
                    <p class="tag"><strong>ประเภท :</strong> <span><?php echo lang_decode($mediafile->category->name,'')?></span> , <strong>กลุ่มงาน :</strong> <span><?php echo lang_decode($mediafile->user->group->name)?></span></p>
                </div>   
              </div>
			  <?php endforeach;?>

		</div>
      <div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="shadow"></div></div>