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
	
		<a class="colorbox" href="<?php echo base_url(); ?>uploads/galleries/<?php echo $item->image; ?>">
		    <?php echo thumb(base_url().'uploads/galleries/'.$item->image,170,120,true,'class="pic_gallery"');?>
			<!--<img class="pic_gallery" src="<?php echo base_url(); ?>uploads/galleries/<?php echo $item->image; ?>"/>-->
		</a>
		
			
	
<?php endforeach;?>

<br clear="all">
<div class="clear"></div>
<a class="pull-right" href="galleries/lists/<?php echo $group_id?>">ดูทั้งหมด</a>


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