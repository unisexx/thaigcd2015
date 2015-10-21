// block คำหยาบ และประโยคที่จะนำมาแทนที่
var wordrude = new Array ("ashole","a s h o l e","a.s.h.o.l.e","bitch","b i t c h","b.i.t.c.h","shit","s h i t","s.h.i.t","fuck","dick","f u c k","d i c k","f.u.c.k","d.i.c.k","มึง","มึ ง","ม ึ ง","ม ึง","มงึ","มึ.ง","มึ_ง","มึ-ง","มึ+ง","กู","ควย","ค ว ย","ค.ว.ย","คอ วอ ยอ","คอ-วอ-ยอ","ปี้","เหี้ย","ไอ้เหี้ย","เฮี้ย","ชาติหมา","ชาดหมา","ช า ด ห ม า","ช.า.ด.ห.ม.า","ช า ติ ห ม า","ช.า.ติ.ห.ม.า","สัดหมา","สัด","เย็ด","หี","สันดาน","แม่ง","ระยำ","ส้นตีน","แตด") ;
var wordchange = '<font style="color:red">--</font>';
// ค่าสีสำหรับห้องหลัก
var def_roomcolor = '#ED1C24';
var roomchanged = false; //flag เพื่อบอกว่ามีการย้ายห้อง
var msgchanged = false; //flag เพื่อบอกว่ามีการโพสต์
var usertimevar = 0; //timer ของส่วน user และ room
var msgtimevar = 0; //time ของ message
var lastbg = ""; //สีพื้นเก่า
var lastuser = ""; //ชื่อของผู้โพสต์เก่า
var lastconnector = ""; //ชื่อของคนที่คุยด้วยเก่า
var lasttext = ""; //ข้อความที่เขียนครั้งที่แล้ว
var lastcontent = ""; //ข้อความที่แสดงครั้งที่แล้ว

//ฟังก์ชั่นคืนค่า คุยกับทุกคน
//เพื่อจัดรูปแบบตามต้องการ
function getalluser() 
{
	var Uname = htmlspecialchars( alluser );
	var li = '<li id="U' + Uname + '" ';
	li += 'class="button" ';
	li += 'onmouseover="this.className=\'hovered\'" ';
	li += 'onmouseout="usermouseout(this)" ';
	li += 'onclick="setconnector(\'' + Uname + '\',\'' + Uname + '\')" ';
	li += 'title="' + alluser_title + '">';
	li += '<img src="skin/img/uall.gif" alt="" />';
	return li + alluser + '</li>';
};

//ฟังก์ชั่น คืนค่า ชื่อคน online ในส่วนแสดงคน online
//เพื่อจัดรูปแบบตามต้องการ
//data = name|data|color|myself|displayname
function getuseronline( data ) 
{
	temp = data.split( "|" ); //แยกข้อมูลออก
	c = temp[2]; //สีของ user
	name = temp[4]; //ชื่อของ user ที่จะแสดง
	Dname = htmlspecialchars( name ); //ป้องกัน ' "
	Uname = htmlspecialchars( temp[0] ); //ป้องกัน ' "
	icon = temp[1]; //icon ของ user
	li = '<li id="U' + Uname + '" ';
	li += 'class="button" ';
	li += 'onmouseover="this.className=\'hovered\'" ';
	li += 'onmouseout="usermouseout(this)" ';
	image = '<img src="' + icon + '" alt="" '; //ไอคอนของ user
	//กำหนดความกว้างของรูปให้คงที่ หากเป็นรูปสมาชิก (ด้วยการตรวจ path ของรูป)
	if ( icon.indexOf( "skin/img/u" ) == -1 )
	{
		image += 'style="width:' + iconwidth + 'px" '; //ไอคอน
	};
	if ( temp[3] == '1' ) //เป็นตัวเอง
	{
		li += 'onclick="setroom(\'' + Uname + '\')" ';
		li += 'title="' + newroom_hint + '" ';
		li += 'style="color:' + c + ';font-weight:bold">';
		return li + image + ' />' + name + '</li>';
	}
	else //เป็นคนอื่น
	{
		user = '<font style="color:'+ c + '" title="' + con_text + '" onclick="setconnector(\'' + Uname + '\',\'' + Dname + '\',\'' + c + '\')">' + name + '</font>';
		image += ' title="'+ pm_hint + '" onclick="sendPM(\'' + Uname + '\',\'' + Dname + '\',\'' + c + '\')" />';
		return li + '>' + image + '<img id="B' + Uname + '" src="skin/img/check.gif" alt="" title="' + blockhint + '" onclick="blockuser(\'' + Uname + '\')" />' + user + '</li>';
	};
};

