<div class="corner" id="boxknowledge">
	<div class="subtopic">

		<form class="form-inline" method="get">

		  <div class="form-group">
		    <input type="text" class="form-control input-sm" id="exampleInputName2" name="search" value="<?php echo @$_GET['search'] ?>" placeholder="ค้นหาชื่อโรค.....">
		  </div>
		  <button type="submit" class="btn btn-primary">ค้นหา</button>
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Index</a>
		</form>
	</div>

	<div id="data">

		<!-- <div class="groupname"><?php echo lang_decode($category->name) ?></div> -->

		<?php if($category->id==17): ?>

		<div class="knowledage_label">
			  <div class="collapse" id="collapseExample" style="padding-top:5px;">
								<?php foreach ($category->knowledge->label() as $label): ?>
										<a href="knowledges/17?label=<?php echo $label ?>" class="btn btn-default <?php echo ($_GET['label']==$label)?'active':'' ?>"><?php echo $label ?></a>
										<?php if ($label=='ฮ'){ ?>
												<br>
										<?php } ?>
								<?php endforeach; ?>
				</div>
		</div>
		<hr>

		<?php else: ?>

			<?php echo $category->knowledge->pagination() ?>

			<?php endif; ?>


			<div class="clear"></div>

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

				        	foreach($category->knowledge as $knowledge):

					        if($i==1){
								$class = 'active';
								$i=0;
							}else{
								$class = '';
								$i=1;
							}

			        ?>

			          <a href="knowledges/view/<?php echo $knowledge->id ?>" class="list-group-item <?php echo $class; ?>" target="_blank" >
			                <div class="media col-md-3">
			                    <figure class="pull-left">


							<img class="pic_gallery" width="77" height="64" src="<?php echo (is_file('uploads/knowledge/thumbnail/'.$knowledge->image))? 'uploads/knowledge/thumbnail/'.$knowledge->image : 'themes/thaigcd/photo/nophoto.gif' ?>">



			                    </figure>
			                </div>
			                <div class="col-md-6">

			                    <h4 class="list-group-item-heading">

			                    <?php echo mysql_to_th($knowledge->start_date)?> -
			                    <?php echo lang_decode($knowledge->title) ?>

			                    </h4>

			                    <p class="list-group-item-text">

					            	<?php echo lang_decode($knowledge->intro) ?>

			                    </p>

			                </div>

			          </a>

			          <?php endforeach; ?>

			        </div>
			        </div>
				</div>
			</div>



			<?php echo $category->knowledge->pagination() ?>

	</div><!--data-->
</div>
