<h1>เสนอแนะวิจารณ์ - <?php echo lang_decode($notice_comment->notice->title) ?></h1>
			<table class="form2"> 
				<tr>
					<th>ชื่อ-สกุล</th>
					<td><?php echo $notice_comment->name ?></td>
				</tr>
				<tr>
					<th>บริษัท </th>
					<td><?php echo $notice_comment->company ?></td>
				</tr>
				<tr>
					<th>หัวเรื่อง </th>
					<td><?php echo $notice_comment->title ?></td>
				</tr>
				<tr>
					<th>เนื้อหาเสนอแนะ </th>
					<td><?php echo nl2br($notice_comment->comment) ?></td>
				</tr>
				<tr>
					<th>อีเมล์</th>
					<td><?php echo $notice_comment->email ?></td>
				</tr>
				<tr>
					<th>เบอร์ติดต่อ</th>
					<td><?php echo $notice_comment->telephone ?></td>
				</tr>
				<tr>
					<th>วันที่เสนอแนะ</th>
					<td><?php echo mysql_to_th($notice_comment->created) ?></td>
				</tr>
			</table>
