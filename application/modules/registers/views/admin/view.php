<script type="text/javascript" src="media/js/jquery.printElement.js"></script>
<script type="text/javascript">
	$(function(){
		$('input[name=print]').click(function(){
			$("table").printElement();
		})
	})
</script>
<h1>ใบสมัครศูนย์เด็กเล็กปลอดโรค</h1>
			<table class="form2"> 
				<tr>
					<th>ชื่อศูนย์เด็กเล็ก</th>
					<td><?php echo $register->center ?></td>
				</tr>
				<tr>
					<th>เลขที่ </th>
					<td><?php echo $register->home_no ?></td>
				</tr>
				<tr>
					<th>หมู่ </th>
					<td><?php echo $register->moo ?></td>
				</tr>
				<tr>
					<th>จังหวัด </th>
					<td><?php echo $register->province->name ?></td>
				</tr>
				<tr>
					<th>เขต/อำเภอ</th>
					<td><?php echo $register->amphur->amphur_name ?></td>
				</tr>
				<tr>
					<th>แขวง/ตำบล</th>
					<td><?php echo $register->district->district_name ?></td>
				</tr>
				<tr>
					<th>รหัสไปรษณีย์</th>
					<td><?php echo $register->postcode ?></td>
				</tr>
				<tr>
					<th>โทรศัพท์</th>
					<td><?php echo $register->telephone ?></td>
				</tr>
				<tr>
					<th>แฟกซ์</th>
					<td><?php echo $register->fax ?></td>
				</tr>
				<tr>
					<th>อีเมล์</th>
					<td><?php echo $register->email ?></td>
				</tr>
				<tr>
					<th>ชื่อผู้สมัคร</th>
					<td><?php echo $register->name ?></td>
				</tr>
				<tr>
					<th>ตำแหน่ง</th>
					<td><?php echo $register->position ?></td>
				</tr>
				<tr>
					<th>วันที่สมัคร</th>
					<td><?php echo mysql_to_th($register->created) ?></td>
				</tr>
				</table>
				<input type="button" name="print" value="Print" />
