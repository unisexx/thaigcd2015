
         <div id="breadcrumb">หน้าแรก > 
         
         <a href="Informations/lists">
         
         	ข่าวประชาสัมพันธ์
         	
         </a>  
         
         </div>
		 <div id="wrap-page">
		 	
		    	<table height="36" border="0" cellspacing="0" cellpadding="0" class="tb-page">
		          <tr>
		           
		            <td class="title-page">ข่าวประชาสัมพันธ์</td>
		          
		          </tr>
		        </table>
		        
			    <div id="page">
			
		        	<p>
						
                        <p>
	                        <h4> 
	                        
	                    	<?php 
		            	 
		            	
			            		$title = lang_decode($informations->title);	
								$text =  $title;
								$text1 = $title;
								
/*								if(strlen($text)>19)
								{
									
									$str_data = html_entity_decode($text);
									$str_data = strip_tags($str_data);
									$text1 = iconv_substr($str_data, 0,19, "UTF-8"); 
									

								}*/
								
								echo $text1;
							
		            		?>
							
	                        </h4>
                        </p>
                        
                        <br />	
                        
                    	<?php 
	            	 
							
							//echo $text1;
						
	            		?>
                        
                         <div style="clear: both; margin-top: 15px;"></div>
                         
		                <p>
                        
                            	<?php if(is_file('uploads/information/'.$informations->image)){ ?>
						        	<img src="uploads/information/<?php echo $informations->image; ?>" width="251" height="150" />
						    	<?php }else{ ?> 
								    <img src="themes/thaigcd/photo/nophoto.gif">
							    <?php } ?> 	
                        
                        </p>
                        
		                <div style="clear: both; margin-top: 15px;"></div>
                        
						<?php echo lang_decode($informations->detail); ?>
                        
						<div style="clear: both; margin-top: 15px;"></div>
						
						<?php if(is_file($informations->pdf)){ ?>
							<a href='<?php echo $informations->pdf; ?>' target='_blank' style='font-weight: bold; color: #00733E;'>
								ดาวน์โหลดไฟล์ ::<?php echo $informations->pdf; ?>
							</a>
						<br>
						<?php } ?>
						
						<div style="clear: both; margin-top: 15px;"></div>
						
						<div class="date-news"><?php echo mysql_to_th($informations->created); ?></div>
						
						<div style="clear: both; margin-top: 15px;"></div>
						
						<p>( <?php echo $informations->counter; ?> ) อ่าน</p>
					</p>
					
		        </div>
		        
		 </div>
		 <div class="clearfix">&nbsp;</div>
		  <!------------------------------------------------------------END Wrap Page-----------------------------------------------------------> 
		<div style="position:relative;"><div class="row" id="bg-page">&nbsp;</div></div>
		
		
                     
                           
                     
        
       