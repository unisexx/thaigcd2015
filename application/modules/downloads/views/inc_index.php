<div class="title-page">ดาวน์โหลด</div>
<div class="clear"></div>
<form method="get" action="downloads/inc_home">
	<div class="row">
	    <div class="col-sm-4">
	    <label>ประเภท : </label> 
        <?php echo form_dropdown('category_id',$downloads->category->get_option(),@$_GET['category_id'],'class="form-control"','ทั้งหมด') ?>
        </div>       
        <div class="col-sm-8"> 
		<label>หัวข้อ : </label> 
		<input type="text" name="search" class="form-control" value="<?php echo @$_GET['search'] ?>" />
		</div>
	</div>
	<div class="clear"></div> 
	<br>
	<div class="row">		
		<div class="col-sm-12">
		<input type="submit" value="ค้นหา" class="btn btn-primary" />
		</div>
	</div>
</form>
<hr>
<div class="row">    
<div class="" style="min-height: 350px;">	
<ul class="mediapublic">

<?php echo $downloads->pagination(); ?>

<?php foreach($downloads as $rows):?>

	<li>
		<a href="downloads/download/<?php echo $rows->id; ?>">
		
			<?php echo lang_decode($rows->title,'th'); ?>
			 
		</a>	
			&nbsp; 
			ไฟล์ดาวน์โหลด 
			<?php //echo $rows->file; ?>
			<?php echo icon_file($rows->file) ?> 
			&nbsp; 
			จำนวนดาวน์โหลด (<?php echo $rows->counter; ?>)
			
		
	</li>
	
<?php endforeach;?>

<?php echo $downloads->pagination(); ?>

</ul>
</div>
</div>