<?php foreach($categories as $row):?>
<input id="<?php echo lang_decode($row->name)?>" type="checkbox" name="newsletters[]" value="<?php echo $row->id?>">
<label for="<?php echo lang_decode($row->name)?>" style="cursor:pointer;"><?php echo lang_decode($row->name)?></label>
<?php endforeach;?>
