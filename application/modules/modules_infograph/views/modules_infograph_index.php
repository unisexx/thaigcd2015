﻿
<div style="padding: 5px 5px 5px 5px;">

<table bgcolor="#ffffff" >
	<tr>
		<td align="left" width="55%">
		
			<?php foreach($rs_data as $item): ?>
				
					<a href="<?php echo base_url(); ?>modules_infograph/view/<?php echo $item->id; ?>">
						
						<img src="<?php echo base_url(); ?>uploads/modules_infograph/image/<?php echo $item->image; ?>" width="222" height="319" style="padding: 5px 5px 5px 5px; margin: 10px 0 10px 0;" />
						
					</a>
					
			<?php endforeach;?>	
		
		</td>
		<td align="left">
			<ul class="notice">
			
				<?php foreach($rs_txt as $item1): ?>
				
					<li>
						<a class="thumb" href="<?php echo base_url(); ?>modules_infograph/view/<?php echo $item1->id; ?>" target="_self">
							<span class="pull-left" style="margin-top:10px;">
								<img src="<?php echo base_url(); ?>themes/images/edit.png">
								<?php echo $item1->title; ?>
							</span>
						</a>
						
						<br clear="all">
						
					</li>
					
				<?php endforeach;?>			
														
			</ul>
			
		</td>
	</tr>
</table>
	
			<br clear="all">
			
				  <div id="run-info">
					  <ol class="carousel-indicators" style="position:relative;">
					  
					  
					  	<?php for($i=0;$i<6;$i++){ ?>
					  	
			            	<li data-target="#carousel-example-generic" data-slide-to="0" class=""> </li>
			            
			            <?php } ?>
			            
					  </ol>
				  </div> 


			<br clear="all">
			<div class="clear"></div>
			<a class="pull-right" href="modules_infograph/modules_infograph_list">ดูทั้งหมด</a>
			<br clear="all">
			
	

</div>