//คืนค่า ชื่อคนที่แสดงในห้องสนทนา (ผู้โพสต์)
//d เป็น array, c สีของ user
function getusercontent( d , c )
{
	var ret = '<span style="color:' + c + ';cursor:pointer" title="' + d[8]+ '"'
	if ( d[2] != '0' ) //แสดงข้อมูลสมาชิก
	{
		ret += ' onclick="window.open(\'../sticker/index.php?id='+d[2]+'\')"';
	};
	return ret + '>' + d[9] + '</span>';
};

//ฟังก์ชั่นเรียกห้อง chat มาทำงานครั้งแรก
window.onload = function()
{
	//ปรับขนาดแชตให้พอดีกับจอภาพ
	/*window.moveTo( 0 , 0 );
	window.resizeTo( screen.width , screen.height );
	var docheight = document.documentElement.clientHeight;
	var clientheight = document.body.clientHeight;
	if ( docheight > clientheight )
	{
		var iHeight = docheight;
	}
	else
	{
		var iHeight = clientheight;
	};
	var nHeight = iHeight - document.getElementById( "post" ).offsetHeight  - 30; //ลบความสูงของฟอร์ม
	if ( document.getElementById( "room" ) ) //มีส่วนแสดงชื่อห้อง
	{
		nHeight = nHeight - document.getElementById( "room" ).offsetHeight; //ลบความสูงของส่วนแสดงชื่อห้อง
	};
	document.getElementById( "content" ).style.height = nHeight  + "px";
	document.getElementById( "userscontainer" ).style.height = nHeight + "px";
	document.getElementById( "roomsscontainer" ).style.height = nHeight + "px";
	var hHeight = document.getElementById( "usersheader" ).offsetHeight;
	document.getElementById( "users" ).style.height = nHeight - hHeight + "px";
	document.getElementById( "rooms" ).style.height = nHeight - hHeight + "px";*/
	
	//กำหนดขนาดตัวอักษร
	var afont = getCookie( "chatfont" );
	if ( afont != null )
	{
		document.body.style.fontSize = afont;
	};
	//เริ่มต้นการทำงาน chat
	var newroom = room;
	room = '';
	setroom( newroom );
	//ให้ text รับโฟกัสตอนเริ่มต้น
	document.getElementById( "text" ).focus();
	//cache smile icons
	preloadimages();
};

//เมื่อปิด Browser หรือ Refresh (ไม่ทำงานบน Opera)
window.onunload =  function()
{
	var UnloadReq = Inint_AJAX();
	UnloadReq.open( "post" , "logout.php" , true );
	UnloadReq.onreadystatechange = function(){UnloadReq = null;}
	UnloadReq.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
	UnloadReq.setRequestHeader( "Referer" , document.URL ); 
	UnloadReq.send( null );
};

