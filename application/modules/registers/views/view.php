<h1>ใบสมัครศูนย์เด็กเล็กปลอดโรค</h1>
			<table class="form2"> 
				<tr>
					<td><strong>ชื่อศูนย์เด็กเล็ก</strong></td>
					<td><?php echo $register->center ?></td>
				</tr>
				<tr>
					<td><strong>เลขที่ </strong></td>
					<td><?php echo $register->home_no ?></td>
				</tr>
				<tr>
					<td><strong>หมู่ </strong></td>
					<td><?php echo $register->moo ?></td>
				</tr>
				<tr>
					<td><strong>จังหวัด </strong></td>
					<td><?php echo $register->province->name ?></td>
				</tr>
				<tr>
					<td><strong>เขต/อำเภอ</strong></td>
					<td><?php echo $register->amphur->amphur_name ?></td>
				</tr>
				<tr>
					<td><strong>แขวง/ตำบล</strong></td>
					<td><?php echo $register->district->district_name ?></td>
				</tr>
				<tr>
					<td><strong>รหัสไปรษณีย์</strong></td>
					<td><?php echo $register->postcode ?></td>
				</tr>
				<tr>
					<td><strong>โทรศัพท์</strong></td>
					<td><?php echo $register->telephone ?></td>
				</tr>
				<tr>
					<td><strong>แฟกซ์</strong></td>
					<td><?php echo $register->fax ?></td>
				</tr>
				<tr>
					<td><strong>อีเมล์</strong></td>
					<td><?php echo $register->email ?></td>
				</tr>
				<tr>
					<td><strong>ชื่อผู้สมัคร</strong></td>
					<td><?php echo $register->name ?></td>
				</tr>
				<tr>
					<td><strong>ตำแหน่ง</strong></td>
					<td><?php echo $register->position ?></td>
				</tr>
				</table>
