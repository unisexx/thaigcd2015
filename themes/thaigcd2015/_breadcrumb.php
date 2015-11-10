<?
	//----------------------------- BREADCRUMB LV.1 -----------------------------
	$breadcrumb_lv1 .= " > ".lang_decode($page->title);
	$breadcrumb_lv1 .= ($this->uri->segment(1) == 'executives')?" > ผู้บริหาร":"";
	
	//----------------------------- BREADCRUMB LV.2 -----------------------------
	$breadcrumb_lv2 .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'history')?"ประวัติผู้บริหาร":"";
	$breadcrumb_lv2 .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'it_more')?"ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป":"";
	$breadcrumb_lv2 .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'it_view')?"ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป":"";
	$breadcrumb_lv2 .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'exe_more')?"ข่าวสารผู้บริหาร":"";
	$breadcrumb_lv2 .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'view')?"ข่าวสารผู้บริหาร":"";
	$breadcrumb_lv2 .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'video_view')?"คลิปวิดีโอ":"";
	
	//----------------------------- BREADCRUMB LV.3 -----------------------------
	// $breadcrumb_lv3 = ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'it_view')?lang_decode($executive->title):"";
	
	//----------------------------- TITLE PAGE -----------------------------
	$title_page .= lang_decode($page->title);
	$title_page .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == '')?"ผู้บริหาร":"";
	$title_page .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'history')?"ประวัติผู้บริหาร":"";
	$title_page .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'it_more')?"ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป":"";
	$title_page .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'it_view')?lang_decode($executive->title):"";
	$title_page .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'exe_more')?"ข่าวสารผู้บริหาร":"";
	$title_page .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'view')?lang_decode($executive->title):"";
	$title_page .= ($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'video_view')?lang_decode($video->title):"";
?>


<div id="breadcrumb"><a href="home">หน้าแรก</a> <?=$breadcrumb_lv1?> <?=$breadcrumb_lv2?> <?=$breadcrumb_lv3?></div>


<div id="page-content">
<div class="title-page"><?=$title_page?></div>