//ฟังก์ชั่นอัปเดทคนบนห้องสนทนา และรายชื่อห้อง
function userupdate()
{
	if ( usertimevar != 0 ) //เคลียร์ timer ไว้ก่อน
	{
		clearInterval( usertimevar );
		usertimevar = 0;
	};
	var UserUpdateReq = Inint_AJAX();
	var query = "usercount=" + usercount + "&room=" + encodeURIComponent( room ); //ข้อมูลที่จะส่งไป
	UserUpdateReq.open( "post" , "userupdate.php" , true );
	UserUpdateReq.onreadystatechange = function()
	{
		if ( UserUpdateReq.readyState == 4 )
		{
			if ( UserUpdateReq.status == 200 )
			{
				data = UserUpdateReq.responseText;
				datas = data.split( String.fromCharCode( 1 ) ); //time|room|users|rooms
				if ( datas[0] && document.getElementById( 'time' ) && !roomchanged ) //แสดงนาฬิกา (ถ้ามี)
				{
					document.getElementById( 'time' ).innerHTML = datas[0];
				};
				if ( datas[2] && !roomchanged ) //มีรายการ user มาด้วย
				{
					d2s = datas[2].split( String.fromCharCode( 2 ) );
					li = getalluser(); //คุยกับทุกคน
					for ( a = 0 ; a < d2s.length ; a++ )
					{
						li += getuseronline( d2s[a] );
					};
					document.getElementById( 'users' ).innerHTML = li; //แสดงรายชื่อคน online ทั้งหมด
					selectconnector( connector );
				};	
				if ( datas[3] && !roomchanged ) //มีรายการห้องมาด้วย
				{
					d3s = datas[3].split( String.fromCharCode( 2 ) );
					count = d3s.length - 1;
					li = '';
					//var name, Rname;
					for ( i = 0 ; i < count ; i+=2 )
					{
						name = d3s[i];
						Rname = htmlspecialchars( name );
						li += '<li id="R' + Rname + '" '; //id ของ รายการลิสต์ Room
						li += 'class="button" '; //class default
						li += 'onmouseover="this.className=\'hovered\'" '; //class เมื่อเมาส์อยู่บน
						li += 'onmouseout="roommouseout(this)" '; //ฟังก์ชั่นเมื่อเมาส์ออกจากปุ่ม
						li += 'onclick="setroom(\'' + Rname + '\')">'; //ฟังก์ชั่นเมื่อคลิก (เปลี่ยนห้อง)
						li += name + ' (' + d3s[i + 1] + ')</li>'; //ชื่อห้องและคนในห้อง
					};
					document.getElementById( 'rooms' ).innerHTML = li; //แสดงรายชื่อห้องทั้งหมด
					usercount = parseInt( d3s[count] ); //อัปเดทรายการที่ส่งมาล่าสุด
					selectroom( datas[1] ); //อัปเดทชื่อห้อง
					checkblocked(); //check-uncheck users
				};
				if ( usertimevar == 0 && !roomchanged ) //จับเวลาสำหรับการทำงานครั้งต่อไป
				{
					usertimevar = window.setInterval( "userupdate()" , usertime );
				}
			};
			UserUpdateReq = null; // clear
		};
	};
	UserUpdateReq.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
	UserUpdateReq.setRequestHeader( "Referer" , document.URL );
	if ( !roomchanged )
	{
		UserUpdateReq.send( query );
	};
};

//ฟังก์ชั่นกำหนดห้อง
function setroom( newroom )
{
	if ( newroom != room )
	{
		//เคลียร์ค่าต่างๆทั้งหมด ยกเลิกการอัปเดทชั่วคราว
		roomchanged = true;
		msgchanged = true;
		clearContent( );
		clearInterval( usertimevar );
		clearInterval( msgtimevar );
		usertimevar = 0;
		msgtimevar = 0;
		usercount = 0;
		msgcount = 0;
		lastuser = "";
		lastconnector = "";
		lasttext = "";
		lastcontent = "";
	
		//Ajax ส่งไปเพื่อกำหนดห้อง
		var query = "room=" + encodeURIComponent( newroom );
		var RoomReq = Inint_AJAX();
		RoomReq.open( "post" , "setroom.php" , true );
		RoomReq.onreadystatechange = function()
		{
			if ( RoomReq.readyState == 4 )
			{
				if ( RoomReq.status == 200 )
				{
					room = RoomReq.responseText;
					roomchanged = false;
					userupdate(); //แสดง user และห้อง
					msgchanged = false;
					msgupdate(); //แสดง message
				};
				RoomReq = null; // clear
			};
		};
		RoomReq.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
		RoomReq.setRequestHeader( "Referer" , document.URL ); 
		RoomReq.send( query ); //Ajax เพื่อเปลี่ยนห้อง
		document.getElementById( "text" ).focus(); //กลับไปที่ text
	};
};

