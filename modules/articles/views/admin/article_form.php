<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">

		tinyMCE.init({
			
			mode: "exact",
    		elements: "detail[th],detail[en]",

			// Location of TinyMCE script
			//script_url : 'media/tiny_mce/tiny_mce.js',

			// General options
			theme : "advanced",
			skin : "cirkuit",
			plugins : "pdw,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
			file_browser_callback: 'openKCFinder',
			// Theme options
			/*
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
			*/
			theme_advanced_buttons1 : "pdw_toggle,formatselect,fontsizeselect,forecolor,|,bold,italic,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,|,link,unlink,|,spellchecker,|,image", 
            theme_advanced_buttons2 : "code,paste,pastetext,pasteword,removeformat,|,backcolor,|,underline,justifyfull,sup,|,outdent,indent,|,hr,charmap,|,media,|,search,replace,|,fullscreen,|,undo,redo", 
            theme_advanced_buttons3 : "tablecontrols,|,visualaid,template,pagebreak,preview,emotions", 
			
			theme_advanced_toolbar_location : "top", 
            theme_advanced_toolbar_align : "left", 
            theme_advanced_statusbar_location : "bottom", 
            theme_advanced_resizing : true, 
 
            height : "300", 
            width: "845", 

			// Example content CSS (should be your site CSS)
			content_css : "css/content.css",
			accessibility_warnings : false,
			pdw_toggle_on : 1,
        	pdw_toggle_toolbars : "2,3",            
			force_br_newlines : true,
			force_p_newlines : false,
        	forced_root_block : '', // Needed for 3.x


		});

	
	function openKCFinder(field_name, url, type, win) {
    tinyMCE.activeEditor.windowManager.open({
        file: 'media/kcfinder/browse.php?opener=tinymce&type=' + type+ '&dir=' + type + '/public',
        title: 'File Manager',
        width: 700,
        height: 500,
        resizable: "yes",
        inline: true,
        close_previous: "no",
        popup_css: false
    }, {
        window: win,
        input: field_name
    });
    return false;
}

function openKCFinder1(div) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
            div.innerHTML = '<div style="margin:5px">Loading...</div>';
            var img = new Image();
            img.src = url;
            img.onload = function() {
                div.innerHTML = '<img id="img" src="' + url + '" />';
                var img = document.getElementById('img');
                var o_w = img.offsetWidth;
                var o_h = img.offsetHeight;
                var f_w = div.offsetWidth;
                var f_h = div.offsetHeight;
                if ((o_w > f_w) || (o_h > f_h)) {
                    if ((f_w / f_h) > (o_w / o_h))
                        f_w = parseInt((o_w * f_h) / o_h);
                    else if ((f_w / f_h) < (o_w / o_h))
                        f_h = parseInt((o_h * f_w) / o_w);
                    img.style.width = f_w + "px";
                    img.style.height = f_h + "px";
                } else {
                    f_w = o_w;
                    f_h = o_h;
                }
            }
        }
    };
    window.open('media/kcfinder/browse.php?type=images&dir=images/public',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>
<script type="text/javascript">
	$(function(){
			$("[rel=en]").hide();
			$(".lang a").click(function(){
				$("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
				$(this).addClass('active').siblings().removeClass('active');
				return false;
			})
	})
</script>
<h1>บทความ</h1>
<form action="articles/admin/articles/save/<?php echo $article->id ?>" method="post" >
<table class="form">
	<tr><th>รูปภาพ :</th><td><div class="image" onclick="openKCFinder1(this)"><div style="margin:5px;">Click here to choose an image (100 x 100 px)</div></div></td></tr>
	<tr><th>หมวดหมู่ :</th><td><?php echo form_dropdown('category_id',$article->category->get_option(),$article->category_id,'');?></td></tr>
	<tr><th>เริ่ม :</th><td><input type="text" name="start_date" value="<?php echo $article->start_date?>" class="datepicker" /></td></tr>
	<tr><th>สิ้นสุด :</th><td><input type="text" name="end_date" value="<?php echo $article->end_date?>" class="datepicker" /></td></tr>
	<tr><th>แท็ก :</th><td><input type="text" name="tag" value="" /></td></tr>
	<tr><th>ภาษา :</th><td class="lang"><a href="th" class="active">ไทย</a> | <a href="en">อังกฤษ</a></td></tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title[th]" rel="th" value="<?php echo lang_get($article->title,'th')?>" class="full" />
			<input type="text" name="title[en]" rel="en" value="<?php echo lang_get($article->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>บทคัดย่อ :</th>
		<td>
			<textarea name="intro[th]" id="intro" class="full" rel="th"><?php echo lang_get($article->intro,'th')?></textarea>
			<textarea name="intro[en]" id="intro" class="full" rel="en"><?php echo lang_get($article->intro,'en')?></textarea>
		</td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<div rel="th"><textarea name="detail[th]" class="full tinymce"><?php echo lang_get($article->detail)?></textarea></div>
			<div rel="en"><textarea name="detail[en]" class="full tinymce"><?php echo lang_get($article->detail,'en')?></textarea></div>
		</td>
	</tr>
	<tr><th></th><td><input type="button" name="preview" value="ดูตัวอย่าง"><input type="submit" value="บันทึก"></td></tr>
</table>
</form>