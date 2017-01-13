<?php
$t=qsql('SELECT DATE_FORMAT(post_date,\'%Y%m\') AS y,post_title,ID FROM wp_posts WHERE post_type=\'newsletters\' AND post_status=\'publish\'');
$o=array();
$posts=array();
foreach ($t as $a) {
	$o[$a['y']]=1;
	$posts[$a['y']][]=$a;
}
if (!$o)
	return;
ksort($o);
$yr=array();
$miny=$maxy=0;
foreach ($o as $k=>$a) {
	$y=intval(substr($k,0,4));
	if ($miny==0 || $y<$miny)
		$miny=$y;
	if ($maxy==0 || $y>$maxy)
		$maxy=$y;
	$m=intval(substr($k,4,2));
	if (!isset($yr[$y]))
		$yr[$y]=array();
	$yr[$y][$m]=1;
}
$cy=date('Y');
$cm=date('n');
for ($n=$miny;$n<=$maxy;$n++) {
	if (!isset($yr[$n]))
		$yr[$n]=array();	
	for ($t=1;$t<=12;$t++) {
		if (!isset($yr[$n][$t]) && ($n<$cy || ($t<=$cm && $n==$cy)))
			$yr[$n][$t]=0;			
	}
	ksort($yr[$n]);
}
krsort($yr);

$months=array(
	1=>'January',
	2=>'February',
	3=>'March',
	4=>'April',
	5=>'May',
	6=>'June',
	7=>'July',
	8=>'August',
	9=>'September',
	10=>'October',
	11=>'November',
	12=>'December'
);
echo '<ul class="newsletterlist">';
$first=0;
$cmon=date('m');
$cyr=date('Y');

foreach ($yr as $k=>$a) {
	echo '<li>';
	krsort($a);
	foreach ($a as $kk=>$aa) {
		if ($aa) {
			$f=$first;
			echo '<h4',(($f==0) ? ' class="active"' : ''),'>',$months[$kk],(($k<>$cyr) ? ' '.$k : ''),'</h4>';
			echo '<ul',(($f==0) ? ' class="active"' : ' style="display:none"'),'>';
			foreach ($posts[$k.(($kk<10) ? '0' : '').$kk] as $aaa) {
				echo '<li>';
				echo '<a href="',get_permalink($aaa['ID']),'">',$aaa['post_title'],'</a>';
				echo '</li>';
			}
			echo '</ul>';
			$first++;
		}
	}
	echo '</li>';
}
echo '</ul>';
?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('ul > li > h4').click(function() {
		$(this).toggleClass('active');
		$(this).next().toggle().toggleClass('active');
	});
});
</script>
