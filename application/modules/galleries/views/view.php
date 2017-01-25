<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="media/js/colorbox/example1/colorbox.css">
<script src="media/js/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
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

<div id="breadcrumb">

<a href="<?php echo base_url(); ?>/home">หน้าแรก</a> > 

<span class="b1"><a href="<?php echo base_url(); ?>/galleries/lists">ภาพกิจกรรม</a></span>

</div>

<h4>
<?php  

/*$cat_title = $rs->name;
$cat_title1 = explode(",",$cat_title);
$cat_title2 = explode(":",$cat_title1[0]);
echo $cat_title2[1];*/
echo lang_decode($rs->name);

?>
	
</h4>

<?php foreach($galleries as $item): ?>
	
	<?php if(is_file('uploads/galleries/'.$item->image)){ ?>
		<a class="colorbox" href="<?php echo base_url(); ?>uploads/galleries/<?php echo $item->image; ?>">
		    <?php echo thumb(base_url().'uploads/galleries/'.$item->image,170,120,true,'class="pic_gallery"');?>
			<!--<img class="pic_gallery" src="<?php echo base_url(); ?>uploads/galleries/<?php echo $item->image; ?>"/>-->
		</a>
	<?php }else{ ?> 
		    <img class="pic_gallery" src="uploads/galleries/img_weblink_dummy.gif" width="98" height="90">
	<?php } ?> 
		    
<?php endforeach;?>

<br clear="all">
<div class="clear"></div>
<br clear="all">

	&nbsp; 
	<span class="date">

	<?php echo mysql_to_th($galleries->created,'S',TRUE)?>
		
	</span>
			
<div class="clear"></div>
<br clear="all">

<div id="breadcrumb">

	<span class="b1"><a href="<?php echo base_url(); ?>/galleries/lists">ภาพที่เกี่ยวข้อง</a></span>

</div>


<ul class="mediapublic">

<?php foreach($categories as $cat):?>

	<li>
		<a href="galleries/view/<?php echo $cat->id?>">
		
			<?php echo lang_decode($cat->name)?> 
			
			&nbsp; 
			<span class="date">
			
			<?php echo mysql_to_th($cat->created,'S',TRUE)?>
				
			</span>
		
		</a>
	</li>
	
<?php endforeach;?>

</ul>

<!--<a class="pull-right" href="mediapublics/index/<?php echo $group_id?>">ดูทั้งหมด</a>-->
<br clear="all">
<div class="clear"></div>
<br clear="all">

<script>
	$(document).ready(function(){
		
		$(".colorbox").colorbox({
			rel:'colorbox',
			maxWidth: '75%',
			maxHeight: '75%'
		});
		

		$("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
	});
</script>