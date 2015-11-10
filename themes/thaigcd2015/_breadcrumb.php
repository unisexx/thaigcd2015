<?
//------------------------------------------------ PAGE ------------------------------------------------
if($page->title){
	$breadcrumb = ' > '.lang_decode($page->title); 
	$title_page = lang_decode($page->title);
}

//------------------------------------------------ EXECUTIVES ------------------------------------------------
if($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == ''){
	$breadcrumb = " > ผู้บริหาร"; 
	$title_page = "ผู้บริหาร";
}
	
if($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'history'){
	$breadcrumb = " > <a href='executives'>ผู้บริหาร</a> > ประวัติผู้บริหาร";
	$title_page = "ประวัติผู้บริหาร";
}
	
if($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'it_more'){			
	$breadcrumb = " > <a href='executives'>ผู้บริหาร</a> > ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป";
	$title_page = "ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป";
}

if($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'it_view'){ 				
	$breadcrumb = " > <a href='executives'>ผู้บริหาร</a> > <a href='executives/it_more'>ผู้บริหารเทคโนโลยีสารสนเทศระดับสูง สำนักโรคติดต่อทั่วไป</a> > ".lang_decode($executive->title);
	$title_page = lang_decode($executive->title);
}

if($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'exe_more'){
	$breadcrumb = " > <a href='executives'>ผู้บริหาร</a> > ข่าวสารผู้บริหาร";
	$title_page = "ข่าวสารผู้บริหาร";
}

if($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'view'){ 					
	$breadcrumb = " > <a href='executives'>ผู้บริหาร</a> > <a href='executives/exe_more'>ข่าวสารผู้บริหาร</a> > ".lang_decode($executive->title);
	$title_page = lang_decode($executive->title);
}

if($this->uri->segment(1) == 'executives' and $this->uri->segment(2) == 'video_view'){ 			
	$breadcrumb = " > <a href='executives'>ผู้บริหาร</a> > <a href='executives/video_view'>คลิปวิดีโอ</a> > ".lang_decode($video->title);
	$title_page = lang_decode($video->title);
}

//------------------------------------------------ GROUPS ------------------------------------------------
if($this->uri->segment(1) == 'groups' and $this->uri->segment(2) == ''){ 						
	$breadcrumb = " > กลุ่มงาน";
	$title_page = "กลุ่มงาน สำนักโรคติดต่อทั่วไป";
}

if($this->uri->segment(1) == 'groups' and $this->uri->segment(2) == 'view'){ 						
	$breadcrumb = " > <a href='groups'>กลุ่มงาน</a> > ".lang_decode($group->name);
	$title_page = lang_decode($group->name);
}

//------------------------------------------------ KNOWLEDGES ------------------------------------------------
if($this->uri->segment(1) == 'knowledges' and $this->uri->segment(2) == ''){ 						
	$breadcrumb = " > คลังความรู้ ศูนย์รวมวิชาการ";
	$title_page = "คลังความรู้ ศูนย์รวมวิชาการ";
}

if($this->uri->segment(1) == 'knowledges' and is_numeric($this->uri->segment(2))){ 						
	$breadcrumb = " > <a href='knowledges'>คลังความรู้ ศูนย์รวมวิชาการ</a> > ".lang_decode($category->name);
	$title_page = lang_decode($category->name);
}

if($this->uri->segment(1) == 'knowledges' and $this->uri->segment(2) == "view"){ 						
	$breadcrumb = " > <a href='knowledges'>คลังความรู้ ศูนย์รวมวิชาการ</a> > <a href='knowledges/".$knowledge->category->id."'>".lang_decode($knowledge->category->name)."</a> > ".lang_decode($knowledge->title);
	$title_page = lang_decode($knowledge->title);
}

//------------------------------------------------ POLLS ------------------------------------------------
if($this->uri->segment(1) == 'polls' and $this->uri->segment(2) == ''){ 						
	$breadcrumb = " > แบบสำรวจความคิดเห็น";
	$title_page = "แบบสำรวจความคิดเห็น";
}

//------------------------------------------------ LAWS ------------------------------------------------
if($this->uri->segment(1) == 'laws' and $this->uri->segment(2) == ''){ 						
	$breadcrumb = " > กฏหมายที่เกี่ยวข้อง";
	$title_page = "กฏหมายที่เกี่ยวข้อง";
}

if($this->uri->segment(1) == 'laws' and $this->uri->segment(2) == 'view'){ 						
	$breadcrumb = " > <a href='laws'>กฏหมายที่เกี่ยวข้อง</a> > ".lang_decode($law->title);
	$title_page = lang_decode($law->title);
}
?>

<div id="breadcrumb"><a href="home">หน้าแรก</a> <?=$breadcrumb?></div>

<div id="page-content">
<div class="title-page"><?=$title_page?></div>