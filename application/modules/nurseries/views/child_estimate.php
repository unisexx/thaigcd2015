<script type="text/javascript">
$(document).ready(function(){
	$('input[type="checkbox"][name="status"]').change(function() {
	     if(this.checked) {
			$.post('nurseries/save_status',{
				'id' : $(this).next().val(),
				'status' : 1
			});
	     }else{
	     	$.post('nurseries/save_status',{
				'id' : $(this).next().val(),
				'status' : 0
			});
	     }
	});
	
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
    	<div style="font-size:14px; font-weight:700; padding-bottom:10px; color:#3C3">ส่งผลการประเมินโครงการศูนย์เด็กเล็กปลอดโรค</div>
    	
    <form method="get" action="nurseries/estimate">
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
    	
	<table class="tbchild">
        <tr>
        <th>ลำดับ</th>
        <th>ชื่อศุนย์พัฒนาเด็กเล็ก</th>
        <th>ประเมิน</th>
        <th>ปีที่เข้าร่วม</th>
        </tr>
        <?php $i=(@$_GET['page'] > 1)? (((@$_GET['page'])* 20)-20)+1:1;?>
        <?php foreach($nurseries as $key=>$nursery):?>
        	<tr>
	        <td><?=$i?></td>
	        <td><?=$nursery->name?></td>
	        <td>
	        	<input type="checkbox" name="status" value="<?=$nursery->status?>" <?=($nursery->status == 1)?"checked='checked'":"";?>>
	        	<input type="hidden" name="id" value="<?=$nursery->id?>">
	        </td>
	        <td><?=$nursery->year?></td>
	        </tr>
	        <?php $i++;?>
		<?php endforeach;?>
	</table>
	<?=$nurseries->pagination();?>
	</div>