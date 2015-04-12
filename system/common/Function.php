<?php
use NoahBuscher\Macaw\Macaw as Routes;

function Run()
{
	//在此处读取钩子..



	//注册视图

	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	//注册出错路由.
	Routes::$error_callback = function() {
	  throw new Exception("路由无匹配项 404 Not Found");
	};
	//设置配置环境.
	setenv();
	Routes::dispatch();
}



/*
*
*		取配置
*
*/

function C($key)
{
	//$config = 

}

/*
*
*		取配置
*
*/

function env($key, $default = null)
{
	$value = getenv($key);

	if ($value === false) return value($default);

	switch (strtolower($value))
	{
		case 'true':
		case '(true)':
			return true;

		case 'false':
		case '(false)':
			return false;

		case 'null':
		case '(null)':
			return null;

		case 'empty':
		case '(empty)':
			return '';
	}
	
	if (Str::startsWith($value, '"') && Str::endsWith($value, '"'))
	{
		return substr($value, 1, -1);
	}

	return $value;
}



function setenv()
{
		$file = fopen(ROOT_PATH."/.env", "r") or exit("Unable to open file!");
		while(!feof($file))
		{
			$str = explode("=",fgets($file));
			putenv($str['0'].'='.$str['1']);
		}
		fclose($file);
}


function RemoveXSS($val) {    
   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed    
   // this prevents some character re-spacing such as <java\0script>    
   // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs    
   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);    
   
   // straight replacements, the user should never need these since they're normal characters    
   // this prevents like <IMG SRC=@avascript:alert('XSS')>    
   $search = 'abcdefghijklmnopqrstuvwxyz';   
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';    
   $search .= '1234567890!@#$%^&*()';   
   $search .= '~`";:?+/={}[]-_|\'\\';   
   for ($i = 0; $i < strlen($search); $i++) {   
      // ;? matches the ;, which is optional   
      // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars   
   
      // @ @ search for the hex values   
      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;   
      // @ @ 0{0,7} matches '0' zero to seven times    
      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;   
   }   
   
   // now the only remaining whitespace attacks are \t, \n, and \r   
   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');   
   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');   
   $ra = array_merge($ra1, $ra2);   
   
   $found = true; // keep replacing as long as the previous round replaced something   
   while ($found == true) {   
      $val_before = $val;   
      for ($i = 0; $i < sizeof($ra); $i++) {   
         $pattern = '/';   
         for ($j = 0; $j < strlen($ra[$i]); $j++) {   
            if ($j > 0) {   
               $pattern .= '(';    
               $pattern .= '(&#[xX]0{0,8}([9ab]);)';   
               $pattern .= '|';    
               $pattern .= '|(&#0{0,8}([9|10|13]);)';   
               $pattern .= ')*';   
            }   
            $pattern .= $ra[$i][$j];   
         }   
         $pattern .= '/i';    
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag    
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags    
         if ($val_before == $val) {    
            // no replacements were made, so exit the loop    
            $found = false;    
         }    
      }    
   }    
   return $val;    
}  