//ฟังก์ชั่นสำหรับจัดการแสดงผลห้องที่ถูกเลือก
function selectroom( myroom )
{
	var Rroom = 'R' + htmlspecialchars( myroom ); //ชื่อห้องเข้ารหัส
	var parent = document.getElementById( "rooms" );
	var lis = parent.getElementsByTagName( "li" );
	for ( var i = 0 ; i < lis.length ; i++ ) //เคลียร์ class ของทุกรายการ
	{
		if ( lis[i].id == Rroom )
		{
			lis[i].className = "select";
		}
		else
		{
			lis[i].className = "button";
		};
	};
	if ( document.getElementById( 'room' ) ) //แสดงผลชื่อห้อง (ถ้ามี)
	{
		document.getElementById( 'room' ).innerHTML = myroom;
	};
	for(var i = 0 ; i < rooms.length ; i++) {
		document.getElementById('R' + htmlspecialchars(rooms[i])).style.color = def_roomcolor;
	}
};

//ฟังก์ชั่นเมื่อเอาเมาส์ออกจากปุ่มชื่อห้อง
function roommouseout( li )
{	
	if ( li.id == 'R' + htmlspecialchars( room ) ) //ห้องที่เลือก
	{
		li.className = 'select';
	}
	else
	{
		li.className = 'button';
	};
};

//ฟังก์ชั่นเลือกคนที่คุยด้วย
function setconnector( newconnector , newname , color )
{
	if ( newconnector != connector )
	{
		connector = newconnector;
		connectorname = newname;
		connectorcolor = color;
		selectconnector ( connector );
	};
};

//ฟังก์ชั่นอัปเดทปุ่ม คนคุยด้วย
function selectconnector( name )
{
	var Uname = 'U' + htmlspecialchars( name );
	var parent = document.getElementById( "users" );
	var lis = parent.getElementsByTagName( "li" );
	for ( var i = 0 ; i < lis.length ; i++ ) //เคลียร์ class ของทุกรายการ
	{
		if ( lis[i].id == Uname )
		{
			lis[i].className = "select";
		}
		else
		{
			lis[i].className = "button";
		};
	};

	if ( !document.getElementById( Uname ) )
	{
		lis[0].className = "select";
		connector = alluser;
		connectorcolor = '#000000';
	};
};

//ฟังก์ชั่นเมื่อเอาเมาส์ออกจากปุ่มชื่อคนคุยด้วย
function usermouseout( li )
{	
	if ( li.id == 'U' + htmlspecialchars( connector ) ) //ชื่อที่เลือก
	{
		li.className = 'select';
	}
	else
	{
		li.className = 'button';
	};
};
//จบ ฟังก์ชั่นอัปเดทคนบนห้องสนทนา และรายชื่อห้อง

//ฟังก์ชั่นอัปเดทข้อความบนห้องสนทนา
function msgupdate()
{
	if ( msgtimevar != 0 ) //เคลียร์ timer ไว้ก่อน
	{
		clearInterval( msgtimevar );
		msgtimevar = 0;
	};
	msgReq = Inint_AJAX();
	query = "msgcount=" + msgcount + "&room=" + encodeURIComponent( room ); //ข้อมูลที่จะส่งไป
	msgReq.open( "post" , "msgupdate.php" , true );
	msgReq.onreadystatechange = function()
	{
		if ( msgReq.readyState == 4 )
		{
			if ( msgReq.status == 200 )
			{
				if ( msgtimevar == 0 && !msgchanged ) //จับเวลาสำหรับการทำงานครั้งต่อไป
				{
					msgtimevar = window.setTimeout( "msgupdate()" , msgtime );
				};
				data = msgReq.responseText;
				if ( data != '' && !msgchanged )
				{
					ds = data.split( String.fromCharCode( 2 ) );
					count = ds.length - 2;
					var content = document.getElementById( 'content' );
					user = ds[count + 1]; //ชื่อตัวเอง
					snd = '';
					for ( i = 0 ; i < count ; i++ )
					{
						if ( ds[i] != '' && ds[i] != lastcontent )
						{
							lastcontent = ds[i]; //ป้องกันการรันข้อความ
							snd = addContent( content , lastcontent , user ); //ส่งข้อความไปแสดงผล
						};
					};
					msgcount = parseInt( ds[count] ); //เก็บบรรทัดล่าสุดไว้
					limitcontent( content ); //จำกัดบรรทัดข้อความ					
					content.scrollTop = content.scrollHeight; //เลื่อนข้อความล่าสุดมาแสดง
					content = null;
					playSnd( snd ); //เล่นเสียง	
					//document.title = "The new title goes here.";
				};
			};
			msgReq = null; // clear
		};
	};
	msgReq.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
	msgReq.setRequestHeader( "Referer" , document.URL );
	if ( !msgchanged )
	{
		msgReq.send( query );
	};
};

