function getposOffset( overlay , offsettype )
{
	var totaloffset = ( offsettype == "left" ) ? overlay.offsetLeft : overlay.offsetTop;
	var parentEl = overlay.offsetParent;
	while ( parentEl != null )
	{
		totaloffset = ( offsettype == "left" ) ? totaloffset + parentEl.offsetLeft : totaloffset + parentEl.offsetTop;
		parentEl = parentEl.offsetParent;
	};
	return totaloffset;
};

function overlay( curobjstr , subobjstr )
{
	if ( document.getElementById )
	{
		var subobj = document.getElementById( subobjstr );
		var curobj = document.getElementById( curobjstr );
		subobj.style.display = ( subobj.style.display != "block" ) ? "block" : "none";
		var xpos = getposOffset( curobj , "left" );
		var ypos = getposOffset( curobj , "top" );
		subobj.style.top = ypos + curobj.offsetHeight + 2 + "px";
		subobj.style.left = xpos - subobj.offsetWidth + curobj.offsetWidth + "px";
	};
};

var timedelay;
function delayHide( lyr )
{
	timedelay = setTimeout( 'document.getElementById("' + lyr + '").style.display="none"' , 330 );
};

function domouseover()
{
	clearTimeout( timedelay );
};