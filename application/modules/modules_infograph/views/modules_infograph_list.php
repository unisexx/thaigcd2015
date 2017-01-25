
     <style>

    .pic_gallery {
    
        width: 222px;
        height: 392px;
		float:left;
		margin:3px 3px ;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        background-color:#555555;
        border:3px solid #fff;;
        -webkit-box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);
        box-shadow: 0px 3px 4px 0px rgba(0,0,0,0.3);
        
    }
    
</style>


<div id="breadcrumb"><a href="<?php echo base_url(); ?>/home">หน้าแรก</a> 
> <span class="b1">infographic</span></div>

<div id="page">

	
	<?php foreach($rs_data as $row){ ?>
    
		<div class="media col-lg-6" style="position: relative;">
		  <div class="media-left">
		  
		    <a href="modules_infograph/view/<?php echo $row->id; ?>">
		    
		   
		      <img src="uploads/modules_infograph/image/<?php echo $row->image; ?>" width="222" >
		      
		      <Br><Br>
		      
		     
		      
		      	<h4 class="media-heading">
		      	
		    	    <img src="<?php echo base_url(); ?>themes/images/edit.png">
			    	<?php  echo $row->title; ?><br><br>
                    วันที่ :: <?php echo mysql_to_th($row->created,'S',TRUE)?><br>
		    		จำนวนดาวน์โหลด (<?php  echo $row->views; ?>)
		    		
		    	</h4>
		  
		    </a>
		    
		    
		    
		  </div>
		
		  

		</div>
        
	<?php } ?>
	
	<br clear="all">

    <?php echo $rs_data->pagination(); ?>
    
<br clear="all">

</div>
	