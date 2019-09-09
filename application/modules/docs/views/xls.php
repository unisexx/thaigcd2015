
<div id="container">
<div style="width: 800px; height: auto; margin: 0 auto" >

<img src="<?php echo base_url(); ?>themes/images/logo3.png" style="float:left;">
<h1 style="margin:120px;">
สำนักโรคติดต่อทั่วไป 
</h1>
<h2 style="margin:120px;">
กรมควบคุมโรค กระทรวงสาธารณสุข
</h2>

</div>
	<div id="content">
    
		<h1 style="font-size:20px;" class="cufon">
        รายงานแบบสอบถาม<?php echo $topic->title ?>
        

        </h1>

<?php foreach($topic->questionaire->order_by('sequence','asc')->get() as $key => $question): ?>


<?php if($question->type=='text'): ?>

<div >
<h4><?php echo $question->question ?> </h4>
<div>
<div id="container<?php echo $key ?>" style="width: 800px; height: auto; margin: 0 auto"></div>
<table border="1">
	<tr><th></th><th>จำนวน</th><th>ร้อยละ</th></tr>
	<tfoot><tr><td>รวม</td><td><?php echo $question->answer->count() ?></td><td>100</td></tr></tfoot>
	<?php foreach ($question->answer->select('answer')->select_func('COUNT', '@answer', 'num')->group_by('answer')->get() as $answer): ?>
	<tr <?php echo cycle() ?>><td><?php echo $answer->answer ?></td><td><?php echo $answer->num ?></td><td><?php echo round($answer->num/$question->answer->count()*100,2)?></td></tr>
	<?php endforeach; ?>
	
</table>
</div>
</div>
<?php endif; ?>

<?php if($question->type=='radio'): ?>

<div >
<h4><?php echo $question->question ?></h4>
<div>
<div id="container<?php echo $key ?>" style="width: 800px; height: auto; margin: 0 auto"></div>
<table border="1">
	<tr><th></th><th>จำนวน</th><th>ร้อยละ</th></tr>
	<tfoot><tr><td>รวม</td><td><?php echo $question->answer->count() ?></td><td>100</td></tr></tfoot>
	<?php foreach ($question->answer->select('*')->select_func('COUNT', '@choice_id', 'num')->group_by('choice_id')->get() as $answer): ?>
	<tr <?php echo cycle() ?>><td><?php echo ($answer->choice->name)?$answer->choice->name:'<a rel="other" href="docs/other/'.$answer->questionaire_id.'">อื่นๆ</a><div></div>' ?></td><td><?php echo $answer->num ?></td><td><?php echo round($answer->num/$question->answer->count()*100,2)?></td></tr>
	<?php endforeach; ?>
</table>
</div>
</div>
<?php endif; ?>

<?php if($question->type=='checkbox'): ?>

<div >
<h4><?php echo $question->question ?></h4>
<div>
<div id="container<?php echo $key ?>" style="width: 800px; height: auto; margin: 0 auto"></div>
<table border="1">
	<tr><th></th><th>จำนวน</th><th>ร้อยละ</th></tr>
	<tfoot><tr><td>รวม</td><td><?php echo $question->answer->count() ?></td><td>100</td></tr></tfoot>
	<?php foreach ($question->answer->select('*')->select_func('COUNT', '@choice_id', 'num')->group_by('choice_id')->get() as $answer): ?>
	<tr <?php echo cycle() ?>><td><?php echo ($answer->choice->name)?$answer->choice->name:'<a rel="other" href="docs/other/'.$answer->questionaire_id.'">อื่นๆ</a><div></div>' ?></td><td><?php echo $answer->num ?></td><td><?php echo round($answer->num/$question->answer->count()*100,2)?></td></tr>
	<?php endforeach; ?>
</table>
</div>
</div>
<?php endif; ?>

<?php if($question->type=='scale'): ?>

<div >
<h4><?php echo $question->question ?></h4>
<div>
<div id="container<?php echo $key ?>" style="width: 800px; height: auto; margin: 0 auto"></div>
<table border="1">
	<tr><th></th><th>จำนวน</th><th>ร้อยละ</th></tr>
	<tfoot><tr><td>รวม</td><td><?php echo $question->answer->count() ?></td><td>100</td></tr></tfoot>
	<?php foreach ($question->answer->select('answer')->select_func('COUNT', '@answer', 'num')->group_by('answer')->get() as $answer): ?>
	<tr <?php echo cycle() ?>><td><?php echo $answer->answer ?></td><td><?php echo $answer->num ?></td><td><?php echo round($answer->num/$question->answer->count()*100,2)?></td></tr>
	<?php endforeach; ?>
</table>
</div>
</div>
<?php endif; ?>

<?php if($question->type=='grid'): ?>
<?php $optional = json_decode($question->optional,TRUE); ?>

<div>
<h4><?php echo $question->question ?></h4>
<div>
<div id="container<?php echo $key ?>" style="width: 800px; height: auto; margin: 0 auto"></div>
<table width="90%" border="1">
	<tr>
		<th></th>
		<?php for($i=1;$i<=$question->range;$i++): ?>
		<th><?php echo (@$optional[$i-1])?$optional[$i-1]:$i ?><br /><?php echo '('.($question->range - $i + 1).')' ?></th>
		<?php endfor; ?>
		<th>เฉลี่ย</th>
	
	</tr>
	<?php foreach ($question->answer->select('*')->select_func('AVG', '@answer', 'num')->group_by('choice_id')->get() as $answer): ?>
	<tr <?php echo cycle() ?>>
		<td><?php echo $answer->choice->name ?></td>
		<?php for($i=$question->range;$i>=1;$i--): ?><td><?php echo $question->answer->where('choice_id',$answer->choice_id)->where('answer',$i)->count()?></td><?php endfor; ?>
		<td><?php echo round($answer->num,2) ?></td></tr>
	<?php endforeach; ?>
</table>
</div>
</div>
<?php endif; ?>



<?php if($question->type=='textarea'): ?>
<div>
	<h4><?php echo $question->question ?></h4>
<div>
	<table style="width:800px;" border="1">
		<tr>
			<th>ลำดับ</th>
			<th>คำตอบ</th>
		</tr>
		<?php foreach ($question->answer->get() as $key => $answer): ?>
		<tr <?php echo cycle() ?>>
			<td><?php echo ++$key ?></td>
			<td style="text-align:left;"><?php echo nl2br($answer->answer) ?></td></tr>
		<?php endforeach; ?>
	</table>
</div>
</div>
<?php endif; ?>
<?php endforeach; ?>

</div>
</div>


<?php
    $reportname="รายงานแบบสอบถาม".$topic->title.".xls";
    header("Content-Disposition: attachment; filename=".$reportname); 
    header("Content-Type: application/vnd.ms-excel");
    
?>