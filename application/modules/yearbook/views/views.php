
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
> <span class="b1">รายงานประจำปี</span></div>

<div id="page">

	
    
		<div class="media col-lg-6" style="position: relative;">
		  <div class="media-left">
		  
			<H3> <img src="<?php echo base_url(); ?>themes/images/edit.png"> <?php  echo $rs->title; ?></H3>
            <br><br>
            

		      
		      	<h4 class="media-heading">
		      	
                    <?php  echo $rs->detail; ?><br><br>
                    
              		<a href="uploads/yearbook/<?php echo $rs->files; ?>" target="_blank">filedownload</a>
              
		            <Br><Br>  
                    <strong>
                        วันที่ :: <?php echo mysql_to_th($rs->created,'S',TRUE)?><br>
                        จำนวนดาวน์โหลด (<?php  echo $rs->downloads; ?>)
		    		</strong>
                    
		    	</h4>
		  
		
		    
		    
		    
		  </div>
		
		  

		</div>
        

	

    
<br clear="all">

</div>
	