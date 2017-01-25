// JavaScript Document
var cke_config={
	skin:'kama', // kama | office2003 | v2
	language:'en', // th / en and more.....
	extraPlugins :'uicolor',// เรียกใช้ plugin ให้สามารถแสดง UIColor Toolbar ได้
	uiColor :'#9C3', // กำหนดสีของ ckeditor
	extraPlugins : 'autogrow', // เรียกใช้ plugin ให้สามารถขยายขนาดความสูงตามเนื้อหาข้อมูล
	autoGrow_maxHeight : 400,	 // กำหนดความสูงตามเนื้อหาสูงสุด ถ้าเนื้อหาสูงกว่า จะแสดง scrollbar
	enterMode: 2,// กดปุ่ม Enter -- 1=แทรกแท็ก <p> 2=แทรก <br> 3=แทรก <div>
	shiftEnterMode	:1,// กดปุ่ม Shift กับ Enter พร้อมกัน 1=แทรกแท็ก <p> 2=แทรก <br> 3=แทรก <div>
	height :200, // กำหนดความสูง
	width :800, // กำหนดความกว้าง * การกำหนดความกว้างต้องให้เหมาะสมกับจำนวนของ Toolbar
/*		fullPage : true, // กำหนดให้สามารถแก้ไขแบบเโค้ดเต็ม คือมีแท็กตั้งแต่ <html> ถึง </html>*/
	filebrowserBrowseUrl: 'media/ckeditor/filemanager/browser/default/browser.html?Connector='+encodeURIComponent('../../connectors/php/connector.php'),
	filebrowserImageBrowseUrl : 'media/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector='+encodeURIComponent('../../connectors/php/connector.php'),
	filebrowserFlashBrowseUrl : 'media/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector='+encodeURIComponent('../../connectors/php/connector.php'),
 	filebrowserUploadUrl : 'media/ckeditor/filemanager/connectors/php/upload.php',
 	filebrowserImageUploadUrl : 'media/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
 	filebrowserFlashUploadUrl : 'media/ckeditor/filemanager/connectors/php/upload.phpType=Flash',
	toolbar : [
    ['Source','-'/*,'Save'*/,'NewPage','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    /*'/',*/
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
    /*'/',*/
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize', 'ShowBlocks','-','About']
				]
}

function InsertHTML(htmlValue,editorObj){// ฟังก์ขันสำหรับไว้แทรก HTML Code
	if(editorObj.mode=='wysiwyg'){
		editorObj.insertHtml(htmlValue);
	}else{
		alert( 'You must be on WYSIWYG mode!');
	}	
}
function SetContents(htmlValue,editorObj){ // ฟังก์ชันสำหรับแทนที่ข้อความทั้งหมด
	editorObj.setData(htmlValue);
}
function GetContents(editorObj){// ฟังก์ชันสำหรับดึงค่ามาใช้งาน
	return editorObj.getData();
}
function ExecuteCommand(commandName,editorObj){// ฟังก์ชันสำหรับเรียกใช้ คำสั่งใน CKEditor
	if(editorObj.mode=='wysiwyg'){
		editorObj.execCommand(commandName);
	}else{
		alert( 'You must be on WYSIWYG mode!');
	}
}
