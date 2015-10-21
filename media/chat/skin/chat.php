<div id="wraper">
<div id="room">&nbsp;</div>
<div id="userscontainer">
<div id="usersheader"><font class="red">U</font>ser<span id="time">&nbsp;</span></div>
<ol id="users"></ol>
</div>
<ol id="content"></ol>
<div id="roomsscontainer">
<div id="roomsheader"><font class="red">R</font>oom</div>
<ol id="rooms"></ol>
</div>
</div>
<table id="post"><tr><td>
<img src="skin/img/italic.gif" onclick="setbbcode('[i]','[/i]')" alt="" title="<?=$btnI_hint?>" />
<img src="skin/img/bold.gif" onclick="setbbcode('[b]','[/b]')" alt="" title="<?=$btnB_hint?>"  />
<img src="skin/img/underline.gif" onclick="setbbcode('[u]','[/u]')" alt="" title="<?=$btnU_hint?>" />
<img src="skin/img/image.gif" onclick="setbbcode('[img=',']')" alt="" title="<?=$btnIMG_hint?>" />
<img src="skin/img/color.gif" onclick="popupwindow( 'colors.php' , 'colors' , 400 , 160 )" alt="" title="<?=$btnCOLOR_hint?>" />
<img src="skin/img/smile.gif" onclick="popupwindow( 'moresmiles.php' , 'moresmiles' , 250 , 500 )" alt="" title="<?=$btnSMILE_hint?>" />
<select id="textsize" onchange="textsize(this)">
<option value="0"><?=$selFONT?></option>
<option value="15"><?=$selFONT1?></option>
<option value="25"><?=$selFONT2?></option>
<option value="35"><?=$selFONT3?></option>
</select>
<?php
	if ( $ie )
	{
?>
<img src="skin/img/beep.gif" onclick="ToggleBeep()" id="beep" alt="" title="<?=$btnSOUND_hint?>" />
<?php
	};
?>
<!-- ปุ่ม แก้ไขข้อมูลสาชิก -->
<!-- <img src="skin/img/member.gif" onclick="window.open('../sticker/member.php?id=<?=$memberid?>')"  alt="" title="<?=$btnMEMBER_hint?>" /> -->
<img src="skin/img/back.gif" onclick="history.go(-1)"  alt="" title="<?=$btnLOGIN_hint?>" />
</td><td>
<form id="frmPost" action="index.php" method="get" onsubmit="return doSubmit()">
<input type="text" id="text" name="text" size="50" />
<input type="submit" id="submit" name="submit" value="<?=$btnSEND?>" />
</form>
</td></tr></table>