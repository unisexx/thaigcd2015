//กำหนดขนาดตัวอักษรของ chat
function setfontsize( val )
{
	document.body.style.fontSize = val;
	setCookie( "chatfont" , val , 365 );
};

function doload()
{
	//กำหนดขนาดตัวอักษร
	var afont = getCookie( "chatfont" );
	if ( afont != null )
	{
		document.body.style.fontSize = afont;
	};
	//ปุ่มเลิอกไอคอน
	for ( var i = 0 ; i < icon.length ; i++ )
	{
		var obj = document.getElementById( "icon" + i );
		obj.onmouseover = function()
		{
			this.className = "hover"
		};
		obj.onmouseout = function() 
		{
			if ( this.alt == document.getElementById( "usericon" ).value )
			{ 
				this.className = "current";
			}
			else
			{
				this.className = "button";
			};
		};
		obj.onclick = function()
		{
			selecticon( this.alt );
		};
	};
	//อ่าน สีและ icon จาก cookie
	selecticon( getCookie( "chaticon" ) );
	//input ต่างๆ
	var user = document.getElementById( 'user' );
	var passwd = document.getElementById( 'passwd' );
	//ให้ cursor ไปอยู่ที่ช่อง user
	user.focus();
	//เลือกข้อความทั้งหมด
	user.select();
	//เคลียร์ password เมื่อมีการเปลี่ยนชื่อ
	user.setAttribute( 'onchange' , 'passwd.value = ""' );
};

//เลือกไอคอนของ user
function selecticon( id )
{
	for ( var i = 0 ; i < icon.length ; i++ )
	{
		document.getElementById( "icon" + i ).className = "button";
	};
	if ( !document.getElementById( "icon" + id ) )
	{
		id = 0;
	};
	document.getElementById( "usericon" ).value = id;
	document.getElementById( "icon" + id ).className = "current";
};

//เลือกสี ของ user
function selectcolor()
{
	//for ( var i = 0 ; i < color.length ; i++ )
	//{
	//	document.getElementById( "color" + i ).className = "button";
	//};
	//if ( !document.getElementById( id ) )
	//{
	//	id = "color0";
	//};
	//document.getElementById( "usercolor" ).value = id;
	//document.getElementById( id ).className = "current";
};

//ตรวจสอบการกรอกชื่อ
function login_check()
{
	var v1 = document.getElementById( "user" );

	//ตรวจสอบอักขระพิเศษในชื่อ
	var str = '\'#$%^&ฺ*() +=<>?/|\{}[:;],\"';
	var keyV1OK = 0;
	for ( var i = 0 ; i < str.length ; i++ )
	{
		if ( v1.value.indexOf( str.charAt( i ) ) != -1 )
		{
			keyV1OK = 1;
		};
	};

	if ( v1.value.length == 0 )
	{
		alert( login_error0 ); //ไม่ได้กรอก user มา
		v1.focus();
		return false;
	} 
	else if ( v1.value.length > 100 )
	{
		alert( login_error1 ); //user มีความยาวมากกว่า 100 ตัว
		v1.focus();
		return false;
	}
	else if ( keyV1OK == 1 )
	{
		alert( login_error2 ); //แทรกอักขระพิเศษมาด้วย
		v1.focus();
		return false;
	}
	else
	{
		return true;
	};
};

//เริ่มต้นการทำงาน หน้า login
if ( window.addEventListener )
{
	window.addEventListener( "load" , doload , false );
}
else if ( window.attachEvent )
{
	window.attachEvent( "onload" , doload );
}
else if ( document.getElementById )
{
	window.onload = doload;
};

//โค้ดแสดง Popup
var win = null;
function popupwindow( filename , windowname , w , h )
{
	var winl = (screen.width-w)/2;
	var wint = (screen.height-h)/2;
	if (winl < 0) winl = 0;
	if (wint < 0) wint = 0;
	var settings = 'height=' + h + ',';
	settings += 'width=' + w + ',';
	settings += 'top=' + wint + ',';
	settings += 'left=' + winl + ',';
	settings += 'resizable=0, scrollbars=0, status=0,toolbar=0, menubars=0, location=0';
	win = window.open(filename, windowname, settings);
	win.window.focus();
};