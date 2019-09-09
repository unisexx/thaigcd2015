<style>
	#stat{width:100%;}
	#stat th, #stat td{padding:5px 0;border-bottom:1px dotted #eee;}
	#stat th{text-align:left;}
	#stat td{text-align:right;}
</style>
<div class="box">
	<h3><?php echo lang('stat_header'); ?></h3>
	<div class="box-content" id="stat-area">
		
	</div>
	<div id="col-today"></div>
	<div class="bottom"></div>
</div>
<script src="media/js/gaApi.js" charset="utf-8"></script>
<script>
	$(function(){
		gaApi('<?php echo $today; ?>', '#col-today');
        gaApi('<?php echo $month; ?>', '#col-month');
        gaApi('<?php echo $total; ?>', '#col-total');
	});
</script>