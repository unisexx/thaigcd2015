<?php
// helper functions
// -----------------------------------------------------------------------------
// get html dom form file
function file_get_html() {
	 $dom = new simple_html_dom;
    $args = func_get_args();
    $dom->load(call_user_func_array('file_get_contents', $args), true);
    return $dom;
}

// get html dom form string
function str_get_html($str, $lowercase=true) {
    $dom = new simple_html_dom;
    $dom->load($str, $lowercase);
    return $dom;
}

// dump html dom tree
function dump_html_tree($node, $show_attr=true, $deep=0) {
    $lead = str_repeat('    ', $deep);
    echo $lead.$node->tag;
    if ($show_attr && count($node->attr)>0) {
        echo '(';
        foreach($node->attr as $k=>$v)
            echo "[$k]=>\"".$node->$k.'", ';
        echo ')';
    }
    echo "\n";

    foreach($node->nodes as $c)
        dump_html_tree($c, $show_attr, $deep+1);
}

// get dom form file (deprecated)
function file_get_dom() {
    $CI =& get_instance();
    $args = func_get_args();
    return $CI->simple_html_dom->load(call_user_func_array('file_get_contents', $args), true);
}

// get dom form string (deprecated)
function str_get_dom($str, $lowercase=true) {
    $CI =& get_instance();
   return $CI->simple_html_dom->load($str, $lowercase);
}

function flash_replace($texte_a_formater)
{
$html = new simple_html_dom();
$html->load($texte_a_formater);
$flv_found = 0;
foreach($html->find("object") as $element)
    {
    // SE E' RELATIVO A UN FILE FLV
    if ( (substr( strtoupper( $element->data ), - 4) == ".FLV") || (substr( strtoupper( $element->data ), - 4) == ".MP4") )
        {

        $flv_found++;
        $flv_file = $element->data;
        $flv_width = $element->width;
        $flv_height = $element->height;
        $flv_type = $element->type;
        $element->outertext = "";
        $flv_code  = "";
       
       /* $flv_code .="<object type=\"".$flv_type."\" data=\"".$topdir.$v_Nom_Rep_Admin."/include/editeurs/ressources/player_flv_multi.swf\" width=\"".$flv_width."\" height=\"".$flv_height."\">
            <param name=\"movie\" value=\"".$topdir.$v_Nom_Rep_Admin."/include/editeurs/ressources/player_flv_multi.swf\" />
            <param name=\"allowFullScreen\" value=\"true\" />
            <param name=\"FlashVars\" value=\"flv=".$flv_file."&amp;showstop=0&amp;showvolume=1&amp;showtime=0&amp;showopen=0&amp;margin=0&amp;autoplay=0&amp;showiconplay=1&amp;loop=0&amp;volume=150&amp;showfullscreen=1&amp;buffer=10&amp;ondoubleclick=fullscreen&amp;buffermessage=&amp;allowfullscreen=true\" />
        </object>";*/
		
		$flv_code .= '<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="100%" height="385">
						<param name="movie" value="media/jwplayer/player.swf" />
						<param name="allowfullscreen" value="true" />
						<param name="allowscriptaccess" value="always" />
						<param name="flashvars" value="file='.$flv_file.'&image=" />
						<embed
							type="application/x-shockwave-flash"
							id="player2"
							name="player2"
							src="media/jwplayer/player.swf"
							width="100%" 
							height="385"
							allowscriptaccess="always" 
							allowfullscreen="true"
							flashvars="file='.$flv_file.'&image=" 
						/>
					</object>';

        $element->outertext = $element->outertext.$flv_code;
        }
    }

if ( $flv_found > 0)
{
    $actu_texte_format = $html->save();
}
else
{
    $actu_texte_format = $texte_a_formater;
}
return $actu_texte_format;

$html->clear();
unset($html);
}
?>