<?php
// --------------------------------------------------------------------
/**
 * Drop-down Menu
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	string
 * @param	string
 * @return	string
 */

	function form_dropdown($name = '', $options = array(), $selected = array(), $extra = '',$default_value = FALSE)
	{
		if ( ! is_array($selected))
		{
			$selected = array($selected);
		}

		// If no selected state was submitted we will attempt to set it automatically
		if (count($selected) === 0)
		{
			// If the form name appears in the $_POST array we have a winner!
			if (isset($_POST[$name]))
			{
				$selected = array($_POST[$name]);
			}
		}

		if ($extra != '') $extra = ' '.$extra;

		$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

		$form = '<select name="'.$name.'"'.$extra.$multiple.">\n";
		
		$form .= ($default_value) ? '<option value="">'.$default_value.'</option>\n' : '';

		foreach ($options as $key => $val)
		{
			$key = (string) $key;

			if (is_array($val))
			{
				$form .= '<optgroup label="'.$key.'">'."\n";
				
				
				
				foreach ($val as $optgroup_key => $optgroup_val)
				{
					$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';

					$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
				}

				$form .= '</optgroup>'."\n";
			}
			else
			{
				$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';

				$form .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
			}
		}

		$form .= '</select>';

		return $form;
	}

	function form_referer($name = 'referer')
	{
		return form_hidden($name,$_SERVER['HTTP_REFERER']);
	}
	function form_back($name = 'back')
	{
		return form_button($name,'ย้อนกลับ','onclick="window.location = \''.$_SERVER['HTTP_REFERER'].'\'"');
	}
	
	function question_form($question)
	{
		if($question->type=="text")
		{
?>
		<li class="box text">
			<div class="option">
				<a rel="bin" href="#"><span class="icon icon-bin"></span> <a rel="copy" href="#"><span class="icon icon-page-copy"></span></a>
			</div>
			<table width="100%">
				<tr><th>หัวข้อคำถาม</th><td><input type="text" name="question[]" class="full" value="<?php echo $question->question ?>" /></td></tr>
				<tr><th></th><td><input type="text" class="disable" value="คำตอบ" disabled="disabled" /></td></tr>
			</table>
			<input type="hidden" name="type[]" value="text" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
		if($question->type=="textarea")
		{
?>
		<li class="box textarea">
			<div class="option">
				<a rel="bin" href="#"><span class="icon icon-bin"></span> <a rel="copy" href="#"><span class="icon icon-page-copy"></span></a>
			</div>
			<table width="100%">
				<tr><th>หัวข้อคำถาม</th><td><input type="text" name="question[]" class="full" value="<?php echo $question->question ?>" /></td></tr>
				<tr><th></th><td><textarea class="disable" disabled="disabled" >คำตอบ</textarea></td></tr>
			</table>
			<input type="hidden" name="type[]" value="textarea" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
		if($question->type=="radio")
		{
?>
		<li class="box radio">
			<div class="option">
				<a rel="bin" href="#"><span class="icon icon-bin"></span> <a rel="copy" href="#"><span class="icon icon-page-copy"></span></a>
			</div>
			<table width="100%">
				<tr><th>หัวข้อคำถาม</th><td><input type="text" name="question[]" class="full" value="<?php echo $question->question ?>" /><input type="button" value="เพิ่มคำตอบ" name="add" /> <input type="checkbox" name="other" value="1" <?php echo ($question->other==1)?'checked="checked"':''?> /> อื่นๆ โปรดระบุ </td></td></tr>
				<?php foreach($question->choice->order_by('id','asc')->get() as $choice): ?>
				<tr>
					<th></th>
					<td>
						<input type="radio" name="radio[]" /> 
						<input type="text" class="half" name="choice" value="<?php echo $choice->name ?>" />
						 <a rel="del_choice" href="docs/delete_choice/<?php echo $choice->id ?>"><span class="icon icon-delete"></span></a>
						<input type="hidden" name="choice_id" value="<?php echo $choice->id ?>" />
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			<input type="hidden" name="type[]" value="radio" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
		if($question->type=="checkbox")
		{
?>
		<li class="box checkbox">
			<div class="option">
				<a rel="bin" href="#"><span class="icon icon-bin"></span> <a rel="copy" href="#"><span class="icon icon-page-copy"></span></a>
			</div>
			<table width="100%">
				<tr><th>หัวข้อคำถาม</th><td><input type="text" name="question[]" class="full" value="<?php echo $question->question ?>" /><input type="button" value="เพิ่มคำตอบ" name="add" /> <input type="checkbox" name="other" value="1" <?php echo ($question->other==1)?'checked="checked"':''?> /> อื่นๆ โปรดระบุ </td></tr>
				<?php foreach($question->choice->order_by('id','asc')->get() as $choice): ?>
				<tr>
					<th></th>
					<td>
						<input type="checkbox" name="checkbox[]" /> 
						<input type="text" class="half" name="choice" value="<?php echo $choice->name ?>" />
						 <a rel="del_choice" href="docs/delete_choice/<?php echo $choice->id ?>"><span class="icon icon-delete"></span></a>
						<input type="hidden" name="choice_id" value="<?php echo $choice->id ?>" />
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			<input type="hidden" name="type[]" value="checkbox" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
		if($question->type=="scale")
		{
			$optional = json_decode($question->optional,TRUE);
?>
		<li class="box scale">
			<div class="option">
				<a rel="bin" href="#"><span class="icon icon-bin"></span> <a rel="copy" href="#"><span class="icon icon-page-copy"></span></a>
			</div>
			<table width="100%">
				<tr><th>หัวข้อคำถาม</th><td><input type="text" name="question[]" class="full" value="<?php echo $question->question ?>" /></td></tr>
				<tr>
					<th>ระดับ</th>
					<td>
						<select name="min">
    						<option value="0" <?php echo ($question->min==0)?'selected="selected"':'' ?>>0</option>
    						<option value="1" <?php echo ($question->min==1)?'selected="selected"':'' ?>>1</option>
  						</select>
						ถึง
						<select name="max">
    						<option value="3" <?php echo ($question->max==3)?'selected="selected"':'' ?>>3</option>
							<option value="4" <?php echo ($question->max==4)?'selected="selected"':'' ?>>4</option>
    						<option value="5" <?php echo ($question->max==5)?'selected="selected"':'' ?>>5</option>
							<option value="6" <?php echo ($question->max==6)?'selected="selected"':'' ?>>6</option>
							<option value="7" <?php echo ($question->max==7)?'selected="selected"':'' ?>>7</option>
							<option value="8" <?php echo ($question->max==8)?'selected="selected"':'' ?>>8</option>
							<option value="9" <?php echo ($question->max==9)?'selected="selected"':'' ?>>9</option>
							<option value="10" <?php echo ($question->max==10)?'selected="selected"':'' ?>>10</option>
  						</select>
					</td>
				</tr>
				<tr><th></th><td><span><?php echo $question->min ?></span> : <input type="text" class="half" name="optional" value="<?php echo $optional[0] ?>" /></td></tr>
				<tr><th></th><td><span><?php echo $question->max ?></span> : <input type="text" class="half" name="optional" value="<?php echo $optional[1] ?>" /></td></tr>
			</table>
			<input type="hidden" name="type[]" value="scale" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
		if($question->type=="grid")
		{
			$optional = json_decode($question->optional,TRUE);
?>
		<li class="box grid">
			<div class="option">
				<a rel="bin" href="#"><span class="icon icon-bin"></span> <a rel="copy" href="#"><span class="icon icon-page-copy"></span></a>
			</div>
			<table width="100%">
				<tr><th>หัวข้อคำถาม</th><td><input type="text" name="question[]" class="full" value="<?php echo $question->question ?>" /><input type="button" value="เพิ่มแถว" name="add" /></td></tr>
				<tr>
					<th>จำนวนคอลัมน์</th>
					<td>
						<select name="range">
    						<option value="1" <?php echo ($question->range==1)?'selected="selected"':'' ?>>1</option>
							<option value="2" <?php echo ($question->range==2)?'selected="selected"':'' ?>>2</option>
    						<option value="3" <?php echo ($question->range==3)?'selected="selected"':'' ?>>3</option>
							<option value="4" <?php echo ($question->range==4)?'selected="selected"':'' ?>>4</option>
							<option value="5" <?php echo ($question->range==5)?'selected="selected"':'' ?>>5</option>
  						</select>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<table width="100%">
						<tr>
							<th>แถว\คอลัมน์</th>
							<td rel="range">
								<?php for($i=1;$i<=$question->range;$i++): ?>
								<input type="text" class="num" name="optional" value="<?php echo (@$optional[$i-1])?$optional[$i-1]:$i ?>" />
								<?php endfor; ?>
							</td>
						</tr>
						<?php foreach($question->choice->order_by('id','asc')->get() as $key => $choice): ?>
						<tr>
							<th><input type="text" name="choice" class="full" value="<?php echo $choice->name ?>" /><input type="hidden" name="choice_id" value="<?php echo $choice->id ?>" /> <a rel="del_choice" href="docs/delete_choice/<?php echo $choice->id ?>"><span class="icon icon-delete"></span></a></th>
							<td><?php for($i=1;$i<=$question->range;$i++): ?><input type="radio" class="num" /><?php endfor; ?></td>
						</tr>
						<?php endforeach; ?>
						</table>
					</td>
				</tr>
			</table>
			<input type="hidden" name="type[]" value="grid" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
	}
	
	
	function question_form2($question,$key)
	{
		if($question->type=="text")
		{
?>
		<li class="q text">
			<table width="100%">
				<tr><th>ข้อที่ <?php echo ++$key ?></th><td><?php echo $question->question ?></td></tr>
				<tr><th>คำตอบ</th><td><input type="text" name="answer[<?php echo $question->id ?>]" value="" class="full"  /></td></tr>
			</table>
			<input type="hidden" name="type[]" value="text" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
		if($question->type=="textarea")
		{
?>
		<li class="q textarea">
			<table width="100%">
				<tr><th>ข้อที่ <?php echo ++$key ?></th><td><?php echo $question->question ?></td></tr>
				<tr><th style="vertical-align:top; padding:5px 0 0;">คำตอบ</th><td><textarea name="answer[<?php echo $question->id ?>]" class="full" ></textarea></td></tr>
			</table>
			<input type="hidden" name="type[]" value="textarea" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
		if($question->type=="radio")
		{
			$answer = "คำตอบ";
?>
		<li class="q radio">
			<table width="100%">
				<tr><th>ข้อที่ <?php echo ++$key ?></th><td><?php echo $question->question ?></td></tr>
				<?php foreach($question->choice->order_by('id','asc')->get() as $choice): ?>
				<tr>
					<th><?php echo $answer ?></th>
					<td>
						<input type="radio" name="answer[<?php echo $question->id ?>]" value="<?php echo $choice->id ?>" /> 
						<?php echo $choice->name ?>
					</td>
				</tr>
				<?php $answer = ''; ?>
				<?php endforeach; ?>
				<?php if($question->other==1): ?>
				<tr>
					<th><?php echo $answer ?></th>
					<td>
						<input type="radio" name="answer[<?php echo $question->id ?>]" value="other" /> อื่นๆ โปรดระบุ
						<input type="text" name="other[<?php echo $question->id ?>]" value="" style="width:70%" />
					</td>
				</tr>
				<?php endif; ?>
			</table>
			<input type="hidden" name="type[]" value="radio" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
		if($question->type=="checkbox")
		{
			$answer = "คำตอบ";
?>
		<li class="q checkbox">
			<table width="100%">
				<tr><th>ข้อที่ <?php echo ++$key ?></th><td><?php echo $question->question ?></td></tr>
				<?php foreach($question->choice->order_by('id','asc')->get() as $choice): ?>
				<tr>
					<th><?php echo $answer ?></th>
					<td>
						<input type="checkbox" name="answer[<?php echo $question->id ?>][]" value="<?php echo $choice->id ?>" /> 
						<?php echo $choice->name ?>
					</td>
				</tr>
				<?php $answer = ''; ?>
				<?php endforeach; ?>
				<?php if($question->other==1): ?>
				<tr>
					<th><?php echo $answer ?></th>
					<td>
						<input type="checkbox" name="answer[<?php echo $question->id ?>][]" value="other" /> อื่นๆ โปรดระบุ
						<input type="text" name="other[<?php echo $question->id ?>]" value="" style="width:70%" />
					</td>
				</tr>
				<?php endif; ?>
			</table>
			<input type="hidden" name="type[]" value="checkbox" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
		if($question->type=="scale")
		{
			$optional = json_decode($question->optional,TRUE);
?>
		<li class="q scale">
			<table width="100%">
				<tr><th>ข้อที่ <?php echo ++$key ?></th><td><?php echo $question->question ?></td></tr>
				<tr>
					<td colspan="2">
						<table>
						<tr>
							<th></th>
							<td class="noborder"></td>
							<?php for($i=$question->min;$i<=$question->max;$i++): ?>
							<td class="num noborder"><?php echo ($i)?$i:0 ?></td>
							<?php endfor; ?>
							<td class="noborder"></td>
						</tr>
						<tr>
							<th>คำตอบ</th>
							<td><?php echo $optional[0] ?></td>
							<?php for($i=$question->min;$i<=$question->max;$i++): ?>
							<td><input class="num" type="radio" name="answer[<?php echo $question->id?>]" value="<?php echo $i ?>" /></td>
							<?php endfor; ?>
							<td><?php echo $optional[1] ?></td>
						</tr>
						</table>
					</td>
				</tr>
		
				

			</table>
			<input type="hidden" name="type[]" value="scale" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
		if($question->type=="grid")
		{
			$optional = json_decode($question->optional,TRUE);
?>
		<li class="q grid">
			<table width="100%">
				<tr><th>ข้อที่ <?php echo ++$key ?></th><td><?php echo $question->question ?></td></tr>
				<tr>
					<th></th>
					<td>
						<table>
						<tr>
							<td class="noborder"></td>
							<?php for($i=1;$i<=$question->range;$i++): ?>
							<td style="background:#EEE; width:80px;"><?php echo (@$optional[$i-1])?$optional[$i-1]:$i ?></td>
							<?php endfor; ?>
						</tr>
						<?php foreach($question->choice->order_by('id','asc')->get() as $key => $choice): ?>
						<tr <?php echo cycle() ?>>
							<td style="text-align:left;"><?php echo ++$key.'. '.$choice->name ?></td>
							<?php for($i=$question->range;$i>=1;$i--): ?><td><input type="radio" name="answer[<?php echo $question->id ?>][<?php echo $choice->id ?>]" value="<?php echo $i ?>" /></td><?php endfor; ?>
						</tr>
						<?php endforeach; ?>
						</table>
					</td>
				</tr>
			</table>
			<input type="hidden" name="type[]" value="grid" />
			<input type="hidden" name="question_id[]" value="<?php echo $question->id ?>" />
		</li>
<?php
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>