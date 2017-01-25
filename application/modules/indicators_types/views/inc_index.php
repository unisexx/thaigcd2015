<!------------------------------------------------------------Begin Infographic----------------------------------------------------------->
<div class="clearfix">&nbsp;</div>

<div id="wrap-infographic">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div id="pic-info"> 
		  <div class="carousel-inner">
		  
        	<?php 
        	
        	$f=0;
        	foreach($rs as $data): 
        	
        		$f++;
        		
        		if($f<3){
				
        	?>		  
		  
		  		<div class="item active">
		  		
			      <a href="uploads/indicators_types/pdf/<?php echo $data->file_pdf; ?>" target="_blank">
			      
			      	<img src="uploads/indicators_types/image/<?php echo $data->image; ?>" width="222" height="319" class="info">
			      	
			      </a>
			      
		    	</div>
		    	
 			<?php 
 				
 				}
 			
 			endforeach;
 			
 			?>		    	
		    	
		</div>
	  </div>
      <!-- Wrapper for Text -->
      <div id="text-info">
      <strong>กรอบแนวทางการพัฒนาศูนย์ปฏิบัติการ</strong>
        <ul>
        	<?php 
	        	$i=0;
	        	foreach($rs as $item): 
	        	$i++;
        	?>
        	
            	<li>
            	
	            	<a href="uploads/indicators_types/pdf/<?php echo $item->file_pdf; ?>" target="_blank">
	            	
	            		<?php echo $item->title; ?> (<?php echo mysql_to_th($item->created,'S',TRUE)?>)
	            		<!--ดู <?php echo $item->views; ?>-->
	            		
	            	</a>
            	
            	</li>
            	
            <?php endforeach;?>
            
        </ul>
     </div>
     
        <br clear="all">
		<div class="clear"></div>
		<a class="pull-right" href="indicators_types/indicators_types">ดูทั้งหมด</a>

	  <!-- Indicators -->
	  <div id="run-info">
		  <ol class="carousel-indicators" style="position:relative;">
		  
        	<?php for($r=1;$r<$i;$r++){ ?>		  
		  
            	<li data-target="#carousel-example-generic" data-slide-to="0" class=""> </li>
            
            <?php } ?>

            
		  </ol>
	  </div> 
	</div>
</div>

<!------------------------------------------------------------END Infographic----------------------------------------------------------->