//ฟังก์ชั่น ลบข้อความใน content ออกทั้งหมด
function clearContent()
{
	var content = document.getElementById( 'content' ) //id ของ content
	for ( var i = content.childNodes.length - 1 ; i >= 0 ; i-- )
	{
		content.removeChild( content.childNodes[i] ); //remove li
	};
	msgcount = 0; //เคลียร์ message ให้เป็นค่าเริ่มต้นเพิ่มให้อ่านใหม่
};

//จำกัดบรรทัดของข้อความ ไม่เกิน linecount
function limitcontent( content )
{
	for ( var i = content.childNodes.length - linecount - 1 ; i >= 0 ; i-- )
	{
		content.removeChild( content.childNodes[i] ); //remove li
	};
};

function canadd( username )
{
	for ( var i = 0 ; i < blockusers.length ; i++ )
	{
		if ( blockusers[i] == username )
		{
			return false;
		};
	}
	return true;
};

//ฟังก์ชั่นแทรกเนื้อหาเพื่อแสดงผล
function addContent( content , data , user )
{
	var d = data.split( '|' ); //แยกออกเป็นข้อความ
	var snd = '';
	if ( canadd( d[0] ) ) //ตรวจสอบชื่อคนถูก block
	{
		var li = document.createElement( 'li' ); //สร้างแถวใหม่
		var c = d[1]; //สีของ user
		var m = d[3]; //0 ปกติ, 1 pm, 2 login, 3 logout
		var time = '<span class="time">(' + d[4] + ')</span>'; //เวลาที่โพสต์				
		var username = getusercontent( d , c ); //ชื่อ + สีของ user
		var conn = ' <span style="color:' + d[7] + '">' + d[10] + '</span>'; //ชื่อ + สีของ คนคุยด้วย
		var data = d[5];
		//ไอคอนยิ้ม
		for ( var i = 0 ; i < smiles.length ; i++ )
		{
			data = data.replace( smiles[i] , '<img src="' + smilepath + icons[i] + '" alt="" />&nbsp;' );
		};
		//คำหยาบ
		for ( i = 0 ; i < wordrude.length ; i++ )
		{
			pattern = new RegExp( wordrude[i] , "gi" );
			data = data.replace( pattern , wordchange );
		};
		//BBCode [img=xxx]
		pattern = /\[img=(.+)\]/gi;
		var img = data.replace( pattern , '$1' );
		if ( img != data )
		{
			var id = 'IMG' + Math.floor( Math.random() * 10000 );
			data = data.replace( pattern , '<a href="$1" target="_blank"><img id="' + id + '" src="skin/img/wait.gif" alt="" /></a>' );
			loadingimage( id , img ); //Pre load
		};
		//สีของข้อความ
		data = '<span style="color:' + c + '">' + data + '</span>';
		if ( m == '2' ) //login
		{
			li.innerHTML =  time + welcome.replace( /%1/g , username);
			li.className = "bg3";
			snd = 'online';
			lastconnector = '';
		}
		else if ( m == '3' ) //logout
		{
			li.innerHTML =  time + logout.replace( /%1/g , username );
			li.className = "bg4";
			snd = 'logout';
			lastconnector = '';
		}
		else //message อื่นๆ
		{
			if ( m == '1' )
			{
				if ( user == d[0] ) //ข้อความส่วนตัวที่ตัวเองส่ง
				{
					li.innerHTML =  '<cite>' + time + ' <img src="skin/img/pm.gif" alt="" /> ' + pm_to + ' ' + conn + '</cite>' + data;
					li.className = 'bg5';
				}
				else if ( user == d[6] ) //ข้อความส่วนตัวที่ส่งมาถึงตัวเอง
				{
					li.innerHTML =  '<cite>' + time + ' <img src="skin/img/pm.gif" alt="" /> ' + pm_form + ' ' + username + '</cite>' + data;
					li.className = 'bg5';
				}
				else
				{
					return '';
				};
			}
			else if ( lastuser != d[0] || lastconnector != d[6] ) //ไม่ใช่ user หรืิอ connector เดิมเปลี่ยนสีพื้น
			{
				lastuser = d[0]; //เก็บ user ล่าสุดไว้ตรวจสอบสีพื้น
				lastconnector = d[6] //เก็บ connector ล่าสุดไว้ตรวจสอบสีพื้น
				lastbg = ( lastbg == "bg1" && lastconnector != '' ) ? "bg2" : "bg1"; //สลับสีพื้น
				li.innerHTML =  '<cite>' + time + ' <img src="skin/img/type.gif" alt="" /> ' + username + ' ' + talk + conn + '</cite>' + data;
				li.className = lastbg; //สีพื้น
			}
			else //user เดิมก่อนหน้าคงสีพื้นไว้และไม่ต้องแสดงชื่อผู้ส่ง
			{
				li.innerHTML =  data;
				li.className = lastbg; //สีพื้น
			};
			snd = 'type';
		};
		content.appendChild( li ); //แทรกแถวใหม่
	};
	return snd;
};

