<script type="text/javascript" src="media/js/jquery.validate.min.js"></script>
<script language="javascript">
$(function(){
	
	$("#frmComment").validate({
	rules: 
	{
		name: 
		{ 
			required: true
		},
		comment: 
		{
			required: true
		},
		captcha:
		{
			required: true
		}
	},
	messages:
	{
		name: 
		{ 
			required: "กรุณากรอกชื่อค่ะ",
		},
		comment: 
		{ 
			required: "กรุณากรอกความคิดเห็นค่ะ",
		},
		captcha:
		{
			required: "กรุณากรอกตัวอักษรตัวที่เห็นในภาพค่ะ",
		}
	}
	});
});
</script>
	<div class="topic">
	
	<img src="<?php echo topic("topic_prnews.png") ?>" width="200" height="25" />
	
	</div>
	
	<div id="data">
		<h2>
		
		<?php echo lang_decode($information->title)?> 
		
		<span class="f10 TxtGray2">
		
		<?php echo mysql_to_th($information->start_date) ?> - <?php echo $information->counter ?>
		
		 ครั้ง
		 
		 </span>
		
		 </h2>
		<?php echo flash_replace(lang_decode($information->detail)) ?>
		
		<?php if($information->refer): ?>
		
		<div class="ref"><strong>ที่มา</strong> 
		
		<span><?php echo $information->refer ?></span>
		
		</div>
		
		<?php endif; ?>
		
		<Br><Br>
		
		<div class="ref"><strong>โดย </strong> 
		
		<span><?php echo ($information->user->profile->first_name=="")?'Administrator':$information->user->profile->first_name.' '.$information->user->profile->last_name.' '.$information->user->profile->position?></span>
		</div>  
		
		<Br>
		
		<div class="ref"><strong>กลุ่มงาน </strong>
		
		 <span>
		 <?php echo ($information->group_id)?lang_decode($information->group->name):lang_decode($information->user->group->name) ?>
		 	
		 </span>
		 </div>   
		      
		<?php if($information->tag): ?>
		<div class="tag">
		
		<strong>แท็ก :</strong>
		
		 <span>
		 
		 <?php echo tag_decode($information->tag) ?>
		 	
		 	
		 </span>
		 
		 </div>
		 <?php endif; ?>
		
		<Br>
		
		<div class="ref">
		
		<strong style="float:left; margin:0 5px 0 0;">เรตติ้ง </strong>
		
			<input name="rating" value="1" type="radio" class="star" disabled="disabled" <?php echo ($information->rating==1)?'checked="checked"':'' ?> />
			
			<input name="rating" value="2" type="radio" class="star" disabled="disabled" <?php echo ($information->rating==2)?'checked="checked"':'' ?> />
			
			<input name="rating" value="3" type="radio" class="star" disabled="disabled" <?php echo ($information->rating==3)?'checked="checked"':'' ?> />
			
			<input name="rating" value="4" type="radio" class="star" disabled="disabled" <?php echo ($information->rating==4)?'checked="checked"':'' ?> />
			
			<input name="rating" value="5" type="radio" class="star" disabled="disabled" <?php echo ($information->rating==5)?'checked="checked"':'' ?> />
			
			
		<div class="clear"></div>
		</div>
		
		<Br>
	
		<div class="ref">
		
			<form class="form-horizontal" action="informations/vote/<?php echo $information->id?>" method="post">
			
						<input name="rating" value="1" type="radio" class="star" />
						<input name="rating" value="2" type="radio" class="star"/>
						<input name="rating" value="3" type="radio" class="star"/>
						<input name="rating" value="4" type="radio" class="star"/>
						<input name="rating" value="5" type="radio" class="star"/>
						
						<input type="hidden" name="id" value="$data['id']" /> 
						
						<input type="submit" value="โหวต" class="btn btn-primary" />
						
			
			</form>
		
		</div>
    </div><!--data-->
    
    
<div style="padding:0 10px 10px;">

	<div id="commentform">
	
	<h3>ร่วมแสดงความคิดเห็น</h3>

    			<form class="form-horizontal"  id="boxform" method="post" action="informations/comment/<?php echo $information->id?>">
				
				<?php 
					$userlogin = '';
					if($this->session->userdata('id'))
					{
						$userlogin = login_data('display');
					}
				?>		
						 
						  
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">ชื่อ :</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputname" name="name" placeholder="ชื่อ" autocomplete="off" style="width:400px;" required value="<?php echo $userlogin; ?>">
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label"></label>
						    <div class="col-sm-10">
						      <img src="users/captcha" />
						    </div>
						  </div>
						  
						<div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">ตัวเลข<span class="TxtRed"> *</span></label>
						    <div class="col-sm-10">
						      <input type="text" name="captcha" class="captcha form-control" style="width:400px;" required>
						    </div>
						  </div>
						  						  
						    <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">ความคิดเห็น</label>
						    <div class="col-sm-10">
						      <textarea name="comment" style="width:400px;" rows="5" class="form-control"></textarea>
						    </div>
						  </div>
						  
				  
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
				            <a href="informations/index/145">
								<button type="button" class="btn btn-red" >ยกเลิก</button>
                             </a>
						      <button type="submit" class="btn btn-primary">ตกลง</button>
						    </div>
						  </div>
						  
					</form>
    
</div>


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
			        <div class="list-group">
			        
			        <?php 
			        
				        $i=1; 
				        
				        foreach($information->information_comment as $key => $comment):
				        
					        if($i==1){
								$class = 'active';
								$i=0;
							}else{
								$class = '';
								$i=1;
							}
					
			        ?>
			        
			          <a href="#" class="list-group-item <?php echo $class; ?>" id="comment<?php echo $comment->id?>" name="comment<?php echo ($key + 1)?>" >
			          
			                <div class="media col-md-3">
			                    <figure class="pull-left">
			                    		

								<?php if($comment->user_id){ ?>
			
									<img src="uploads/users/thumbs50x50/<?php echo $comment->user->profile->avatar ?>" class="pic_gallery" />
								
								<?php }else{ ?>
								
									<img src="themes/thaigcd/photo/nophoto.gif" class="pic_gallery" />
								
								<?php } ?>
							   
			                        
			                    </figure>
			                </div>
			                <div class="col-md-6">
			                
			                    <h4 class="list-group-item-heading">
			                    
								    #<?php echo ($key + 1)?> 
								    By<?php echo ($comment->user_id)?$comment->user->display:$comment->name.'[Guest]' ?>
									<?php echo mysql_to_th($comment->created)?>
				
			 
			                     
			                     </h4>
			                     
			                    <p class="list-group-item-text">
			                    
										
									<?php echo strip_tags($comment->comment); ?>
									

			                    </p>
			                    
			                </div>
			                

							
			          </a>
			          
						<div class="option" style="float: right; margin-right: 25px;">
						
							<?php if(((is_login())&&($comment->user_id == $this->session->userdata('id')))||(is_login('Administrator'))): ?>
							<a href="informations/commentdel/<?php echo $comment->id?>">Xลบ</a> 
							<?php endif; ?>

							<a href="informations/alert/<?php echo $comment->id?>?iframe=true&amp;width=350&amp;height=200" rel="lightbox" >Xแจ้งลบความคิดเห็น</a>
							
						</div>
							
			          <?php endforeach; ?>
			          
			        </div>
			        </div>
				</div>
			</div>
			
			
</div>