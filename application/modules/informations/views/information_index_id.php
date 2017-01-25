<div id="boxprnews" class="corner">

	<div class="topic">
	<div class="title-page">ข่าวประชาสัมพันธ์  >> <div style="color:grey;display: inline;"><?php echo lang_decode($category->name)?></span></div>
	<!--<img src="<?php echo topic("topic_prnews.png") ?>" width="200" height="25" alt="ข่าวประชาสัมพันธ์ ThaiGCD"/> >--> 
	</div>
	
	<div class="clear"></div>
	
	<form method="get">
		<p class="search" style="margin:5px 10px;">
		<label>หัวข้อ : </label> 
		<input type="text" name="search" value="<?php echo @$_GET['search'] ?>" /> 
		<label>วันที่ : </label> 
		<input class="datepicker" type="text" name="start_date" value="<?php echo @$_GET['start_date'] ?>" />
		<input type="submit" value="ค้นหา" />
		</p>
	</form>
	
			<?php echo $category->information->pagination(); ?>
			
			<div class="clear"></div>	
			
			<Br><br>	
			
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
				        
				        foreach($category->information as $information ): 
				        
					        if($i==1){
								$class = 'active';
								$i=0;
							}else{
								$class = '';
								$i=1;
							}
					
			        ?>
			        
			          <a href="informations/view/<?php echo $information->id ?>" class="list-group-item <?php echo $class; ?>" <?php echo (pathinfo($information->pdf, PATHINFO_EXTENSION)=="pdf")?'target="_blank"':'' ?> >
			                <div class="media col-sm-2">
			                    <figure class="pull-left">
			                    		
							
							<img class="pic_gallery" src="<?php echo (is_file('uploads/information/thumbnail/'.$information->image))? 'uploads/information/thumbnail/'.$information->image : 'themes/thaigcd/photo/nophoto.gif' ?>" width="77" height="64" />
							
							   
			                        
			                    </figure>
			                </div>
			                <div class="col-sm-10">
			                
			                    <h4 class="list-group-item-heading">
			                    
			                    <?php echo mysql_to_th($information->start_date)?> 
			                    <!-----> 
			                    <?php //echo ($information->group_id)?lang_decode($information->group->name):lang_decode($information->user->group->name) ?>
			                    
			                     <!--(<?=@$information->user->profile->agency->name?>)--> 
			                     
			                     </h4>
			                     
			                    <p class="list-group-item-text">
			                    
								
									<?php echo lang_decode($information->title) ?> 
									
									<?php echo icon_file($information->pdf) ?> 
									
									<?php echo icon_new($information) ?>
										
									<?php echo lang_decode($information->intro) ?>
									

			                    </p>
			                    
			                </div>

			          </a>

			          <?php endforeach; ?>
			          
			        </div>
			        </div>
				</div>
			</div>			
			
			
			<?php echo $category->information->pagination(); ?>
			
	<div class="paddbot10"></div>
</div><!--boxprnews-->