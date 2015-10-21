<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<style type="text/css">
body table tr td{font-size:13px; padding:3px;}
h1 {
	color: #3ABA07;
    font-size: 1.8em;
    font-weight: normal;
    letter-spacing: -1px;
    margin: 0;
    padding: 0;
	border-bottom:1px dashed #f0f0f0;
}
table{border-collapse:collapse;}
table th{
	font-size:13px;
	font-weight:bold;
	text-align:center;
}
.gray{
	color:#949494;
}
/*.odd{background:#EDFBFE; border-bottom:1px solid #6ED6F3; border-top:1px solid #6ED6F3;}*/
</style>
<h1>Thaigcd : บันทึกการสนทนา</h1>
<table>
	<tr>
		<th>Date</th>
		<th>Name</th>
		<th>Message</th>
		<th>Status</th>
	</tr>
	<?php foreach($logs as $log): ?>
	<?php if(isset($log[10])):?>
		<tr <?php echo cycle()?>>
			<td class="gray"><?php echo date("d-m-Y (H:i)", $log[0])?></td>
			<td><?php echo @$log[10].' : ' ?></td>
			<td><?php echo @$log[6] ?></td>
			<td class="gray" align="right"><?php echo @$log[7] ?></td>
		</tr>
	<?php endif;?>
	<?php endforeach; ?>
</table>
