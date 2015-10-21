<script type="text/javascript">
$(document).ready(function(){
	$("select[name=province_id]").live("change",function(){
		//$("<img class='loading' src='themes/bo/images/loading.gif' style='vertical-align:middle;'>").appendTo(".loadingicon");
		$.post('nurseries/get_amphur',{
				'province_id' : $(this).val()
			},function(data){
				$("#amphur").html(data);	
				//$('.loading').remove();
			});
	});
	
	$("select[name=amphur_id]").live("change",function(){
		//$("<img class='loading' src='themes/bo/images/loading.gif' style='vertical-align:middle;'>").appendTo(".loadingicon");
		$.post('nurseries/get_district',{
				'amphur_id' : $(this).val()
			},function(data){
				$("#district").html(data);	
				//$('.loading').remove();
			});
	});
});
</script>

	<div class="topic"><img src="themes/gcdnew/images/topic_child.png" width="200" height="25" /></div>
    <div id="data">
    	<div style="font-size:14px; font-weight:700; padding-bottom:10px; color:#3C3">สมัครเข้าร่วมโครงการศูนย์เด็กเล็กปลอดโรค</div>
    	
    	<form method="get" action="nurseries/register">
	    	<div style="padding:10px; border:1px solid #ccc; margin-bottom:10px;">ชื่อ <input name="name" type="text" value="<?=$_GET['name']?>" style="width:280px;" />
			<?php if($user->nursery == 0):?>
           		<?php echo form_dropdown('province_id',get_option('id','name','provinces'),$nursery->province_id,'','--- เลือกจังหวัด ---') ?>
           	<?php else:?>
           		<?php echo form_dropdown('province_id',get_option('id','name','provinces','where nursery = '.$user->nursery.' order by name asc'),$nursery->province_id,'','--- เลือกจังหวัด ---') ?>
           	<?php endif;?>
	    	  <span id="amphur"><?=form_dropdown('amphur_id',get_option('id','amphur_name','amphures','where province_id in (select id from provinces where nursery = '.$user->nursery.') order by amphur_name asc'),$_GET['amphur_id'],'','--- เลือกอำเภอ ---');?></span>
	    	  <span id="district"><?=form_dropdown('district_id',get_option('id','district_name','districts','where province_id in (select id from provinces where nursery = '.$user->nursery.') order by district_name asc'),$_GET['district_id'],'','--- เลือกตำบล ---');?></span>
	    	  <?=form_dropdown('year',array('2554'=>'2554','2555'=>'2555'),$_GET['year'],'','--- เลือกปี ---');?>
	  	      <input type="submit" value=" ค้นหา ">
	    	</div>
    	</form>
        
        <?php if(login_data('nursery') == 0):?>
        <div style="float:right; padding:10px 0;">
        	<a href="nurseries/category_form" class="btn">คำนำหน้า</a>
        	<a href="nurseries/report2" target="_blank" class="btn">รายงาน</a>
        </div>
        <?php endif;?>
        <div style="float:right; padding:10px 0;"><a href="nurseries/register_form" class="btn">เพิ่มศูนย์เด็กเล็ก</a></div>
    	<table class="tbchild">
        <tr>
        <th>ลำดับ</th>
        <th>ชื่อศุนย์พัฒนาเด็กเล็ก</th>
        <th>แบบฟอร์ม</th>
        <th>ปีที่เข้าร่วม</th>
        <th width="100">จัดการ</th>
        </tr>
        <?php $i=(@$_GET['page'] > 1)? (((@$_GET['page'])* 20)-20)+1:1;?>
        <?php foreach($nurseries as $key=>$nursery):?>
        	<tr>
	        <td><?=$i?></td>
	        <td><?=$nursery->name?></td>
	        <td>
	        	<?php if($nursery->name != "" and $nursery->number != "" and $nursery->moo != "" and $nursery->province_id != "" and $nursery->amphur_id != "" and $nursery->district_id != "" and $nursery->code != "" and $nursery->p_title != "" and $nursery->p_name != "" and $nursery->p_surname != "" and $nursery->p_tel != "" and $nursery->p_email != "" and $nursery->area_id != 0 and $nursery->nursery_category_id != 0):?>
	        		<img src="themes/gcdnew/images/okk.png" width="16" height="16" class="vtip" title="เข้าร่วมโครงการ"/>
	        	<?php endif;?>
	        </td>
	        <td><?=$nursery->year?></td>
	        <td>
	        	<a href="nurseries/register_form/<?=$nursery->id?>" class='btn'>แก้ไข</a>
	        	<a href="nurseries/delete/<?=$nursery->id?>" class="btn" onclick="return(confirm('ยืนยันการลบข้อมูล'))">ลบ</a>
	        </td>
	        </tr>
	        <?php $i++;?>
		<?php endforeach;?>
        </table>
        <?=$nurseries->pagination();?>
	</div>