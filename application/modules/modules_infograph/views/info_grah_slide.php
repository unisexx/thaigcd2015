
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url(); ?>media/owlcarousel/assets/css/bootstrapTheme.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>media/owlcarousel/assets/css/custom.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>media/owlcarousel/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>media/owlcarousel/owl-carousel/owl.theme.css" rel="stylesheet">

    <!-- Prettify -->
<link href="<?php echo base_url(); ?>media/owlcarousel/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
 

            <table bgcolor="#ffffff" style="width:650px;"  >
                <tr>
                    <td align="left" style="width:50%;" >
                    
                    
                      <div id="demo" >
                        <div class="container" style="width:650px;">
                          <div class="row" >
                            <div class="span12">
                
                              <div id="owl-demo" class="owl-carousel" style="width:550px;">
                              
                              <?php foreach($rs_data as $key=>$data_infograph){ ?>
                              
                                <div class="item"><img src="<?php echo base_url(); ?>uploads/modules_infograph/image/<?php echo $data_infograph->image ?>" alt="Owl Image"></div>
                                
                              <?php } ?>
                                
                                
                              </div>
                              
                            </div>
                          </div>
                        </div>
                
                    </div>
                    
                    </td>
                    <td>
                        <ul class="notice">
                        
                            <?php foreach($rs_txt as $item1): ?>
                            
                                <li>
                                    <a class="thumb" href="<?php echo base_url(); ?>modules_infograph/view/<?php echo $item1->id; ?>" target="_self">
                                        <span class="pull-left" style="margin-top:10px; width:320px;">
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
	
<script src="<?php echo base_url(); ?>media/owlcarousel/assets/js/jquery-1.9.1.min.js"></script> 
<script src="<?php echo base_url(); ?>media/owlcarousel/owl-carousel/owl.carousel.js"></script>


    <!-- Demo -->

<style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
</style>


<script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 2
      });

    });
</script>

<script src="<?php echo base_url(); ?>media/owlcarousel/assets/js/bootstrap-collapse.js"></script>
<script src="<?php echo base_url(); ?>media/owlcarousel/assets/js/bootstrap-transition.js"></script>
<script src="<?php echo base_url(); ?>media/owlcarousel/assets/js/bootstrap-tab.js"></script>

<script src="<?php echo base_url(); ?>media/owlcarousel/assets/js/google-code-prettify/prettify.js"></script>
<script src="<?php echo base_url(); ?>media/owlcarousel/assets/js/application.js"></script>


			<br clear="all">
			<div class="clear"></div>
			<a class="pull-right" href="modules_infograph/modules_infograph_list">ดูทั้งหมด</a>
			<br clear="all">