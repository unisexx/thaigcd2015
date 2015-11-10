<div id="weblink">
    <div class="tabs">
           <div class="titleweblink">เว็บไซต์ที่เกี่ยวข้อง :</div>
           
		<?php foreach($categories as $key=>$category):?>
			<div class="tab">
               <input type="radio" id="tab-<?=$key+1?>" name="tab-group-1" <?if($key==0) echo"checked";?>>
               <label for="tab-<?=$key+1?>"><?=lang_decode($category->name)?></label>
             
               <div class="content">
                   <ul>
                   		<?php foreach($category->weblink->limit(8)->get() as $weblink):?>
							<li><a href="<?php echo $weblink->url?>" target="<?php echo $weblink->target?>"><img src="<?=$weblink->image != ""?'uploads/weblinks/'.$weblink->image:'themes/thaigcd2015/images/img_weblink_dummy.gif';?>" alt="<?php echo lang_decode($weblink->title)?>" title="<?php echo lang_decode($weblink->title)?>" width="98" height="90" /></a></li>
						<?php endforeach;?>
                   </ul>
               </div> 
           </div>
		<?php endforeach;?>
            
    </div>
</div>