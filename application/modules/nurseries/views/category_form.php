<div class="topic"><img src="themes/gcdnew/images/topic_child.png" width="200" height="25" /></div>
<form id="frmnursery" method="post" action="nurseries/category_save/<?=$category->id?>">
    <div id="data">
        <fieldset style="border:1px dashed #ccc; padding:10px;">
        <legend style="padding:0 5px; font-size:14px; font-weight:700; color:#666;">ประเภทศูนย์เด็กเล็ก</legend>
			<table class="tbchildform">
                 <tr>
                   <th>ประเภทศูนย์เด็กเล็ก<strong> <span class="TxtRed">*</span></strong></th>
                   <td><input type="text" name="title" value="<?=$category->title?>" id="textfield8" style="width:200px;" /><input type="submit" value=" บันทึก " style="margin-left:5px;"/></td>
                 </tr>
			</table>
          </fieldset>
	</div>
</form>

<div style="float:right; padding:10px 0; margin-right:30px;"><a href="nurseries/register" class="btn">กลับหน้าแรก</a></div>
<div id="data">
	<table class="tbchild">
    <tr>
        <th>ประเภทศูนย์เด็กเล็ก</th>
        <th width="100">จัดการ</th>
    </tr>
    <?php foreach($categories as $row):?>
    	<tr>
	        <td><?=$row->title?></td>
	        <td width="100">
	        	<a href="nurseries/category_form/<?=$row->id?>" class="btn">แก้ไข</a>
	        	<a href="nurseries/category_delete/<?=$row->id?>" class="btn" onclick="return(confirm('ยืนยันการลบข้อมูล'))" >ลบ</a>
	        </td>
        </tr>
    <?php endforeach;?>
    </table>
</div>