//ฟังก์ชั่นสำหรับ preload image และแสดงรูป และปรับขนาดรูป
var loadicons= new Array(); //แอเรย์ของไอคอนที่จะแสดง
function loadingimage( imageid , img )
{
	if ( typeof loadicons[img] == "undefined" )
	{
		loadicons[img] = new Image();
		loadicons[img].src = img;
	};
	setTimeout( function(){ preload( imageid , img ) } , 20 );
};

function preload( imageid , img )
{
	
	if ( loadicons[img].complete )
	{
		displayicon( imageid , img );
	}
	else
	{
		setTimeout( function(){ preload( imageid , img ) } , 40 );
	};
};

function displayicon( imageid , img )
{
	var obj = document.getElementById( imageid );
	if ( obj )
	{
		w = loadicons[img].width;
		h = loadicons[img].height;
		obj.src = img;
		//คำนวณขนาดตามที่กำหนด
		if ( w > h && w > imagewidth )
		{
			obj.width = imagewidth;
		}
		else if ( h >= w && h > imagewidth )
		{
			obj.height = imagewidth;
		};
	};
};
//จบ ฟังก์ชั่นสำหรับ preload image และแสดงรูป และปรับขนาดรูป

//ฟังก์ชั่นเพื่อส่งข้อความ
function doSubmit()
{
	var text = document.getElementById( "text" );
	var data = text.value;
	if ( lasttext != data ) //ป้องกันการ flood และ กดส่งถี่ๆ
	{
		//จำข้อความไว้ป้องกันการโพสต์ซ้ำ
		lasttext = data;
		//ยกเลิกการอัปเดท
		msgchanged = true;
		clearInterval( msgtimevar );
		msgtimevar = 0;
		var query = "data=" + encodeURIComponent( connector )+ ',' + encodeURIComponent( connectorname ) + ', /pm ' + encodeURIComponent( data ) 
			+ "&id=" + id
			+ "&room=" + encodeURIComponent( room )
			+ "&connector=" + encodeURIComponent( connector )
			+ "&connectorname=" + encodeURIComponent( connectorname )
			+ "&connectorcolor=" + encodeURIComponent( connectorcolor );
		if(encodeURIComponent( connector )=='%E0%B8%97%E0%B8%B8%E0%B8%81%E0%B8%84%E0%B8%99')
		{
			query = "data=" + encodeURIComponent( data ) 
			+ "&id=" + id
			+ "&room=" + encodeURIComponent( room )
			+ "&connector=" + encodeURIComponent( connector )
			+ "&connectorname=" + encodeURIComponent( connectorname )
			+ "&connectorcolor=" + encodeURIComponent( connectorcolor );
		}
		//ส่งข้อความใหม่
		var SubmitReq = Inint_AJAX();
		SubmitReq.open( "post" , "savemsg.php" , true );
		SubmitReq.onreadystatechange = function()
		{
			if ( SubmitReq.readyState == 4 )
			{
				if ( SubmitReq.status == 200 )
				{
					if ( SubmitReq.responseText != "" )  //มีการตอบกลับมา
					{
						id = SubmitReq.responseText;
						//อัปเดทข้อความใหม่
						msgchanged = false;
						msgupdate();
					};
				};
				SubmitReq = null; // clear
			};
		};
		SubmitReq.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
		SubmitReq.setRequestHeader( "Referer" , document.URL ); 
		
		SubmitReq.send( query );
		//เคลียร์ text และ focus เพื่อรับข้อความต่อไป
		text.focus();
		text.value = "";
	};
	return false;
};

