
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

	
    
		<div class="media col-lg-6" style="position: relative;">
		  <div class="media-left">
		  

		       <img src="uploads/modules_infograph/image/<?php echo $rs->image; ?>" width="222" >
		      
		      <Br><Br>
		      <a href="uploads/modules_infograph/pdf/<?php echo $rs->file_pdf; ?>">filedownload</a>
              
		      <Br><Br>
		      
		      	<h4 class="media-heading">
		      	
		    	    <img src="<?php echo base_url(); ?>themes/images/edit.png">
			    	<?php  echo $rs->title; ?><br><br>
                    วันที่ :: <?php echo mysql_to_th($rs->created,'S',TRUE)?><br>
		    		จำนวนดาวน์โหลด (<?php  echo $rs->views; ?>)
		    		
		    	</h4>
		  
		
		    
		    
		    
		  </div>
		
		  

		</div>
        

	

    
<br clear="all">

</div>
	