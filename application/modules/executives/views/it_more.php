<div id="page">
	<div id="breadcrumb"><a href="home">หน้าแรก</a> > <a href="executives">ผู้บริหาร</a> > ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป</div>
    <div id="page-content">
    <div class="title-page">ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป</div>
    
    

	<h3><?php echo lang_decode($executive->title) ?></h3>
	<ul>
  		<?php foreach($its as $row):?>
  			<li style="list-style-type: disc !important;"><a href="executives/it_view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></li>
  		<?php endforeach;?>
  	</ul>
	


	</div>
</div>