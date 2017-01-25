<h1><a href="galleries/admin/categories">ภาพถ่ายกิจกรรม</a> » <a href="galleries/admin/galleries/index/<?php echo $categories->id ?>"><?php echo lang_decode($categories->name,'')?></a></h1>
<form action="galleries/admin/galleries/save/<?php echo $categories->id?>/<?php echo $galleries->id ?>" method="post" enctype="multipart/form-data" id="gallery_form">
<table class="form">
	<?php if(is_file('uploads/galleries/'.$galleries->image)): ?>
		
        <tr>
			<th></th>
			<td><img src="uploads/galleries/<?php echo $galleries->image?>" />
			</td>
		</tr>
        <tr>
            <th>รูปภาพ :</th>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <th>ชื่อภาพ :</th>
            <td><input type="text" name="title" value="<?php echo $galleries->title?>"></td>
        </tr>        
        
	<?php endif; ?>

    
    <tr>
		<th> </th>
		<td>
        						<?php 
								
/*								foreach($rs_img as $row):
							
							
								 if($row->title):
				                	
				                	echo "ชื่อภาพ:".$row->title; */
									
								?>&nbsp; &nbsp;
                                    
<!--				                	<img src="uploads/galleries/<?php echo $row->image?>" width="95">
                                    
									<a class="red" href="galleries/admin/galleries/delete_imageupload/<?php echo $row->id; ?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">
                                    
										
                                        [x]ลบภาพ
                                        
									</a>
                                    
									<br />
									<br />-->
									
				                <?php 
								
/*								endif;
							
							 endforeach;*/
							 
							 ?>
                            <br><br>
 <?php if(!is_file('uploads/galleries/'.$galleries->image)): ?>                           
                            
        	<div class="upload">
                                          
            <div id="queue"></div>
                        
                                
            <input name="btnCreate" type="button" value="+เพิ่มภาพ" onClick="JavaScript:fncCreateElement();">
            <input name="btnDelete" type="button" value="-ลบภาพ" onClick="JavaScript:fncDeleteElement();"><br>	
            <div id="mySpan" style="padding:10px 10px 10px 10px;"></div>
            <input name="hdnLine" id="hdnLine" type="hidden" value="0">       					
                                
           </div>
                            
           <div id="show"></div>
           
<?php endif; ?>
							
		  <br><br>
          
        </td>
	</tr>
    
	<tr>
		<th>อัลบัม :</th>
		<td><input type="text" value="<?php echo lang_decode($categories->name,'')?>" disabled="true"><input type="hidden" name="category_id" value="<?php echo $categories->id?>"></td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"><!--<input type="button" name="back" value="ย้อนกลับ" onclick="window.location = 'galleries/admin/categories'" />--></td></tr>
</table>
</form>
<script type="text/javascript">

/*$(function() {
	
	$('#id-input-file-1 , #id-input-file-2').ace_file_input({
		no_file:'ไม่มีไฟล์แนบ...',
		btn_choose:'แนบไฟล์',
		btn_change:'เปลี่ยน',
		droppable:false,
		onchange:null,
		thumbnail:false 
	});
	

	
});*/


function fncCreateElement(){
	
	   var mySpan = document.getElementById('mySpan');
		
	   var myLine = document.getElementById('hdnLine');
	   myLine.value++;

	
	   
	   // Create input file
	   var myElement2 = document.createElement('input');
	   myElement2.setAttribute('type',"file");
	   myElement2.setAttribute('name',"image"+myLine.value);
	   myElement2.setAttribute('id',"image"+myLine.value);
	   myElement2.setAttribute('placeholder',"เลือกภาพ"+myLine.value);
	   
	   mySpan.appendChild(myElement2);
	   
	   var myElement3 = document.createElement('input');
	   myElement3.setAttribute('type',"text");
	   myElement3.setAttribute('name',"title"+myLine.value);
	   myElement3.setAttribute('id',"title"+myLine.value);
	   myElement3.setAttribute('placeholder',"ชื่อภาพ"+myLine.value)
	   myElement3.setAttribute('class',"input-xxlarge");
	   mySpan.appendChild(myElement3);
	   	
       // Create <br>
	   var myElement4 = document.createElement('br');
	   myElement4.setAttribute('name',"br"+myLine.value);
	   myElement4.setAttribute('id',"br"+myLine.value);
	   mySpan.appendChild(myElement4);

	}

	function fncDeleteElement(){

		var mySpan = document.getElementById('mySpan');

		var myLine = document.getElementById('hdnLine');
		
		if(myLine.value >= 1)
		{


			// Remove input file
			var deleteFile = document.getElementById("image"+myLine.value);
			mySpan.removeChild(deleteFile);

			// Remove input file
			var deleteFile2 = document.getElementById("title"+myLine.value);
			mySpan.removeChild(deleteFile2);
			
			// Remove <br>
			var deleteBr = document.getElementById("br"+myLine.value);
			mySpan.removeChild(deleteBr);

			myLine.value--;
		}
	}

</script>



