<style media="screen">
.poll-bar{background:#DDD;}
.poll-foreground{height:10px; background:#000;}
.poll-percent{text-align:right;font-size: 8px;}
.poll-text{text-align:center;}
.poll-result{margin:5px 0 0 0;}
</style>

<?php foreach($polls as $poll): ?>
<div class="poll-text"><?php echo $poll->name ?></div>
<div class="poll-bar"><div class="poll-foreground" style="width:<?php echo $poll->percent ?>%;"></div></div>
<div class="poll-percent"><!--<span style="float:left;"><?php echo $rs['num'] ?> คน</span>--><?php echo $poll->percent ?>%</div>
<?php endforeach; ?>
