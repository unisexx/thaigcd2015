
    	<!--<div id="title-blank"><h2>วีดีโอ</h2></div>-->
        <div id="breadcrumb">
		
		<a href="<?php echo base_url(); ?>home">หน้าแรก</a> 
		> 
		<span class="b1"><a href="executives/all_video">วีดีโอ</a></span> 
		> 
		<span class="b1"><a href="#"><?=lang_decode($rs->title)?></a></span>
        
		</div>
		
	    <div id="page">
	
        	<p>
			

<!--            	<div align='center'>
				
				<?php echo youtube($rs->url,'560','315');?>
                
                </div>-->	
                
                <div style="width:560px; height:315px; overflow:hidden;" align='center'>
					<?php echo $rs->embed;?>
                </div>
            
                <br clear="all">
                
				<?=lang_decode($rs->title)?>
				
			    <br clear="all">
				    
				<div style="font-weight: normal; color: #F60; margin-top: 25px;">วันที่: <?=mysql_to_th($rs->created)?></div>
                
			</p>
			
        </div>
        
        
<div class="clear"></div>

<br clear="all">

<div id="breadcrumb" >

	<span class="b1"><a href="executives/all_video"><h3>วีดีโอเพิ่มเติม</h3></a></span>

</div>


<ul class="mediapublic">

<?php foreach($video as $row):?>

	<li>
		<a href="executives/all_video_view/<?php echo $row->id?>">
		
			<?php echo lang_decode($row->title); ?> 
			
			&nbsp; 
			<span class="date">
			
			<?php echo mysql_to_th($row->created,'S',TRUE)?>
				
			</span>
		
		</a>
	</li>
	
<?php endforeach;?>

</ul>