<div class="topic"><img src="<?php echo topic("topic_board.png") ?>" height="25" width="200"></div>
	<div id="data">
		<div id="navi"><a href="webboards" class="link_prev B">เว็บบอร์ด</a> &gt; <?php echo lang_decode($category->name,'th')?></div>
		<div class="left" style="padding-top: 10px;"><?php echo $webboard_quizs->pagination()?></div>
		<div class="addtopic right"><a href="webboards/newtopic/<?echo $category_id?>/normal"><img src="themes/gcdnew/images/btn_newpost.png" height="29" width="102"></a><a href="webboards/newtopic/<?echo $category_id?>/vote"><img src="themes/gcdnew/images/btn_newvote.png" height="29" width="107"></a></div>
		<table class="tbwebboard clear">
			<tbody>
				<tr style="background: url(&quot;images/bg_topboard.gif&quot;) repeat-x scroll 0% 0% transparent;">
					<th width="4%"><img src="themes/gcdnew/images/ico_pin.png" alt="กระทู้ปักหมุด" title="กระทู้ปักหมุด"></th>
					<th width="63%">กระทู้</th>
					<th width="6%">อ่าน</th>
					<th width="6%">ตอบ</th>
					<th width="15%">ความคิดเห็นล่าสุด</th>
				</tr>
				
				
				<?php foreach($webboard_quizs_stick as $webboard_quiz): ?>
				<tr>
					<td>
						<?php if($webboard_quiz->group_id != 0):?>
						<img src="themes/gcdnew/images/ico_lock.png" alt="กระทู้เฉพาะกลุ่ม" title="<?php echo lang_decode($webboard_quiz->group->name,'th')?>" height="24" width="24">
						<?php else:?>
							<?php if($webboard_quiz->webboard_answer->result_count() > 15):?>
								<img src="themes/gcdnew/images/ico_hit.png" alt="กระทู้น่าสนใจ" title="กระทู้น่าสนใจ">
							<?php else:?>
								<?php if($webboard_quiz->type == "normal"):?>
								<img src="themes/gcdnew/images/ico_regular.png" alt="กระทู้ปกติ" title="กระทู้ปกติ" height="24" width="24">
								<?php elseif($webboard_quiz->type == "vote"):?>
								<img src="themes/gcdnew/images/ico_pollboard.png" alt="โพล" title="โพล" height="24" width="24">
								<?php endif;?>
							<?php endif;?>
						<?php endif;?>
					</td>
					<td>
						<a href="webboards/view_topic/<?php echo $webboard_quiz->id?>" class="topicpost"><?php echo $webboard_quiz->title?></a><br>
โดย <a href="users/profile/<?php echo $webboard_quiz->user->id?>" class="name"><?php echo $webboard_quiz->user->display ?></a><img src="themes/gcdnew/images/ico_time.png" style="margin-bottom: -2px;" height="12" width="12"> <span class="f10"><?php echo mysql_to_th($webboard_quiz->created,'S',TRUE) ?> <?php if($webboard_quiz->group_id != 0):?>(<?php echo lang_decode($webboard_quiz->group->name,'th')?>)<?php endif;?></span>

						<?php if (is_login('Administrator')):?>
						<div id="admin_action">
							<?php if($webboard_quiz->stick == 0):?>
							<a href="webboards/stick_thread/<?php echo $webboard_quiz->id?>">ปักหมุด</a> | 
							<?php else:?>
							<a href="webboards/unstick_thread/<?php echo $webboard_quiz->id?>">ยกเลิกปักหมุด</a> | 
							<?php endif;?>
							<a href="webboards/newtopic/<?php echo $category_id?>/<?php echo $webboard_quiz->type ?>/<?php echo $webboard_quiz->id?>">แก้ไข</a> | 
							<a rel="lightbox" href="webboards/topic_move_category/<?php echo $webboard_quiz->id?>?iframe=true&width=410&height=120">ย้าย</a> | 
							<a href="webboards/delete_topic/<?php echo $webboard_quiz->id?>" onclick="return confirm('ต้องการลบกระทู้นี้?')">ลบ</a>
						</div>
						<?php endif;?>
					</td>
					<td><?php echo $webboard_quiz->counter ?></td>
					<td><?php echo $webboard_quiz->webboard_answer->result_count()?></td>
					<td><span class="f10"><?php echo mysql_to_th($webboard_quiz->webboard_answer->order_by("id", "desc")->limit(1)->get()->created,'S',TRUE)?></span><br>โดย <a href="users/profile/<?php echo $webboard_quiz->webboard_answer->user->id?>" class="name"><?php echo $webboard_quiz->webboard_answer->user->display?></a></td>
				</tr>
				<?php endforeach;?>
				
				<tr style="background: #eee;">
					<td width="4%"></td>
					<td width="63%">ชื่อกระทู้</td>
					<td width="6%">อ่าน</td>
					<td width="6%">ตอบ</td>
					<td width="15%">ความคิดเห็นล่าสุด</td>
				</tr>
				
				<?php foreach($webboard_quizs as $webboard_quiz): ?>
				<tr>
					<td>
						<?php if($webboard_quiz->group_id != 0):?>
						<img src="themes/gcdnew/images/ico_lock.png" alt="กระทู้เฉพาะกลุ่ม" title="<?php echo lang_decode($webboard_quiz->group->name,'th')?>" height="24" width="24">
						<?php else:?>
						
							<?php if($webboard_quiz->webboard_answer->result_count() > 15):?>
								<img src="themes/gcdnew/images/ico_hit.png" alt="กระทู้น่าสนใจ" title="กระทู้น่าสนใจ">
							<?php else:?>
								<?php if($webboard_quiz->type == "normal"):?>
								<img src="themes/gcdnew/images/ico_regular.png" alt="กระทู้ปกติ" title="กระทู้ปกติ" height="24" width="24">
								<?php elseif($webboard_quiz->type == "vote"):?>
								<img src="themes/gcdnew/images/ico_pollboard.png" alt="โพล" title="โพล" height="24" width="24">
								<?php endif;?>
							<?php endif;?>
						<?php endif;?>
					</td>
					<td>
						<a href="webboards/view_topic/<?php echo $webboard_quiz->id?>" class="topicpost"><?php echo $webboard_quiz->title?></a><br>
