 <style>

    .pic_gallery {

        width: 170px;
        height: 120px;
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

<!--<div id="title-blank">ภาพกิจกรรม</div>-->
<div id="breadcrumb"><a href="<?php echo base_url(); ?>/home">หน้าแรก</a> > <span class="b1">ภาพกิจกรรม</span></div>

<div id="page">


	<?foreach($categories as $row):?>

		<div class="media col-lg-6" style="position: relative;">
		  <div class="media-left media-middle">
		    <a href="galleries/view/<?=$row->id?>">

		    <?php if(is_file('uploads/galleries/'.$row->gallery->image)){ ?>
            <?php //echo base_url().'uploads/galleries/'.$row->gallery->image;?>
		        <?php echo thumb(base_url().'uploads/galleries/'.$row->gallery->image,98,90,true,'class="pic_gallery"');?>
		      <!--<img class="pic_gallery" src="uploads/galleries/<?=$row->gallery->image?>" width="98" height="90">-->
		    <?php }else{ ?>
		      <img class="pic_gallery" src="uploads/galleries/img_weblink_dummy.gif" width="98" height="90">
		    <?php } ?>
		    </a>

		  </div>
		  <div class="media-body">

		  	<a href="galleries/view/<?=$row->id?>">
		    	<h4 class="media-heading">

			    	<?php

						$title = lang_decode($row->name,'th');
						$text =  $title;
						$text1 = $title."...";

						if(strlen($text)>99)
						{

							$str_data = html_entity_decode($text);
							$str_data = strip_tags($str_data);
							$text1 = iconv_substr($str_data, 0,99, "UTF-8")."...";


						}

						echo $text1;

					?>


		    	</h4>
		    </a>

		    (<?=$row->gallery->count();?> รูป)
		    <i class="fa fa-picture-o"></i>
		  </div>
		</div>
	<?endforeach;?>

	<br clear="all">

    <?php echo $categories->pagination(); ?>

<br clear="all">

</div>
