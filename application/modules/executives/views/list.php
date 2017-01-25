<style>

	/*VDO*/
	#vdo{ }
	.vdotitle{font-family: 'Conv_2555 ed_crub huajuck[TH]';font-weight: bold;  font-size:25px; line-height:27px;  color:#d80368; border-bottom:2px solid #f795c3; margin-top:10px;}
	#vdolist{float:left;position:relative;  overflow:hidden; background:white; text-align:center; padding:3px; width:180px; height::125px;}
	.linkvdo a {color:black; text-align:left !important;  float:left; margin-left:20px; margin-right:20px; margin-top:12px;}
	.linkvdo a:hover {color:#337ab7; text-decoration:none;}
	
	.imgvdo {
    
    	margin-top:10px;
		float:left;
		margin:5px 5px ;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        background-color:#555555;
        border:4px solid #fff;;
        -webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);
        box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);
        
    }
	
</style>

<!--<div id="title-blank"><h3>วีดีโอ</h3></div>-->
<div id="breadcrumb"><a href="<?php echo base_url(); ?>home">หน้าแรก</a> > <span class="b1">วีดีโอ</span></div>
<div id="page">

<!--<br>-->

<!--<span style="margin-left: 30px;">


<div style="width:100%; height: auto;overflow:hidden;">
<?php echo $video->embed;?>
</div>


</span>-->

<!--<br>-->

	<?php foreach($rs as $row):?>   
        
    <div id="vdo">
    
		<div id="vdolist">
                  <div class="vdoplay"><a href="#">&nbsp;</a></div>
                  
<!--                  <a href="executives/all_video_view/<?=$row->id?>">
                  
                    
                    <?php
/*						$source_vdo = $row->url;
						$vdo_value = explode("?v=", $source_vdo); */
					?>
                    
                    <img src="http://img.youtube.com/vi/<?=$vdo_value[1]?>/1.jpg" class="imgvdo">
                  
                  </a>-->
                  
                  <a href="executives/all_video_view/<?=$row->id?>">
                  
                    
                    <div style="width:258px; height:157px; overflow:hidden;">
						<?php echo $row->embed;?>
                    </div>

                  </a>
                  
                  <br>
              	  
                  <span class="linkvdo">
                  
                  <a href="executives/all_video_view/<?=$row->id?>" title="<?php echo lang_decode($row->title); ?>">
				  <?php 
				  
							
						
							
							$text =  lang_decode($row->title);
							$text1 = "";
							
							if(strlen($text)>48)
							{
								$str_data = html_entity_decode($text);
								$str_data = strip_tags($str_data);
								$text1 =  iconv_substr($str_data, 0,48, "UTF-8").".."; 
							}
							else
							{
								$text1 = $row->title;	
							}
							
							echo $text1;
							//echo lang_decode($row->title);
							
				  
				  ?>
                   <img src="themes/thaigcd2015/images/icon-film.png" width="14" height="15" />
                   </a>
                   
                   </span>	
                  
            </div>
            	   
		
                  
        </div>
        
      
	<?php endforeach;?>
    
    <?php echo $rs->pagination();?>
    
<br clear="all">
</div>