<h1>เสนอแนะวิจารณ์ - <?php echo lang_decode($notice->title) ?></h1>
			<table class="form2"> 
				<tr>
					<td><strong>ชื่อ-สกุล</strong></td>
					<td><?php echo $notice_comment->name ?></td>
				</tr>
				<tr>
					<td><strong>บริษัท </strong></td>
					<td><?php echo $notice_comment->company ?></td>
				</tr>
				<tr>
					<td><strong>หัวเรื่อง </strong></td>
					<td><?php echo $notice_comment->title ?></td>
				</tr>
				<tr>
					<td><strong>เนื้อหาเสนอแนะ </strong></td>
					<td><?php echo nl2br($notice_comment->comment) ?></td>
				</tr>
				<tr>
					<td><strong>อีเมล์</strong></td>
					<td><?php echo $notice_comment->email ?></td>
				</tr>
				<tr>
					<td><strong>เบอร์ติดต่อ</strong></td>
					<td><?php echo $notice_comment->telephone ?></td>
				</tr>
				<tr>
					<td><strong>วันที่เสนอแนะ</strong></td>
					<td><?php echo mysql_to_th($notice_comment->created) ?></td>
				</tr>
			</table>
