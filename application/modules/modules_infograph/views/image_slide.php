
<!-- jQuery library (served from Google) -->

<!-- bxSlider Javascript file -->
<script src="<?php echo base_url(); ?>media/bxslider/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo base_url(); ?>media/bxslider/jquery.bxslider.css" rel="stylesheet" />

<style>

	#wrapper {
	  margin-right: 300px;
	}
	#content {
	  float: left;
	  width: 100%;
	  background-color: #FFF;
	  padding-top: 50px;
	}
	#sidebar {
	  float: right;
	  width: 300px;
	  margin-right: -300px;
	  background-color: #FFF;
	    height: 418px;
        border: 1px solid #CCCCCC;
        padding-left: 10px;
	}
	#cleared {
	  clear: both;
	}
	

</style>
<!--<ul class="bxslider">
  <li><img src="/images/pic1.jpg" /></li>
  <li><img src="/images/pic2.jpg" /></li>
  <li><img src="/images/pic3.jpg" /></li>
  <li><img src="/images/pic4.jpg" /></li>
</ul>-->


<div id="wrapper">
  <div id="content">
  
      <ul class="bxslider">
    
    <?php foreach($rs_data as $key=>$data_infograph){ ?>
    
      <li>
          <a href="<?php echo base_url(); ?>modules_infograph/view/<?php echo $data_infograph->id; ?>">
          	<img src="<?php echo base_url(); ?>uploads/modules_infograph/image/<?php echo $data_infograph->image ?>" style="border:4px solid #fff;
        -webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);
        box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);" />
          </a>
          
      </li>
      
     <?php } ?>  
      
    </ul>


  </div>
  <div id="sidebar">
  
     <ul class="notice">
    
        <?php foreach($rs_txt as $item1): ?>
        
            <li>
                <a class="thumb" href="<?php echo base_url(); ?>modules_infograph/view/<?php echo $item1->id; ?>" target="_self">
                    <span class="pull-left" style="margin-top:10px;">
                        <img src="<?php echo base_url(); ?>themes/images/edit.png">
                        
                        <?php 
						
						//echo $item1->title; 
						
						$title = $item1->title; 	
						$text =  $title;
						$text1 = $title."...";
						
						if(strlen($text)>32)
						{
							
							$str_data = html_entity_decode($text);
							$str_data = strip_tags($str_data);
							$text1 = iconv_substr($str_data, 0,32, "UTF-8")."..."; 
							

						}
						
						echo $text1;
						
						?>
                        
                    </span>
                </a>
                
                <br clear="all">
                
            </li>
            
        <?php endforeach;?>			
                                                
      </ul> 
    
      
    <br clear="all">
    <div class="clear"></div>
    <a class="pull-right" href="modules_infograph/modules_infograph_list" style="margin-right:50px;">ดูทั้งหมด</a>
    <br clear="all">
    
    <div style="margin-top:100px;"></div>
    
  </div>

            
  <div id="cleared"></div>
</div>

<script>

$(document).ready(function(){
	
    $('.bxslider').bxSlider({
		  minSlides: 2,
		  maxSlides: 2,
		  auto: true,
		  slideWidth: 222,
		  slideMargin: 50
	});

});

</script>


