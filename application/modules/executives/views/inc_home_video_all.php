<style>

	#sidebarall {
	  float: lelt;
	  width: 1000px;
	  background-color: #FFF;
	    height: 250px;
        border: 1px solid #CCCCCC;
        padding-left: 10px;
	}
	#cleared {
	  clear: both;
	}
	

</style>

  <div id="sidebarall">
  
<?php foreach($videoall as $row):?>  

    <div style="width:192px; height:250px; overflow:hidden; float:left; margin-top:5px; background-color:#FFF;padding: 10px 10px 10px 10px ;">
    
    	<div style="width:192px; height:192px; overflow:hidden; background-color:#FFF;padding: 10px 10px 10px 10px ;">
    		<?php echo $row->embed;?>
        </div>
        
    	<div style="overflow: hidden;height: 40px;">
		  <a href="executives/all_video_view/<?php echo $row->id; ?>" title="<?php echo lang_decode($row->title); ?>">
		    <?php echo lang_decode($row->title); ?>
          </a>
        </div>

    </div>
    

    

        


<?php endforeach;?>  

    </div>         
            
            <div class="vdoall" style="background-color:#FFF; margin-right:-25pk;">
            
       
            <a href="executives/all_video">ดููวีดีโอทั้งหมด</a>
            
            </div>