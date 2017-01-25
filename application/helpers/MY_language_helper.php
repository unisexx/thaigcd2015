<?php

if(!function_exists('lang_encode'))
{
	function lang_encode($data)
	{
		if(is_array($data))
		{
			$result = array();
			foreach($data as $key => $value)
			{
			    //$result[] = '"'.trim($key).'":"'.$value.'"';
			    //$value = str_replace("\n", "<n/>",htmlspecialchars( $value));
				$result[] = '"'.trim($key).'":"'.str_replace("\n", "<n/>",htmlspecialchars( $value)).'"';
			}
            //echo '{'.implode(',', $result).'}';
			return '{'.implode(',', $result).'}';
		}
	}
}

if(!function_exists('lang_decode'))
{
	function lang_decode($data,$select_lang = FALSE)
	{
		$CI =& get_instance();
		$lang = $select_lang ? $select_lang : $CI->session->userdata('lang');
		$obj = json_decode($data);
		//$result = (is_object($obj)) ? @($obj->$lang ? htmlspecialchars_decode(str_replace("<n/>", "\n",$obj->$lang)) : htmlspecialchars_decode(str_replace("<n/>", "\n",$obj->en))) : htmlspecialchars_decode($data);
        if(is_object($obj)){
            if($obj->$lang){
                $result = htmlspecialchars_decode(str_replace("<n/>", "\n",$obj->$lang));
            }else{
                $result = htmlspecialchars_decode(str_replace("<n/>", "\n",$obj->en));
            }
        } else{
            $pos = strpos($data, '"th":');
						if($pos>0){
	            if($select_lang=='en'){
	                $data = substr($data, strpos($data, ',"en":"')+7);
	                $data = substr($data, 0,strlen($data)-2);
	            }else{
	                $data = substr($data, 7,strpos($data, ',"en":')-8);
	            }
						}
            $result = htmlspecialchars_decode($data);
        }
		return $result;
	}
}

function lang_filter($orm)
{
	$CI =& get_instance();
	if($CI->session->userdata('lang')=="en")
	{
		return $orm->where('title NOT REGEXP \'"en":""}$\'');
	}
	else
	{
		return $orm;
	}
}

function censor($string)
{
	$CI =& get_instance();
	$CI->load->helper('text');
	$word = new Webboard_bad_word(1);
	$word = explode("\n",$word->badword);

	$wordchange = "<img src=\"media/tiny_mce/plugins/emotions/img/cry.gif\">"; //ข้อความที่ต้องการให้เปลี่ยนเป็น

    for ( $i = 0 ; $i < sizeof( $word ) ; $i++ )
    {
         $string = str_replace( $word[$i] , $wordchange , $string );
    };

	return $string;

	//return word_censor($string,$word,'<img src="media/tiny_mce/plugins/emotions/img/cry.gif">');
}

function link_filter($string)
{
	$CI =& get_instance();
	$CI->load->helper('text');
	$link = new Webboard_bad_word(2);
	$link = explode("\n",$link->badword);
	return word_censor($string,$link,'<span style=display:none;></span>');
}

if ( !function_exists('json_decode') ){

function json_decode($json)

{

    // Author: walidator.info 2009

    $comment = false;

    $out = '$x=';



    for ($i=0; $i<strlen($json); $i++)

    {

        if (!$comment)

        {

            if ($json[$i] == '{')        $out .= ' array(';

            else if ($json[$i] == '}')    $out .= ')';

            else if ($json[$i] == ':')    $out .= '=>';

            else                         $out .= $json[$i];

        }

        else $out .= $json[$i];

        if ($json[$i] == '"')    $comment = !$comment;

    }

    eval($out . ';');

    return $x;

}

}





?>
