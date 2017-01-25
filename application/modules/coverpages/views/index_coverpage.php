<!--<meta http-equiv="refresh" content="0;url=http://www.m-society.go.th/main.php?filename=index">-->

<html>
<style>
body {padding:0; margin:0; background-image:url(<?php echo base_url(); ?>/themes/images/1251.jpg);}
	.cover{text-align:center; margin-bottom:30px;}
	.entry{margin:0 auto; text-align:center;}
	.btn:hover{opacity:0.8;}
	
    .pic_gallery {
    
/*        width: 170px;
        height: 120px;
		float:left;*/
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
/*    *{
    -moz-filter: grayscale(100%);
    -webkit-filter: grayscale(100%);
    filter: gray; 
    filter: grayscale(100%);
}*/
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>สำนักโรคติดต่อทั่วไป กรมควบคุมโรค</title>
</head>
<body bgcolor="white">
    <div class="cover">
    
    <img src="<?php echo base_url(); ?>/uploads/coverpages/<?php echo $coverpage->image; ?>" width="700" class="pic_gallery">
   <br>
<!--    <p>
    	 สำนักโรคติดต่อทั่วไป <Br>
         กรมควบคุมโรค กระทรวงสาธารณสุข <br>
		 Bureau of General Communicable Diseases<br>
		 Department of Disease Control<Br>
		 Ministry of Public Health, Thailand <Br>
    </p>-->
    
    <!-- <img src="<?php echo base_url(); ?>/themes/images/logo3.png" >-->
    
    <img src="<?php echo base_url(); ?>/themes/thaigcd2015/images/name.png" >
  
    	
    </div>

    	<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="entry">
  <tr>
    <td align="left">
    
	    <a href="<?php echo base_url(); ?>home">
	    
	    	<img src="<?php echo base_url(); ?>/themes/images/btn-gcd-new.png" width="219" height="46" border="0" class="btn">
	    	
	    </a>
	    
    </td>
    <td>
	    <a href="<?php echo base_url(); ?>en">
	    	<img src="<?php echo base_url(); ?>/themes/images/btn-gcd-en.png" width="219" height="46" border="0" class="btn">
	    	
	    </a>
    </td>
    <td align="right">
	    <a href="http://thaigcd.ddc.moph.go.th/home">
	    	<img src="<?php echo base_url(); ?>/themes/images/btn-gcd-old.png" width="219" height="46" border="0" class="btn">
	    	
	    </a>
    </td>
    </tr>
</table>
    	<br>
    	
    	<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="entry">
    	  <tr>
    	  <?php
    	  $i=0;
    	  foreach($coverpage_banner as $row):
    	  $i++;
    	  if($i==1){
		  	$position = "left";
		  }elseif($i==2){
		  	$position = "center";
		  }elseif($i==3){
		  	$position = "right";
		  }
    	  ?>
    	    <td align="<?php echo $position; ?>">
    	    
	    	    <a href="<?php echo $row->link; ?>">
	    	    
	    	    	<img src="<?php echo base_url(); ?>/uploads/coverpages_banner/<?php echo $row->image; ?>" width="220" height="60" border="0" class="pic_gallery">
	    	    	
	    	    </a>
    	    
    	    </td>
    	    <?endforeach;?>
<!--    	    <td align="center">
    	    
	    	    <a href="http://thaileptoclub.org/index.php">
	    	    
	    	    	<img src="<?php echo base_url(); ?>/themes/images/lebto.jpg" width="220" height="60" border="0">
	    	    	
	    	    	
	    	    </a>
    	    
    	    </td>
    	    <td align="right">
    	    
	    	    <a href="http://thaigcd.ddc.moph.go.th/chats">
	    	    
	    	    	<img src="<?php echo base_url(); ?>/themes/images/bann_chat.jpg" width="220" height="60" border="0">
	    	    	
	    	    	
	    	    </a>
    	    
    	    </td>-->
  	    </tr>
  	  </table>
  	  
</body>
</html>