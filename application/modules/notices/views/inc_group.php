
<!--<?php foreach($notices as $notice ): ?>
	<div class="box <?php echo alternator('','alt')?>"> 
	
		<a href="notices/view_type/<?php echo $notice->id ?>" class="thumb">
		
		<img src="<?php echo (is_file('uploads/notice/thumbnail/'.$notice->image))?'uploads/notice/thumbnail/'.$notice->image : 'themes/thaigcd/photo/nophoto.gif' ?>" width="77" height="64" />
		
		</a>
		
		<div class="box_info">
		
			<span><?php echo mysql_to_th($notice->start_date)?></span>
			
			<a href="notices/view/<?php echo $notice->id ?>">
			
			<h3><?php echo lang_decode($notice->title) ?></h3>
			
			</a>
			
		</div>   
	</div>
	
	<div class="clear"></div>
	
<?php endforeach; ?>-->

			<style>

			a.list-group-item {
			    height:auto;
			    min-height:120px;
			    width: 900px;
			    max-width: 900px;
			    overflow: hidden;
			}
			a.list-group-item.active small {
			    color:#fff;
			}
			.stars {
			    margin:20px auto 1px;    
			}
			.pic_gallery {
    
		        width: 77px;
		        height: 64px;
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
			  
			<div class="container" style="width: 950px;">
			    <div class="row">
					<div class="well">
			      <!--  <h1 class="text-center">Vote for your favorite</h1>-->
			        <div class="list-group">
			        
			        <?php 
			        
				        $i=1; 
				        
				        foreach($notices as $notice ):
				        
					        if($i==1){
								$class = 'active';
								$i=0;
							}else{
								$class = '';
								$i=1;
							}
					
			        ?>
			        
			          <a href="notices/view_type/<?php echo $notice->id ?>" class="list-group-item <?php echo $class; ?>" >
			                <div class="media col-md-3">
			                    <figure class="pull-left">
			                    		
							
							<img class="pic_gallery" src="<?php echo (is_file('uploads/notice/thumbnail/'.$notice->image))?'uploads/notice/thumbnail/'.$notice->image : 'themes/thaigcd/photo/nophoto.gif' ?>" width="77" height="64" />
							
							   
			                        
			                    </figure>
			                </div>
			                <div class="col-md-6">
			                
			                    <h4 class="list-group-item-heading">
			                    
			                    	<?php echo mysql_to_th($notice->start_date)?>
			                    
			                     </h4>
			                     
			                    <p class="list-group-item-text">
			                    
								
									<?php echo lang_decode($notice->title) ?>
									

			                    </p>
			                    
			                </div>

			          </a>

			          <?php endforeach; ?>
			          
			        </div>
			        </div>
				</div>
			</div>	