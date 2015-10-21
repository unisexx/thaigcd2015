<script type="text/javascript" src="themes/gcdnew/js/jquery.validate.min.js"></script>
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
	
	$("#frmnursery").validate({
	rules: 
	{
		name: 
		{ 
			required: true
			//remote: "nurseries/check_name"
		},
		area_id: 
		{ 
			required: true
		},
		nursery_category_id: 
		{ 
			required: true
		},
		number: 
		{ 
			required: true
		},
		moo:
		{
			required: true
		},
		province_id:
		{
			required: true
		},
		amphur_id:
		{
			required: true
		},
		district_id:
		{
			required: true
		},
		code:
		{
			required: true
		},
		p_title:
		{
			required: true
		},
		p_name:
		{
			required: true
		},
		p_surname:
		{
			required: true
		},
		p_tel:
		{
			required: true
		},
		p_email:
		{
			required: true
		},
	},
	messages:
	{
		name:
		{
			required: "กรุณากรอกชื่อค่ะ"
			//remote: "ชื่อศูนย์เด็กเล็กนี้มีแล้วค่ะ"
		},
		area_id:
		{
			required: "กรุณาเลือกสคร.ค่ะ"
		},
		nursery_category_id:
		{
			required: "กรุณาเลือกคำนำหน้าค่ะ"
		},
		number:
		{
			required: "กรุณากรอกนามสกุลค่ะ"
		},
		moo:
		{
			required: "กรุณากรอกวันเกิดค่ะ"
		},
		province_id:
		{
			required: "กรุณากรอกจังหวัดค่ะ"
		},
		amphur_id:
		{
			required: "กรุณากรอกอำเภอค่ะ"
		},
		district_id:
		{
			required: "กรุณากรอกตำบลค่ะ"
		},
		code:
		{
			required: "กรุณากรอกรหัสไปรษณีย์ค่ะ"
		},
		p_title:
		{
			required: "กรุณากรอกคำนำหน้าค่ะ"
		},
		p_name:
		{
			required: "กรุณากรอกชื่อค่ะ"
		},
		p_surname:
		{
			required: "กรุณากรอกนามสกุลค่ะ"
		},
		p_tel:
		{
			required: "กรุณากรอกโทรศัพท์ค่ะ"
		},
		p_email:
		{
			required: "กรุณากรอกอีเมล์ค่ะ"
		}
	}
	});
});
</script>
<form id="frmnursery" method="post" action="nurseries/register_save/<?=$nursery->id?>">

    	<div class="topic"><img src="themes/gcdnew/images/topic_child.png" width="200" height="25" /></div>
        <div id="data">
        	<div style="font-size:14px; font-weight:700; padding-bottom:10px; color:#3C3">สมัครเข้าร่วมโครงการศูนย์เด็กเล็กปลอดโรค</div>
    <!--search-->
    	<fieldset style="border:1px dashed #ccc; padding:10px; margin-bottom:10px;">
        <legend style="padding:0 5px; font-size:14px; font-weight:700; color:#666;">ข้อมูลศูนย์เด็กเล็ก</legend>
        	<table class="tbchildform">
        		<tr>
        			<th>สคร.<strong> <span class="TxtRed">*</span></strong></th>
        			<td>
        				<?php if(login_data('nursery') == 0):?>
				        	<?=form_dropdown('area_id',array('1'=>'สคร.1','2'=>'สคร.2','3'=>'สคร.3','4'=>'สคร.4','5'=>'สคร.5','6'=>'สคร.6','7'=>'สคร.7','8'=>'สคร.8','9'=>'สคร.9','10'=>'สคร.10','11'=>'สคร.11','12'=>'สคร.12'),$nursery->area_id,'','--- เลือก ---');?>
				        <?php else:?>
				        	<input type="text" value="<?=login_data('nursery')?>" disabled>
				        	<input type="hidden" name="area_id" value="<?=login_data('nursery')?>">
				        <?php endif;?>
        			</td>
        		</tr>
				<tr>
                   <th>ปีที่เข้าร่วมโครงการ<strong> <span class="TxtRed">*</span></strong></th>
                   <td><?=form_dropdown('year',array('2554'=>'2554','2555'=>'2555'),$nursery->year)?></td>
                 </tr>
                 <tr>
                 	<th>คำนำหน้า<strong> <span class="TxtRed">*</span></strong></th>
                 	<td><?php echo  form_dropdown('nursery_category_id',get_option('id','title','nursery_categories'),$nursery->nursery_category_id,'','--- เลือกประเภท ---')?></td>
                 </tr>
        	    <tr>
        	      <th>ชื่อศูนย์เด็กเล็ก<strong> <span class="TxtRed">*</span></strong></th>
        	      <td><input type="text" name="name" value="<?=$nursery->name?>" id="textfield"  style="width:350px;"/></td>
        	 	</tr>
                 <tr>
        	      <th>เลขที่<strong> <span class="TxtRed">*</span></strong></th>
        	      <td><input type="text" name="number" value="<?=$nursery->number?>" id="textfield2" style="width:50px;" /></td>
        	 	</tr>
                 <tr>
                   <th>หมู่<strong> <span class="TxtRed">*</span></strong></th>
                   <td><input type="text" name="moo" value="<?=$nursery->moo?>" id="textfield3" /></td>
                 </tr>
                 <tr>
                   <th>จังหวัด<strong> <span class="TxtRed">*</span></strong></th>
                   <td>
                   	<?php if($user->nursery == 0):?>
                   		<?php echo form_dropdown('province_id',get_option('id','name','provinces'),$nursery->province_id,'','--- เลือกจังหวัด ---') ?>
                   	<?php else:?>
                   		<?php echo form_dropdown('province_id',get_option('id','name','provinces','where nursery = '.$user->nursery.' order by name asc'),$nursery->province_id,'','--- เลือกจังหวัด ---') ?>
                   	<?php endif;?>
					</td>
                 </tr>
                 <tr>
                   <th>อำเภอ<strong> <span class="TxtRed">*</span></strong></th>
                   <td id="amphur">
                   	<?php if($nursery->province_id):?>
                   		<?=form_dropdown('amphur_id',get_option('id','amphur_name','amphures','where province_id = '.$nursery->province_id.' order by id asc'),$nursery->amphur_id,'','--- เลือกอำเภอ ---');?>
                   	<?php endif;?></td>
                 </tr>
                 <tr>
                   <th>ตำบล<strong> <span class="TxtRed">*</span></strong></th>
                   <td id="district">
                   	<?php if($nursery->province_id):?><?=form_dropdown('district_id',get_option('id','district_name','districts','where amphur_id = '.$nursery->amphur_id.' order by id asc'),$nursery->district_id,'','--- เลือกตำบล ---');?>
                   	<?php endif;?>
                   	</td>
                 </tr>
                 <tr>
                   <th>รหัสไปรษณีย์<strong> <span class="TxtRed">*</span></strong></th>
                   <td><input name="code" type="text" value="<?=$nursery->code?>" id="textfield4" size="10" /></td>
                 </tr>
                 <tr>
                 	<th>สังกัด</th>
                 	<td>
                 		<input type="radio" name="under" value="อบต." <?=($nursery->under == 'อบต.')?"checked=checked":""?>> อบต.
                 		<input type="radio" name="under" value="เทศบาล" <?=($nursery->under == 'เทศบาล')?"checked=checked":""?>> เทศบาล
                 		<input type="radio" name="under" value="เอกชน" <?=($nursery->under == 'เอกชน')?"checked=checked":""?>> เอกชน
                 		<input type="radio" name="under" value="อื่นๆ" <?=($nursery->under == 'อื่นๆ')?"checked=checked":""?>> อื่นๆ
                 		<input type="input" name="under_other" value="<?=$nursery->under_other?>">
                 	</td>
                 </tr>
      	    </table>
          </fieldset>
            
            
            <fieldset style="border:1px dashed #ccc; padding:10px;">
        <legend style="padding:0 5px; font-size:14px; font-weight:700; color:#666;">หัวหน้าศูนย์เด็กเล็ก</legend>
        <table class="tbchildform">
   	    <tr>
        	      <th>คำนำหน้า<strong> <span class="TxtRed">*</span></strong></th>
        	      <td><?php echo form_dropdown('p_title',array('นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว'),$nursery->p_title,'','--- เลือกคำนำหน้า ---');?></td>
       	 	  </tr>
                 <tr>
        	      <th>ชื่อ<strong> <span class="TxtRed">*</span></strong></th>
        	      <td><input type="text" name="p_name" value="<?=$nursery->p_name?>" id="textfield9"  style="width:250px;"/></td>
        	 	</tr>
                 <tr>
                   <th>นามสกุล<strong> <span class="TxtRed">*</span></strong></th>
                   <td><input type="text" name="p_surname" value="<?=$nursery->p_surname?>" id="textfield6"  style="width:250px;"/></td>
                 </tr>
                 <tr>
                   <th>โทรศัพท์<strong> <span class="TxtRed">*</span></strong></th>
                   <td><input type="text" name="p_tel" value="<?=$nursery->p_tel?>" id="textfield7" /></td>
                 </tr>
                 <tr>
                   <th>อีเมล์<strong> <span class="TxtRed">*</span></strong></th>
                   <td><input type="text" name="p_email" value="<?=$nursery->p_email?>" id="textfield8" style="width:200px;" /></td>
                 </tr>
      	    </table>
          </fieldset>
          <div style="margin-left:25%; padding-top:10px;"><input type="submit" value=" ลงทะเบียน " /></div>
    </div>
</form>