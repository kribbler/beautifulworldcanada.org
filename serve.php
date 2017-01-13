<?php
define('ROOT',preg_replace('#\\\\#','/',dirname(__FILE__)));
$r=preg_replace('#^([^\?]+)\?.*$#','$1',$_SERVER['REQUEST_URI']);
if (isset($_GET['type'])) {
	switch ($_GET['type']) {
		case 'bots':
			$time=$_GET['time'];
			$log=$_GET['log'];
			$ip=$_GET['ip'];
			$d=ROOT.'/data/bots/ips/'.$ip.'/';
			$t=filemtime($d.'info.json');
			if ($t<>$time || !file_exists($d.'logs/'.$log)) {
				header('HTTP/1.1 403 Forbidden');
				exit;
			}
			header('Content-Type: text/plain');
			readfile($d.'logs/'.$log);
			exit;
	}
}
if (isset($_GET['link'])) {
	$u=$_GET['url'];
	$u=base64_decode($u);
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: '.$u);
	exit;
}

$b=basename($r);
$d=dirname($r);
$d=explode('/',$d);
foreach ($d as $k=>$a) {
	if (empty($a) || $a[0]=='.')
		unset($d[$k]);	
}
$d=implode('/',$d);
$s=ROOT.'/cache/serve/'.$d.'/'.$b;
$e=explode('.',$b);
$y=array_pop($e);

if (isset($_GET['image'])) {
	switch ($y) {
		case 'jpeg':
		case 'jpg':
			header('Content-type: image/jpg');
			$func='imagecreatefromjpeg';
			break;
		case 'gif':
			header('Content-type: image/gif');
			$func='imagecreatefromgif';
			break;
		case 'png':
			header('Content-type: image/png');
			$func='imagecreatefrompng';
			break;
		default:
			notfound();	
	}
	header("Content-Transfer-Encoding: binary");
	$sm=@filemtime($s);
	if ($sm && isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH']==md5($s.$sm)) {
		header('HTTP/1.1 304 Not Modified');
		exit;
	}
	$sec=24*60*60;
	header('Cache-Control: public, max-age='.$sec);
	header('Expires: '.date('r',time()+$sec));
	header('Pragma: cache');

	array_shift($e);
	$dim=array_shift($e);
	if (!$e)
		notfound();
	$e=implode('.',$e);
	$of=ROOT.'/'.$d.'/'.$e.'.'.$y;

	$om=@filemtime($of);
	if (!$om)
		notfound();
	if (!$sm || $sm<$om) {
		$i=getimagesize($of);
		if (!$i)
			notfound();
		$dim=explode('x',$dim);
		if ($dim[0]==0)
			$dim[0]=floor($i[0]*($dim[1]/$i[1]));	
		elseif ($dim[1]==0)
			$dim[1]=floor($i[1]*($dim[0]/$i[0]));
		if ($dim[0]==0 || $dim[1]==0 || $dim[0]>900 || $dim[1]>900)
			notfound();
		$im=call_user_func($func,$of);
		if (!$im)
			notfound();
		$ni=imagecreatetruecolor($dim[0],$dim[1]);
		if (!$ni) {
			imagedestroy($im);
			notfound();	
		}
		if ($y=='png' || $y=='gif') {
			imagealphablending($im,false);
 			imagesavealpha($im,true);
			imagealphablending($ni,false);
 			imagesavealpha($ni,true);
		}
		imagecopyresampled($ni,$im,0,0,0,0,$dim[0],$dim[1],$i[0],$i[1]);
		imagedestroy($im);
		@mkdir(dirname($s),0755,true);
		if ($i[2]==IMAGETYPE_JPEG) {
        	imagejpeg($ni,$s,70);
			imagejpeg($ni,NULL,70);
		} elseif ($i[2]==IMAGETYPE_GIF) {
			imagegif($ni,$s);
			imagegif($ni);         
		} elseif ($i[2]==IMAGETYPE_PNG) {
			imagepng($ni,$s);
			imagepng($ni);
		}
		imagedestroy($ni);
	}
	header('ETag: '.md5($s.filemtime($s)));
	
	readfile($s);	
	exit;
}

if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH']==md5($s)) {
	header('HTTP/1.1 304 Not Modified');
	exit;
}
if (!$d)
	notfound();
$gz=false;
$js=false;
$css=false;


switch ($y) {
	case 'gz':
	case 'jgz':
		$gz=true;
		$y=array_pop($e);
		break;
}
switch ($y) {
	case 'css':
		$css=true;
		break;
	case 'js':
		$js=true;
		break;
	default:
		notfound();	
}
if ($js)
	header('Content-Type: application/javascript');	
if ($css)
	header('Content-Type: text/css');
if ($gz)
	header('Content-Encoding: gzip');
$sec=63072000;
header('Cache-Control: public, max-age='.$sec.'',true);
header('Expires: '.date('r',time()+$sec));
header('Pragma: cache');
header('ETag: '.md5($s));

if (file_exists($s)) {
	readfile($s);
	exit;	
}
$z['Y']=array_pop($e);
$z['j']=array_pop($e);
$z['n']=array_pop($e);
$z['s']=array_pop($e);
$z['i']=array_pop($e);
$z['H']=array_pop($e);
array_shift($e);
if (!$e || !isset($z['Y'],$z['j'],$z['n'],$z['s'],$z['i'],$z['H']) || ($js===false && $css===false))
	notfound();
	
$mk=mktime($z['H'],$z['i'],$z['s'],$z['n'],$z['j'],$z['Y']);
if (!$mk)
	notfound();
$e=implode('.',$e).'.'.(($css) ? 'css' : 'js');
$ff=ROOT.'/'.$d.'/'.$e;
$fm=@filemtime($ff);
if ($fm<>$mk)
	notfound();

@mkdir(dirname($s),0755,true);
if (!$gz) {
	copy($ff,$s);
	readfile($s);
} else {
	include 'includes/zip.php';
	gzif($ff,$s);
	readfile($s);
}

function notfound() {
	header('HTTP/1.1 404 Not Found');
	exit;	
}
?>