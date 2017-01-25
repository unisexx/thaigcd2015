<!--
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/styles.css">		
	    <script src="assets/js/jquery-1.11.2.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
-->
		<!-- Page Content -->
		<div class="container-fluid">
		
			<div class="row">
			
				<div class="col-sm-12">

					<!-- Page breadcrumb -->
					<ol class="breadcrumb">
						<li><a href="home/index">หน้าแรก</a></li>
						<li><a href="notices/index_type">ข่าว</a></li>
						<li class="active">ข่าวจัดซื้อ-จัดจ้าง</li>
					</ol>

					<h1><img src="themes/thaigcd2015/images/topic_notice.png"></h1>
					<hr>

					<h3 style="font-weight: blod; color:#21358b;">
					
					<?php echo lang_decode($notice->title); ?>
						
					</h3>

					
					<hr>


					<!-- Alignment classes -->
					<h3>
					
					ประกาศ ณ วันที่ <?php echo mysql_to_th($notice->start_date,'S',TRUE); ?>
					
					<?php
					
						if($notice->category_id==7){
							echo '<img src="themes/thaigcd2015/images/ico_notify_03.png">';
						}elseif($notice->category_id==8){
							echo '<img src="themes/thaigcd2015/images/ico_notify_06.png">';
						}elseif($notice->category_id==9){
							echo '<img src="themes/thaigcd2015/images/ico_notify_08.png">';
						}
					
					?>
					 	
					 	
					 </h3>

					<p class="text-left"><?php echo lang_decode($notice->detail); ?></p>
					<hr>

					<!-- Tables -->
					<h3 style="font-weight: blod; color:#fbb42b;">ร่วมสังเกตการณ์เปิดซองสอบราคา</h3>
					<!--<p>ร่วมสังเกตการณ์เปิดซองสอบราคา</p>-->
					<table class="table table-striped">

						<tbody>
							<tr>
								
								<td style="width: 25%;">ยื่นซองสอบราคา :</td>
								<td><?php echo mysql_to_th($notice->start_date,'S',TRUE); ?></td>
								
							</tr>
							<tr>
								
								<td>วันเปิดซอง :</td>
								<td><?php echo mysql_to_th($notice->open_date,'S',TRUE); ?></td>
								
							</tr>
							<tr>
								
								<td>ร่วมสังเกตการณ์ :</td>
								<td></td>
								
							</tr>
							<tr>
								
								<td>สถานที่ :</td>
								<td><?php echo $notice->place; ?></td>
								
							</tr>
							<tr>
								
								<td>หน่วยงาน :</td>
								<td><?php echo $notice->dept; ?></td>
								
							</tr>
							<tr>
								
								<td>โทรศัพท์ :</td>
								<td><?php echo $notice->phone; ?></td>
								
							</tr>
							<tr>
								
								<td>โทรสาร :</td>
								<td><?php echo $notice->fax; ?></td>
								
							</tr>
						</tbody>
					</table>
					<hr>

					<?php if($notice->category_id==7){ ?>
					
					<!-- Forms -->
					<h3 style="font-weight: blod; color:#fbb42b;">แบบฟอร์มเสนอแนะวิจารณ์</h3>
					<div class="well">
						<form method="post" action="notices/save/<?php echo $notice->id; ?>">
							<div class="form-group">
								<label for="contactName">ชื่อ - สกุล</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ - สกุล" style="margin-top:0px!important;background-image:none!important;width: 100%!important;height: 34px!important;">
							</div>
							<div class="form-group">
								<label for="contactAddress">บริษัท</label>
								<input type="text" class="form-control" id="company" name="company" placeholder="บริษัท">
							</div>
							<div class="form-group">
								<label for="contactEmail">หัวเรื่อง</label>
								<input type="email" class="form-control" id="title" name="title" placeholder="หัวเรื่อง">
							
							</div>
							<div class="form-group">
								<label for="contactEmail">เนื้อหาเสนอแนะ</label>
								<input type="email" class="form-control" id="comment" name="comment" placeholder="เนื้อหาเสนอแนะ">
							
							</div>
							<div class="form-group">
								<label for="contactEmail">อีเมล์</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="อีเมล์">
							
							</div>
							<div class="form-group">
								<label for="contactEmail">เบอร์ติดต่อ</label>
								<input type="email" class="form-control" id="telephone" name="telephone" placeholder="เบอร์ติดต่อ">
							
							</div>
							
							
							<button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
						</form>
					</div>
					
					<?php } ?>
					
					<hr>

					<label for="contactEmail">ดาวน์โหลดเอกสารเสนอราคา</label>
					
					<div style="border:1px solid #fff;-webkit-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);-moz-box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.3);">
						
						<ul>
						
<!--							<li><a href="<?php echo $notice->file_src1; ?>"><?php echo $notice->file_name1; ?></a></li>-->

                        	<?php for($i=1;$i<=5;$i++): ?>
                        	
								<?php if(($notice->{'file_src'.$i})&&($notice->{'file_name'.$i})): ?>
								
	                            	<li><a href="<?php echo $notice->{'file_src'.$i} ?>"><?php echo $notice->{'file_name'.$i} ?></a></li>
	                            
								<?php endif; ?>
							
							<?php endfor; ?>
							
						</ul>	
					
					</div>
					
					<hr>


					

				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->		
