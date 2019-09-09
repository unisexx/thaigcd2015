<ul>
	<?php foreach ($informations as $item) : ?>
    	<li style="width:27%; margin-left: 28px; margin-right: 28px;">
    	<?php if (is_file('uploads/information/thumbnail/' . $item->image)) { ?>
        	<img src="uploads/information/thumbnail/<?php echo $item->image; ?>" width="238" height="150" />
    	<?php 
			} else { ?> 
		    <img src="http://via.placeholder.com/240x150?text=no+image">
	    <?php 
			} ?> 	 
            <div class="title-news" style="height: 100px;overflow-x: hidden;overflow-y: hidden;">
            
	            <a href="informations/view/<?php echo $item->id; ?>">
	            
	            	<?php 


													$title = lang_decode($item->title);
													$text = $title;
													$text1 = $title;
						/*
						if(strlen($text)>24)
						{
							
							$str_data = html_entity_decode($text);
							$str_data = strip_tags($str_data);
							$text1 = iconv_substr($str_data, 0,24, "UTF-8"); 
							

						}*/

													echo $text1;
													?>
	            </a>
            </div>
        	<div class="line-news">&nbsp;</div>
            <p><a href="#"><?php echo lang_decode($item->intro); ?></a></p>
        	<span class="dtae-news"><?php echo mysql_to_th($item->created, 'S', true) ?></span>	
        </li>
  	<?php endforeach; ?>
</ul>

<div class="clear"></div>
<a class="pull-right" href="informations/index/145">ดูเพิ่มเติม</a>