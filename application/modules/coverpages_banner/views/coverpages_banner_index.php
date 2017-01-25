<!------------------------------------------------------------Begin Infographic----------------------------------------------------------->
<div class="clearfix">&nbsp;</div>

<div id="wrap-infographic">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div id="pic-info"> 
		  <div class="carousel-inner">

		  		<div class="item active">
		  		
			      <a href="uploads/coverpages_banner/<?php echo $data->file_pdf; ?>" target="_blank">
			      
			      	<img src="uploads/coverpages_banner/<?php echo $data->image; ?>" width="222" height="319" class="info">
			      	
			      </a>
			      
		    	</div>

		</div>
	  </div>
      <!-- Wrapper for Text -->
      <div id="text-info">
      <strong>banner</strong>
        <ul>
            	<li>
            	
	            	<a href="uploads/coverpages_banner/<?php echo $item->file_pdf; ?>" target="_blank">
	            	
	            		<?php echo $item->title; ?> (<?php echo mysql_to_th($item->created,'S',TRUE)?>)
	            		<!--ดู <?php echo $item->views; ?>-->
	            		
	            	</a>
            	
            	</li>

        </ul>
     </div>
     
        <br clear="all">
		<div class="clear"></div>
		<a class="pull-right" href="coverpages_banner/index">ดูทั้งหมด</a>

	  <!-- Indicators -->
	  <div id="run-info">
		  <ol class="carousel-indicators" style="position:relative;">
		  
            	<li data-target="#carousel-example-generic" data-slide-to="0" class=""> </li>

		  </ol>
	  </div> 
	</div>
</div>

<!------------------------------------------------------------END Infographic----------------------------------------------------------->