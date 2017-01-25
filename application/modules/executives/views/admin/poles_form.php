<h1>รับเรื่องร้องเรียน</h1>
<form id="frmMain" action="executives/admin/executives/save_pole/<?php echo $poles->id ?>" method="post" >
<table class="form">

	<tr>
    	<th>ชื่อ :</th>
        <td>
       	 <input type="text" name="first_name" value="<?php echo $poles->first_name;?>" class="full" />
        </td>
    </tr>
	<tr>
		<th>นามสกุล :</th>
		<td>
			<input type="text" name="last_name" value="<?php echo $poles->last_name; ?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>อีเมล์ :</th>
		<td>
			<textarea name="email" id="email" class="full" rel="th"><?php echo $poles->email; ?></textarea>
		</td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<textarea name="detailS" class="full"><?php echo $poles->details; ?></textarea>

		</td>
	</tr>
	<tr>
    <th></th>
    <td>
    <!--<input type="submit" value="บันทึก" />-->
	<?php echo form_back() ?></td>
    </tr>
</table>
<?php echo form_referer() ?>
</form>