<div class="topic"><img src="<?php echo topic("topic_board.png") ?>" height="25" width="200"></div>
	<div id="data">
		<table class="tbwebboard">
			<tbody>
				<?php foreach($categories as $category): ?>
				 <tr>
                  <td width="5%"><img src="themes/gcdnew/images/ico_folder.png" height="32" width="32"></td>
                  <td width="68%"><a href="webboards/category/<?php echo $category->id?>" class="topicpost"><?php echo lang_decode($category->name,'th')?></a><br><?php echo $category->description;?></td>
                  <td width="9%"><?php echo $category->webboard_quiz->result_count()?> กระทู้<br><?php echo $category->webboard_answer->result_count() ?> ตอบ</td>
                  <td width="18%">กระทู้ล่าสุด <br><span class="f10"><?php echo mysql_to_th($category->webboard_quiz->order_by("id", "desc")->limit(1)->get()->created,'S',TRUE)?></span><br>โดย <a href="users/profile/<?php echo $category->webboard_quiz->user->id?>" class="name"><?php echo $category->webboard_quiz->user->display?></a></td>
                </tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="shadow"></div>