function sendPM( name , displayname , color )
{
	var obj = document.getElementById( "text" );
	obj.value = name + ',' + displayname + ',' + color + " /pm " + obj.value;
	obj.focus();
	return false;
};

function blockuser( username )
{
	var temp = blockusers.length; //กำหนดให้เป็นรายการสุดท้าย
	for ( var i = 0 ; i < blockusers.length ; i++ )
	{
		if ( blockusers[i] == "" )
		{
			temp = i; //ให้ add ที่รายการที่ถูกลบไปแล้ว
		}
		else if ( blockusers[i] == username )
		{
			blockusers[i] = ''; //ยกเลิก block
			if ( document.getElementById( 'B' + username ) )
			{
				document.getElementById( 'B' + username ).src = "skin/img/check.gif";
			};
			return;
		};
	};
	blockusers[i] = username; //add user เพื่อ block
	if ( document.getElementById( 'B' + username ) )
	{
		document.getElementById( 'B' + username ).src = "skin/img/uncheck.gif";
	};
};

//กำหนดรายการ block ทั้งหมดในคราวเดียว
function checkblocked()
{
	var myname = '';
	for ( var i = 0 ; i < blockusers.length ; i++ )
	{
		myname = 'B' + blockusers[i];
		if ( document.getElementById( myname ) )
		{
			document.getElementById( myname ).src = "skin/img/uncheck.gif";
		};
	};
};

//เล่นเสียง ตามชื่อที่กำหนด
//wave=type(มี message),online(เข้าห้อง),logout(ออกจากห้อง)
function playSnd( wav )
{
	var beep = document.getElementById( "beep" );
	if ( wav != '' && beep && document.getElementById( wav ) )
	{
		if ( beep.src.indexOf( "nobeep.gif" ) == -1 )
		{
			document.getElementById( wav ).controls.play();
		};
	};
};

//โหลดไอคอนยิ้ม ลง loadicons เพื่อ cache
function preloadimages()
{
	var icon = '';
	for ( i = 0 ; i < icons.length ; i++ )
	{
		icon = icons[i];
		loadicons[icon] = new Image();
		loadicons[icon].src = "skin/img/" + icon;
	};
};

//เปลี่ยนตัวอักษร ' " ให้เป็นอักขระพิเศษ
function htmlspecialchars( str )
{
	var sModifiedString = '';
	if ( str )
	{
		iStringLength = str.length;
		for ( var i = 0 ; i < iStringLength ; i++ )
		{
			switch( str.charCodeAt( i ) )
			{
				case 34 :
					sModifiedString += '\\"';
					break;
				case 39 :
					sModifiedString += "\\'";
					break;
				default :
					sModifiedString += str.charAt(i);
			};
		};
	};
	return sModifiedString;
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

//สลับ มีเสียง/ไม่มีเสียง
function ToggleBeep()
{
	var beep = document.getElementById( "beep" );
	if ( beep.src.indexOf( "nobeep.gif" ) > -1 )
	{
		beep.src = "skin/img/beep.gif";
	}
	else
	{
		beep.src="skin/img/nobeep.gif";
	};
	//ให้โฟกัสไปที่ txt
	document.getElementById("text").focus();
};

function setbbcode( val1 , val2 )
{
	var text = document.getElementById("text");
	text.value = val1 + text.value + val2;
	text.focus();
};

function textsize( obj )
{
	if ( obj.value != '0' )
	{
		setbbcode( '[size=' + obj.value + ']' , '[/size]');
	};
	obj.options[0].selected = true; //กลับไปเลือกรายการแรก
};