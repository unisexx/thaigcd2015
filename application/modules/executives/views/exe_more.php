<div id="page">
	<div id="breadcrumb"><a href="home">หน้าแรก</a> > <a href="executives">ผู้บริหาร</a> > ข่าวสารผู้บริหาร</div>
    <div id="page-content">
    <div class="title-page">ข่าวสารผู้บริหาร</div>
    

	<ul>
  		<?php foreach($executives as $row):?>
		<li style="list-style-type: disc !important;"><a href="executives/view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></li>
		<?php endforeach;?>
  	</ul>
	


	</div>
</div>