<div class="corner" id="boxnotify-page">
<div class="topic"><img height="25" width="200" src="<?php echo topic("topic_notice.png") ?>"></div>
<div id="data">
<div class="box-notify-detail">
<h3><?php echo lang_decode($notice->title) ?></h3>
<strong class="TxtGray2">ประกาศ ณ วันที่ <?php echo mysql_to_th($notice->start_date,'F') ?></strong> 
<img src="themes/gcdnew/images/<?php echo $type[$notice->category->id] ?>" width="82" height="16"><br><br>
<?php echo lang_decode($notice->detail) ?>
<div id="observe">
	<table class="tbnotify">
	<tbody>
		<tr><th colspan="2">ร่วมสังเกตการณ์เปิดซองสอบราคา</th></tr>
		<tr><td width="24%"><strong>ยื่นซองสอบราคา :</strong></td><td width="76%"><?php echo mysql_to_th($notice->start_notice,'F') ?> - <?php echo mysql_to_th($notice->end_notice,'F') ?></td></tr>
        <tr><td><strong>วันเปิดซอง :</strong></td><td><?php echo mysql_to_th($notice->open_date,'F') ?></td></tr>
        <tr><td><strong>ร่วมสังเกตการณ์ :</strong></td><td><?php echo mysql_to_th($notice->observe_date,'F') ?></td></tr>
        <tr>
                              <td><strong>สถานที่ :</strong></td>
                              <td><?php echo $notice->place ?></td>
                            </tr>
                            <tr>
                              <td><strong>หน่วยงาน : </strong></td>
                              <td><?php echo $notice->dept ?></td>
                            </tr>
                            <tr>
                              <td><strong>โทรศัพท์ :</strong></td>
                              <td><?php echo $notice->phone ?></td>
                            </tr>
                            <tr>
                            <td><strong>โทรสาร  :</strong></td>
                            <td><?php echo $notice->fax ?></td>
                            </tr>
                            </tbody></table>
                        </div><!--observe-->
						<?php if($notice->category->id=="7"): ?>
                       <div id="offer">
                       	<form method="post">
                      <table class="tbnotify">
                        <tbody><tr>
                          <th colspan="2">แบบฟอร์มเสนอแนะวิจารณ์</th>
                          </tr>
                        <tr>
                        <td width="20%"><strong>ชื่อ - สกุล</strong></td>
                        <td width="80%"><input type="text" class="textboxNotifyOffer" id="textfield" name="name" style="background-image:none!important;width: 100%!important;height: 34px!important;"></td>
                        </tr>
                        <tr>
                        <td><strong>บริษัท</strong></td>
                        <td><input type="text" class="textboxNotifyOffer" id="textfield2" name="company"></td>
                        </tr>
                        <tr>
                        <td><strong>หัวเรื่อง</strong></td>
                        <td><input type="text" class="textboxNotifyOffer" id="textfield3" name="title"></td>
                        </tr>
                        <tr>
                        <td valign="top"><strong>เนื้อหาเสนอแนะ</strong></td>
                        <td><textarea class="textboxNotifyOffer" id="textfield4" rows="6" name="comment"></textarea></td>
                        </tr>
                        <tr>
                        <td><strong>อีเมล์</strong></td>
                        <td><input type="text" class="textboxNotifyOffer" id="textfield5" name="email"></td>
                        </tr>
                        <tr>
                          <td><strong>เบอร์ติดต่อ</strong></td>
                          <td><input type="text" class="textboxNotifyOffer" id="textfield6" name="telephone"></td>
                        </tr>
                        <tr>
                        <td style="border: 0pt none;">&nbsp;</td>
                        <td style="border: 0pt none;"><input type="submit" value="ส่งข้อมูล" id="button2" /></td>
                        </tr>
                        </tbody></table>
						</form>
             			</div><!--offer-->
			 			<?php endif; ?>
                        <div id="notify-download">
                        <div><span class="f14 B TxtPurple">ดาวน์โหลดเอกสารเสนอราคา</span></div>
                        <ul>
                        	<?php for($i=1;$i<=5;$i++): ?>
							<?php if(($notice->{'file_src'.$i})&&($notice->{'file_name'.$i})): ?>
                            <li><a href="<?php echo $notice->{'file_src'.$i} ?>"><?php echo $notice->{'file_name'.$i} ?></a></li>
							<?php endif; ?>
							<?php endfor; ?>
                            </ul>
                        </div>
                    
              </div><!--box-notify-detail-->
			  
</div><!--data-->
           </div>