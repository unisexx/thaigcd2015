﻿
<div id="breadcrumb">
<a href="<?php echo base_url(); ?>/home">หน้าแรก</a> 
> <span class="b1">ตัวชี้วัด</span>
</div>

<div class="clear"></div>

<h1 style="font:bold;text-shadow: 2px 2px #cccccc;">ตัวชี้วัด</h1>

<div class="clear"></div>

<form method="get" action="indicators/index">
	<p class="search" style="margin:5px 10px;">
		<label>หัวข้อ : </label> 
		<input type="text" name="search" value="<?php echo @$_GET['search'] ?>" /> 
		<input type="submit" value="ค้นหา" />
	</p>
</form>

<div class="clear"></div>
	
<ul class="mediapublic">

<?php echo $rs->pagination(); ?>

<?php foreach($rs as $rows):?>

	<li>
		<a href="indicators/view/<?php echo $rows->id; ?>">
		
			<?php echo $rows->title; ?>
			 
		</a>	
			&nbsp; 
<!--			ไฟล์ดาวน์โหลด 
			<?php //echo $rows->files; ?>
			<?php //echo icon_file($rows->files) ?> 
			&nbsp; -->
			จำนวนดาวน์โหลด (<?php echo $rows->downloads; ?>)
			
		
	</li>
	
<?php endforeach;?>

<?php echo $rs->pagination(); ?>

</ul>