โดย <a href="users/profile/<?php echo $webboard_quiz->user->id?>" class="name"><?php echo $webboard_quiz->user->display ?></a><img src="themes/gcdnew/images/ico_time.png" style="margin-bottom: -2px;" height="12" width="12"> <span class="f10"><?php echo mysql_to_th($webboard_quiz->created,'S',TRUE) ?> <?php if($webboard_quiz->group_id != 0):?>(<?php echo lang_decode($webboard_quiz->group->name,'th')?>)<?php endif;?>
</span>

						<?php if (is_login('Administrator')):?>
						<div id="admin_action">
							<?php if($webboard_quiz->stick == 0):?>
							<a href="webboards/stick_thread/<?php echo $webboard_quiz->id?>">ปักหมุด</a> | 
							<?php else:?>
							<a href="webboards/unstick_thread/<?php echo $webboard_quiz->id?>">ยกเลิกปักหมุด</a> | 
							<?php endif;?>
							<a href="webboards/newtopic/<?php echo $category_id?>/<?php echo $webboard_quiz->type ?>/<?php echo $webboard_quiz->id?>">แก้ไข</a> | 
							<a rel="lightbox" href="webboards/topic_move_category/<?php echo $webboard_quiz->id?>?iframe=true&width=410&height=120">ย้าย</a> | 
							<a href="webboards/delete_topic/<?php echo $webboard_quiz->id?>" onclick="return confirm('ต้องการลบกระทู้นี้?')">ลบ</a>
						</div>
						<?php endif;?>
					</td>
					<td><?php echo $webboard_quiz->counter ?></td>
					<td><?php echo $webboard_quiz->webboard_answer->result_count()?></td>
					<td><span class="f10"><?php echo mysql_to_th($webboard_quiz->webboard_answer->order_by("id", "desc")->limit(1)->get()->created,'S',TRUE)?></span><br>โดย <a href="users/profile/<?php echo $webboard_quiz->webboard_answer->user->id?>" class="name"><?php echo $webboard_quiz->webboard_answer->user->display?></a></td>
				</tr>
				<?php endforeach;?>
				
				
				</tbody></table>
			<div style="padding-top: 5px;"><?php echo $webboard_quizs->pagination()?></div>
		<div id="explain"><img src="themes/gcdnew/images/ico_regular.png" alt="กระทู้ปกติ" title="กระทู้ปกติ" height="24" width="24">กระทู้ปกติ<img src="themes/gcdnew/images/ico_hit.png" alt="กระทู้น่าสนใจ" title="กระทู้น่าสนใจ">กระทู้น่าสนใจ<img src="themes/gcdnew/images/ico_pin.png" alt="กระทู้ปักหมุด" title="กระทู้ปักหมุด" height="24" width="24">กระทู้ปักหมุด<img src="themes/gcdnew/images/ico_pollboard.png" alt="โพลล์" title="โพลล์" height="24" width="24">โพล<img src="themes/gcdnew/images/ico_lock.png" alt="กระทู้เฉพาะกลุ่ม" title="กระทู้เฉพาะกลุ่ม" height="24" width="24">กระทู้เฉพาะกลุ่ม</div>
	</div>
<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="shadow"></div>