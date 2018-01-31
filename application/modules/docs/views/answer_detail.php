<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo base_url(); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<style type="text/css">
table th,td{
	line-height:20px;
	vertical-align: text-top;
}
body{
	font-size:14px;
}
div#print-header {
		background-color: #F4F4F4;
		padding: 3px;
}
h1{
	font-size: 16px;
	margin: 5px;
	padding: 0;
}
div#form-body {
	background-color: #FFFFFF;
}
.form-inner {
	padding: 10px;
}
.form-inner h2 {
	font-size: 14px;
	text-decoration: underline;
}
#form-body p {
		padding: 0 0 10px;
}
.form-inner .detail {
		text-indent: 15px;
		line-height: 20px;
}
ol, ul {
	list-style: none;
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-size: 100%;
	vertical-align: baseline;
	background: transparent;
}

#form-body .q {
		padding: 5px 0;
		padding-bottom: 5px;
		border-bottom: 1px solid #CCC;
}
#form-body .q table th {
		width: 70px;
		font-weight: bold;
		text-align: left;
		color: #000;
}
.noborder {
		border: none !important;
		background: none !important;
}
#form-body .q.grid table table td {
		border: 1px solid #CCC;
		text-align: center;
		vertical-align: middle;
		padding: 5px;
}
#form-body .q.grid table table th {
		border: 1px solid #CCC;
		text-align: center;
		vertical-align: middle;
		padding: 5px;
}
table {
		border-collapse: collapse;
		border-spacing: 0;
}
table th{
		border-collapse: collapse;
		border-spacing: 0;

}
table td{
		border-collapse: collapse;
		border-spacing: 0;
		padding:5px 10px;
}
@page{
				size: A4;
				margin-left: 10px;
				margin-right: 10px;
				margin-top: 25px;
				margin-bottom: 40px;
				@bottom-right {
            content: counter(page) "/" counter(pages);
        }
}
@media print{
		body{
			font-size:14px;
		}
		div#print-header {
		    background-color: #F4F4F4;
		    padding: 3px;
		}
		h1{
			font-size: 16px;
			margin: 5px;
			padding: 0;
		}
		div#form-body {
    	background-color: #FFFFFF;
		}
		.form-inner {
    	padding: 10px;
		}
		.h2 {
    	font-size: 14px;
    	text-decoration: underline;
		}
		#form-body p {
		    padding: 0 0 10px;
		}
		.form-inner .detail {
		    text-indent: 15px;
		    line-height: 20px;
		}
		ol, ul {
    	list-style: none;
			margin: 0;
			padding: 0;
			border: 0;
			outline: 0;
			font-size: 100%;
			vertical-align: baseline;
			background: transparent;
		}

		.q {
		    padding: 5px 0;
				padding-bottom: 5px;
		    border-bottom: 1px solid #CCC;
		}
		.q table th {
		    width: 70px;
		    font-weight: bold;
		    text-align: left;
		    color: #000;
		}
		.noborder {
		    border: none !important;
		    background: none !important;
		}
		.q.grid table table td {
		    border: 1px solid #CCC;
		    text-align: center;
				vertical-align: middle;
		    padding: 5px;
		}
		.q.grid table table th {
		    border: 1px solid #CCC;
		    text-align: center;
				vertical-align: middle;
		    padding: 5px;
		}
		table {
		    border-collapse: collapse;
		    border-spacing: 0;
		}
		table th{
		    border-collapse: collapse;
		    border-spacing: 0;
				padding:5px 10px;
		}
		table td{
		    border-collapse: collapse;
		    border-spacing: 0;
				padding:5px 10px;
		}
}
</style>
</head>
<body>
<table>
	<tr>
		<th style="padding:10px 10px;border:1px solid #CCCCCC;">
					<h1>แบบสอบถาม - <?php echo $topic->title ?></h1>
					<?php
					if($answer_list[0]->session != '' ):
					echo 'session id ::: '.$answer_list[0]->session;
					endif;
					?>
					<?php
					if($answer_list[0]->user_id > 0 ):
					echo 'user id ::: '.$answer_list[0]->user_id;
					endif;
					?>
					(<?php echo mysql_to_th($answer_list[0]->answer_date,'S',true);?>)
					<br>
		</th>
	</tr>
<tbody>
	<tr>
		<td>
<div id="form-body">
	<div class="form-inner">
		<h2>คำชี้แจง</h2>
		<p class="detail"><?php echo nl2br($topic->detail) ?></p>
		<ul id="sortable">
			<?php foreach($topic->questionaire->order_by('sequence')->get() as $key => $question): ?>
			<?php question_form2($question,$key,true); ?>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
		</td>
	</tr>
</tbody>
</table>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>
